<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StockTransactionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::middleware(['auth', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile routes - accessible to all authenticated users
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/edit', [ProfileController::class, 'update'])->name('profile.edit.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Supplier routes - only accessible to admin
    Route::middleware('role:admin')->group(function () {
        Route::resource('suppliers', SupplierController::class);
        Route::resource('users', UserController::class);
    });

    // Product routes - accessible to admin and warehouse_manager
    Route::middleware('role:admin,warehouse_manager')->group(function () {
        Route::get('products/{product}/details', [ProductController::class, 'showDetails'])->name('products.details');
        Route::resource('products', ProductController::class);
    });

    // Stock transaction routes - accessible to admin and warehouse_manager
    Route::middleware('role:admin,warehouse_manager')->group(function () {
        Route::resource('stock', StockTransactionController::class);
        Route::post('stock/{stock}/reverse', [StockTransactionController::class, 'reverse'])->name('stock.reverse');
    });

    // Reports - accessible to admin and warehouse_manager
    Route::middleware('role:admin,warehouse_manager')->group(function () {
        Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    });
});

require __DIR__.'/auth.php';
