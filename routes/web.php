<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified', 'RoleCheck:admin'])->name('dashboard');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'RoleCheck:admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/product', [ProductController::class, 'index'])->name('product-index');
    Route::get('/product/create', [ProductController::class, 'create'])->name("product-create");
    Route::post('/product', [ProductController::class, 'store'])->name("product-store");
    Route::get('/product/{id}', [ProductController::class, 'show'])->name("product-detail");
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product-edit');
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('product-update');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product-delete');
    Route::get('/export', [ProductController::class, 'export'])->name('product-export');

    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier-index');
    Route::get('/supplier/create', [SupplierController::class, 'create'])->name("supplier-create");
    Route::post('/supplier', [SupplierController::class, 'store'])->name("supplier-store");
    Route::post('/supplier', [SupplierController::class, 'store'])->name("supplier-store");
    Route::get('/supplier/{id}', [SupplierController::class, 'show'])->name("supplier-detail");
    Route::get('/supplier/{id}/edit', [SupplierController::class, 'edit'])->name('supplier-edit');
    Route::put('/supplier/{id}', [SupplierController::class, 'update'])->name('supplier-update');
    Route::delete('/supplier/{id}', [SupplierController::class, 'destroy'])->name('supplier-delete');

});

require __DIR__.'/auth.php';

// temporary
Route::get('/home', function () {
    return view('home');
});
// Route::resource('products', ProductController::class);
