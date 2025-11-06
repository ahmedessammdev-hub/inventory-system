<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockTransaction;
use Illuminate\Http\Request;

class StockTransactionController extends Controller
{
    /**
     * Display a listing of stock transactions with filters and statistics.
     */
    public function index(Request $request)
    {
        $query = StockTransaction::with(['product', 'user']);

        // Apply search filter across products, SKU, and users
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('reason', 'like', "%{$searchTerm}%")
                  ->orWhereHas('product', function($productQuery) use ($searchTerm) {
                      $productQuery->withTrashed() // Include soft deleted products in search
                                   ->where('name', 'like', "%{$searchTerm}%")
                                   ->orWhere('sku', 'like', "%{$searchTerm}%");
                  })
                  ->orWhereHas('user', function($userQuery) use ($searchTerm) {
                      $userQuery->where('name', 'like', "%{$searchTerm}%");
                  });
            });
        }

        // Filter by transaction type
        if ($request->filled('type_filter')) {
            $query->where('type', $request->type_filter);
        }

        // Filter by product
        if ($request->filled('product_filter')) {
            $query->where('product_id', $request->product_filter);
        }

        // Filter by user
        if ($request->filled('user_filter')) {
            $query->where('user_id', $request->user_filter);
        }

        // Filter by date range
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortDirection = $request->get('sort_direction', 'desc');

        if (in_array($sortBy, ['created_at', 'quantity', 'type'])) {
            $query->orderBy($sortBy, $sortDirection);
        } else {
            $query->latest();
        }

        $transactions = $query->paginate(15);
        $transactions->appends($request->all()); // Keep filters in pagination links

        // Calculate statistics for dashboard cards
        $totalTransactions = StockTransaction::count();
        $stockInCount = StockTransaction::where('type', 'in')->count();
        $stockOutCount = StockTransaction::where('type', 'out')->count();
        $totalStockIn = StockTransaction::where('type', 'in')->sum('quantity');
        $totalStockOut = StockTransaction::where('type', 'out')->sum('quantity');
        $recentTransactions = StockTransaction::where('created_at', '>=', now()->subDays(7))->count();

        // Load dropdown options for filters (include soft deleted products)
        $products = Product::withTrashed()->orderBy('name')->get();
        $users = \App\Models\User::orderBy('name')->get();

        return view('stock.index', compact(
            'transactions',
            'totalTransactions',
            'stockInCount',
            'stockOutCount',
            'totalStockIn',
            'totalStockOut',
            'recentTransactions',
            'products',
            'users'
        ));
    }

    /**
     * Show the form for creating a new stock transaction.
     */
    public function create()
    {
        // Only show active (non-deleted) products for new transactions
        $products = Product::orderBy('name')->get();
        return view('stock.create', compact('products'));
    }

    /**
     * Store a new stock transaction and update product quantity.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'reason' => 'nullable|string|max:255',
        ]);

        // Get the product to update its quantity
        $product = Product::find($request->product_id);

        // Validate stock availability for 'out' transactions
        if ($request->type === 'out') {
            if ($product->quantity < $request->quantity) {
                return back()
                    ->withInput()
                    ->withErrors(['quantity' => 'Not enough stock for this product. Available: ' . $product->quantity]);
            }
        }

        // Create the stock transaction with authenticated user
        $transaction = StockTransaction::create([
            ...$validated,
            'user_id' => auth()->id(),
        ]);

        // Update product quantity based on transaction type
        if ($request->type === 'in') {
            $product->quantity += $request->quantity;
        } else {
            $product->quantity -= $request->quantity;
        }

        $product->save();

        return redirect()->route('stock.index')->with('success', 'Stock transaction recorded successfully.');
    }

    /**
     * Prevent deletion to preserve complete inventory history.
     */
    public function destroy(StockTransaction $stock)
    {
        return redirect()->route('stock.index')
            ->with('error', 'Deleting stock transactions is not allowed to preserve inventory history.');
    }

    /**
     * Create a reverse transaction to undo the effects of an existing transaction.
     */
    public function reverse(StockTransaction $stock)
    {
        $product = $stock->product;

        // Determine the opposite transaction type
        $reverseType = $stock->type === 'in' ? 'out' : 'in';

        // Validate that reversing won't result in negative stock
        if ($reverseType === 'out' && $product->quantity < $stock->quantity) {
            return redirect()->route('stock.index')
                ->with('error', 'Cannot reverse this transaction. Not enough stock available. Current stock: ' . $product->quantity);
        }

        // Create a new reverse transaction
        $reverseTransaction = StockTransaction::create([
            'product_id' => $stock->product_id,
            'type' => $reverseType,
            'quantity' => $stock->quantity,
            'reason' => 'Reverse of transaction #' . $stock->id . ($stock->reason ? ' (' . $stock->reason . ')' : ''),
            'user_id' => auth()->id(),
        ]);

        // Update product quantity
        if ($reverseType === 'in') {
            $product->quantity += $stock->quantity;
        } else {
            $product->quantity -= $stock->quantity;
        }
        $product->save();

        return redirect()->route('stock.index')
            ->with('success', 'Reverse transaction created successfully. Transaction #' . $reverseTransaction->id . ' has been recorded.');
    }
}
