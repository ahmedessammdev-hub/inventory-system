<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockTransaction;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        // Get filter parameters
        $period = request('period', '7'); // Default 7 days
        $stockFilter = request('stock_filter', 'all'); // all, low, medium, high
        $sortBy = request('sort_by', 'quantity'); // quantity, value, name

        // Statistics Cards Data
        $totalProducts = Product::count();
        $totalStock = Product::sum('quantity');

        // Calculate total value properly
        $totalValue = Product::all()->sum(function($product) {
            return $product->quantity * $product->cost;
        });

        $lowStockCount = Product::where('quantity', '<', 10)->count();
        $mediumStockCount = Product::whereBetween('quantity', [10, 50])->count();
        $highStockCount = Product::where('quantity', '>', 50)->count();

        // Apply stock level filter
        $productsQuery = Product::query();
        if ($stockFilter === 'low') {
            $productsQuery->where('quantity', '<', 10);
        } elseif ($stockFilter === 'medium') {
            $productsQuery->whereBetween('quantity', [10, 50]);
        } elseif ($stockFilter === 'high') {
            $productsQuery->where('quantity', '>', 50);
        }

        // Apply sorting
        if ($sortBy === 'value') {
            $productsQuery->orderByRaw('quantity * cost DESC');
        } elseif ($sortBy === 'name') {
            $productsQuery->orderBy('name', 'asc');
        } else {
            $productsQuery->orderBy('quantity', 'desc');
        }

        // 1️⃣ Chart 1: Product Quantities (with filters)
        $products = $productsQuery->get();
        $productNames = $products->pluck('name');
        $productQuantities = $products->pluck('quantity');

        // 2️⃣ Chart 2: Inventory value per product (with filters)
        $inventoryValues = $products->map(function($product) {
            return [
                'name' => $product->name,
                'total_value' => $product->quantity * $product->cost
            ];
        });

        // 3️⃣ Chart 3: Stock in/out by day (with period filter)
        $stockData = StockTransaction::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw("SUM(CASE WHEN type = 'in' THEN quantity ELSE 0 END) as stock_in"),
            DB::raw("SUM(CASE WHEN type = 'out' THEN quantity ELSE 0 END) as stock_out")
        )
        ->where('created_at', '>=', now()->subDays($period))
        ->groupBy('date')
        ->orderBy('date', 'asc')
        ->get();

        // Additional Analytics
        $totalStockIn = StockTransaction::where('type', 'in')
            ->where('created_at', '>=', now()->subDays($period))
            ->sum('quantity');

        $totalStockOut = StockTransaction::where('type', 'out')
            ->where('created_at', '>=', now()->subDays($period))
            ->sum('quantity');

        // Calculate net change
        $netChange = $totalStockIn - $totalStockOut;

        // Top 5 products by quantity
        $topProducts = Product::orderBy('quantity', 'desc')->take(5)->get();

        // Top 5 products by value
        $topValueProducts = Product::select('*', DB::raw('quantity * cost as total_value'))
            ->orderByRaw('quantity * cost DESC')
            ->take(5)
            ->get();

        return view('reports.index', compact(
            'totalProducts',
            'totalStock',
            'totalValue',
            'lowStockCount',
            'mediumStockCount',
            'highStockCount',
            'productNames',
            'productQuantities',
            'inventoryValues',
            'stockData',
            'totalStockIn',
            'totalStockOut',
            'netChange',
            'topProducts',
            'topValueProducts',
            'period',
            'stockFilter',
            'sortBy'
        ));
    }
}
