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
});

require __DIR__.'/auth.php';

Route::get('/product', [ProductController::class, 'index'])->name('product-index');
Route::get('/product/create', [ProductController::class, 'create'])->name("product-create");
Route::post('/product', [ProductController::class, 'store'])->name("product-store");
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product-edit');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product-update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product-delete');

Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier-index');
Route::get('/supplier/create', [SupplierController::class, 'create'])->name("supplier-create");
Route::post('/supplier', [SupplierController::class, 'store'])->name("supplier-store");




// temporary
Route::get('/home', function () {
    return view('home');
});
// Route::resource('products', ProductController::class);
