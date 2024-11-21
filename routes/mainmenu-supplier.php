<?php

use App\Http\Controllers\SupplierController;
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
    Route::middleware('role:Admin|Purchasing|Gudang')->prefix('supplier')->group(function () {
        Route::get('/index', [SupplierController::class, 'index'])->name('supplier.index');
    });

    Route::middleware('role:Admin|Purchasing')->prefix('supplier')->group(function () {
        Route::get('/create', [SupplierController::class, 'create'])->name('supplier.create');
        Route::post('/create', [SupplierController::class, 'store'])->name('supplier.store');
        Route::get('/show/{id}', [SupplierController::class, 'show'])->name('supplier.show');
        Route::get('/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
        Route::put('/{id}', [SupplierController::class, 'update'])->name('supplier.update');
        Route::delete('/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
    });
});
