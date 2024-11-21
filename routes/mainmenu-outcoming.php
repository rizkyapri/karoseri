<?php

use App\Http\Controllers\IncomingController;
use App\Http\Controllers\OutcomingController;
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
    Route::middleware('role:Admin|Purchasing|Gudang')->prefix('outcoming')->group(function () {
        Route::get('/index', [OutcomingController::class, 'index'])->name('outcoming.index');
        Route::get('/cetak/{id}', [OutcomingController::class, 'cetak_pdf'])->name('outcoming.print');
    });
    Route::middleware('role:Admin')->prefix('outcoming')->group(function () {
        Route::get('/create', [OutcomingController::class, 'create'])->name('outcoming.create');
        Route::post('/create', [OutcomingController::class, 'store'])->name('outcoming.store');
        Route::get('/show/{id}', [OutcomingController::class, 'show'])->name('outcoming.show');
        Route::get('/edit/{id}', [OutcomingController::class, 'edit'])->name('outcoming.edit');
        Route::put('/{id}', [OutcomingController::class, 'update'])->name('outcoming.update');
        Route::delete('/{id}', [OutcomingController::class, 'destroy'])->name('outcoming.destroy');
    });
});
