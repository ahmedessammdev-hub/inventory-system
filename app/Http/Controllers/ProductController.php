<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('supplier');

        // Search functionality
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('sku', 'like', "%{$searchTerm}%")
                  ->orWhere('category', 'like', "%{$searchTerm}%")
                  ->orWhereHas('supplier', function($supplierQuery) use ($searchTerm) {
                      $supplierQuery->where('name', 'like', "%{$searchTerm}%");
                  });
            });
        }

        // Filter by stock level
        if ($request->filled('stock_filter')) {
            if ($request->stock_filter === 'low_stock') {
                $query->where('quantity', '<=', 10);
            } elseif ($request->stock_filter === 'medium_stock') {
                $query->whereBetween('quantity', [11, 50]);
            } elseif ($request->stock_filter === 'high_stock') {
                $query->where('quantity', '>', 50);
            } elseif ($request->stock_filter === 'out_of_stock') {
                $query->where('quantity', 0);
            }
        }

        // Filter by category
        if ($request->filled('category_filter')) {
            $query->where('category', $request->category_filter);
        }

        // Filter by supplier
        if ($request->filled('supplier_filter')) {
            $query->where('supplier_id', $request->supplier_filter);
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortDirection = $request->get('sort_direction', 'desc');

        if (in_array($sortBy, ['name', 'sku', 'quantity', 'price', 'created_at'])) {
            $query->orderBy($sortBy, $sortDirection);
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $products = $query->paginate(10);
        $products->appends($request->all()); // Keep filters in pagination links

        // إحصائيات إضافية
        $totalProducts = Product::count();
        $totalValue = Product::all()->sum(function($p) {
            return $p->price * $p->quantity;
        });
        $lowStockCount = Product::where('quantity', '<=', 10)->where('quantity', '>', 0)->count();
        $outOfStockCount = Product::where('quantity', 0)->count();
        $highStockCount = Product::where('quantity', '>', 50)->count();

        // Get categories and suppliers for filters
        $categories = Product::distinct()->pluck('category')->filter()->sort();
        $suppliers = Supplier::orderBy('name')->get();

        return view('products.index', compact(
            'products',
            'totalProducts',
            'totalValue',
            'lowStockCount',
            'outOfStockCount',
            'highStockCount',
            'categories',
            'suppliers'
        ));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        return view('products.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:products',
            'category' => 'nullable|string',
            'cost' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    public function edit(Product $product)
    {
        $suppliers = Supplier::all();
        return view('products.edit', compact('product', 'suppliers'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:products,sku,' . $product->id,
            'category' => 'nullable|string',
            'cost' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted.');
    }

    public function showDetails(Product $product)
    {
        // Eager load supplier and stock transactions with user
        $product->load(['supplier', 'stockTransactions.user']);

        // Calculate statistics
        $totalStockIn = $product->stockTransactions()->where('type', 'in')->sum('quantity');
        $totalStockOut = $product->stockTransactions()->where('type', 'out')->sum('quantity');
        $totalTransactions = $product->stockTransactions()->count();
        $inventoryValue = $product->price * $product->quantity;

        // Get stock transactions ordered by date (newest first)
        $stockTransactions = $product->stockTransactions()
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        // Prepare chart data (cumulative quantity over time)
        $chartData = $this->prepareChartData($product);

        return view('products.details', compact(
            'product',
            'totalStockIn',
            'totalStockOut',
            'totalTransactions',
            'inventoryValue',
            'stockTransactions',
            'chartData'
        ));
    }

    private function prepareChartData(Product $product)
    {
        $transactions = $product->stockTransactions()
            ->orderBy('created_at', 'asc')
            ->get();

        $labels = [];
        $data = [];
        $cumulativeQuantity = 0;

        foreach ($transactions as $transaction) {
            if ($transaction->type === 'in') {
                $cumulativeQuantity += $transaction->quantity;
            } else {
                $cumulativeQuantity -= $transaction->quantity;
            }

            $labels[] = $transaction->created_at->format('M d, Y');
            $data[] = $cumulativeQuantity;
        }

        return [
            'labels' => $labels,
            'data' => $data,
        ];
    }
}
