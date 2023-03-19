<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(static function () {

    Route::middleware(['role:admin'])->group(static function(){

        Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
        Route::get('/dashboard/products', [ProductController::class, 'showDashboard'])->name('products.dashboard');

        Route::get('/products/new', [ProductController::class, 'newProduct'])->name('products.new');
        Route::post('/products/create', [ProductController::class, 'createProduct'])->name('products.create');
        Route::get('/products/edit/{product}', [ProductController::class, 'editProduct'])->name('products.edit');
        Route::put('/products/update/{product}', [ProductController::class, 'updateProduct'])->name('products.update');

    });

});
