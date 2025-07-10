<?php

use Illuminate\Support\Facades\Route;
use Modules\Sales\Http\Controllers\CustomerController;
use Modules\Sales\Http\Controllers\ProductController;
use Modules\Sales\Http\Controllers\SaleController;
use Modules\Sales\Http\Controllers\SalesController;
use Modules\Sales\Http\Controllers\TrashController;
use Modules\Sales\Models\Customer;
use Modules\Sales\Models\Note;
use Modules\Sales\Models\Product;
use Modules\Sales\Models\Sale;

Route::middleware(['auth', 'verified'])->group(function () {
    // Sales Routes
    Route::prefix('sales')->group(function () {
        Route::get('/', [SaleController::class, 'index'])->name('sales.index');
        Route::get('/create', [SaleController::class, 'create'])->name('sales.create');
        Route::post('/', [SaleController::class, 'store'])->name('sales.store');
        
        Route::delete('/{sale}', [SaleController::class, 'destroy'])->name('sales.delete');
    });

    Route::prefix('trash')->group(function () {
        Route::get('/', [TrashController::class, 'index'])->name('trash.index');
        Route::post('/restore/{type}/{id}', [TrashController::class, 'restore'])->name('trash.restore');
    });

    // Products Routes
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.delete');

    // Customers Routes
    Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.delete');

    // Dashboard Route
    Route::get('/dashboard', function () {
        $salesCount = Sale::count();
        $customersCount = Customer::count();
        $productsCount = Product::count();
        $noteCount = Note::count();

        return view('sales::dashboard', compact('salesCount', 'customersCount', 'productsCount', 'noteCount'));
    })->name('dashboard');
});
