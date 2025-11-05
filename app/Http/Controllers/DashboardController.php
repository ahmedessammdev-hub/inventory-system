<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\StockTransaction;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalSuppliers = Supplier::count();
        $totalInventoryValue = Product::sum(\DB::raw('quantity * cost'));
        $lowStock = Product::where('quantity', '<', 5)->get();
        $recentTransactions = StockTransaction::with('product')->latest()->take(5)->get();

        return view('dashboard.index', compact(
            'totalProducts',
            'totalSuppliers',
            'totalInventoryValue',
            'lowStock',
            'recentTransactions'
        ));
    }
}
