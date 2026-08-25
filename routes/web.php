<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\OrdersController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('front.layout');


//* [categories]
Route::get('/categories/trash', [CategoriesController::class, 'trash'])->name('categories.trash');
Route::put('/categories/{category}/restore', [CategoriesController::class, 'restore'])->name('categories.restore');
Route::delete('/categories/{category}/force-delete', [CategoriesController::class, 'forceDelete'])->name('categories.force-delete');
Route::resource('/categories', controller: CategoriesController::class);



//* [products]
// Route::get('/products', [CategoriesController::class, 'index'])->name('product.index');
// Route::get('/products/{product:slug}', [CategoriesController::class, 'show'])->name('product.show');
// Route::resource('/products', controller: ProductsController::class);
Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
Route::get('/products/{product:slug}', [ProductsController::class, 'show'])->name('products.show');
Route::get('/products/{id}/edit', [ProductsController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductsController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');




//* [orders]
Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');



// Route::get('/creates', [DashBoardController::class, 'creates'])->name('categories.creates');


