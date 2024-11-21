<?php

use App\Http\Controllers\IncomingController;
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
    Route::middleware('role:Admin|Gudang|Purchasing')->prefix('incoming')->group(function () {
        Route::get('/index', [IncomingController::class, 'index'])->name('incoming.index');
    });
    Route::middleware('role:Admin|Gudang')->prefix('incoming')->group(function () {
        Route::get('/create', [IncomingController::class, 'create'])->name('incoming.create');
        Route::post('/create', [IncomingController::class, 'store'])->name('incoming.store');
        Route::get('/show/{id}', [IncomingController::class, 'show'])->name('incoming.show');
        Route::get('/edit/{id}', [IncomingController::class, 'edit'])->name('incoming.edit');
        Route::put('/{id}', [IncomingController::class, 'update'])->name('incoming.update');
        Route::delete('/{id}', [IncomingController::class, 'destroy'])->name('incoming.destroy');
    });
});
