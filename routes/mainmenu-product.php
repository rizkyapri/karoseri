<?php

use App\Http\Controllers\KomponenController;
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


//KOMPONEN

Route::middleware('auth')->group(function () {

    // Rute untuk melihat produk (role: Admin, Purchasing, Gudang)
    Route::middleware(['permission:lihat-komponen'])->prefix('komponen')->group(function () {
        Route::get('/index', [KomponenController::class, 'index'])->name('komponen.index');
    });

    // Rute untuk menambahkan, mengedit, dan menghapus produk (role: Admin, Purchasing)
    Route::middleware('permission:tambah-komponen')->prefix('komponen')->group(function () {
        Route::get('/create', [KomponenController::class, 'create'])->name('komponen.create');
        Route::post('/create', [KomponenController::class, 'store'])->name('komponen.store');
    });

    Route::middleware('permission:edit-komponen')->prefix('komponen')->group(function () {
        Route::get('/edit/{id}', [KomponenController::class, 'edit'])->name('komponen.edit');
        Route::put('/{id}', [KomponenController::class, 'update'])->name('komponen.update');
    });

    Route::middleware('permission:hapus-komponen')->prefix('komponen')->group(function () {
        Route::delete('/{id}', [KomponenController::class, 'destroy'])->name('komponen.destroy');
    });

    Route::middleware('permission:lihat-komponen')->prefix('komponen')->group(function () {
        Route::get('/show/{id}', [KomponenController::class, 'show'])->name('komponen.show');
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
