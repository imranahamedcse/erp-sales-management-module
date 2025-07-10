<?php

use Illuminate\Support\Facades\Route;
use Modules\Sales\Http\Controllers\CustomerController;
use Modules\Sales\Http\Controllers\ProductController;
use Modules\Sales\Http\Controllers\SaleController;
use Modules\Sales\Http\Controllers\SalesController;
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
        Route::get('/{sale}', [SaleController::class, 'show'])->name('sales.show');
        Route::get('/{sale}/edit', [SaleController::class, 'edit'])->name('sales.edit');
        Route::put('/{sale}', [SaleController::class, 'update'])->name('sales.update');
        Route::delete('/{sale}', [SaleController::class, 'destroy'])->name('sales.delete');

        // Trash Routes
        Route::get('/trash', [SaleController::class, 'trash'])->name('sales.trash');
        Route::post('/trash/{id}/restore', [SaleController::class, 'restore'])->name('sales.restore');
        Route::delete('/trash/{id}/force-delete', [SaleController::class, 'forceDelete'])->name('sales.force-delete');
    });

    // Products Routes
    Route::resource('products', ProductController::class)->except(['destroy']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.delete');

    // Customers Routes
    Route::resource('customers', CustomerController::class)->except(['destroy']);
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
