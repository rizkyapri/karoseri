<?php

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

/* Route::get('/', function () {
    return view('welcome');
});
 */

Route::middleware('auth')->group(function () {

    // Rute untuk melihat produk (role: Admin, Purchasing, Gudang)
    Route::middleware(['permission:lihat-produk'])->prefix('product')->group(function () {
        Route::get('/index', [ProductController::class, 'index'])->name('product.index');
    });

    // Rute untuk menambahkan, mengedit, dan menghapus produk (role: Admin, Purchasing)
    Route::middleware('permission:tambah-produk')->prefix('product')->group(function () {
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/create', [ProductController::class, 'store'])->name('product.store');
    });

    Route::middleware('permission:edit-produk')->prefix('product')->group(function () {
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/{id}', [ProductController::class, 'update'])->name('product.update');
    });

    Route::middleware('permission:hapus-produk')->prefix('product')->group(function () {
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    });

    Route::middleware('permission:lihat-produk')->prefix('product')->group(function () {
        Route::get('/show/{id}', [ProductController::class, 'show'])->name('product.show');
    });
});

// Route::middleware('auth')->group(function () {

//     Route::middleware('role:Admin|Purchasing|Gudang')->prefix('product')->group(function () {
//         Route::get('/index', [ProductController::class, 'index'])->name('product.index');
//     });
//     Route::middleware('role:Admin|Purchasing')->prefix('product')->group(function () {
//         Route::get('/create', [ProductController::class, 'create'])->name('product.create');
//         Route::post('/create', [ProductController::class, 'store'])->name('product.store');
//         Route::get('/show/{id}', [ProductController::class, 'show'])->name('product.show');
//         Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
//         Route::put('/{id}', [ProductController::class, 'update'])->name('product.update');
//         Route::delete('/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
//     });
// });
