<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

// USER
Route::middleware(['auth', 'permission:lihat-user', 'verified'])->prefix('settings/user')->group(function () {
    Route::get('/index', [UserController::class, 'index'])->name('user.index');
    Route::get('/create', [UserController::class, 'create'])->middleware('permission:tambah-user')->name('user.create');
    Route::post('/create', [UserController::class, 'store'])->middleware('permission:tambah-user')->name('user.store');
    Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->middleware('permission:edit-user')->name('user.edit');
    Route::put('/{id}', [UserController::class, 'update'])->middleware('permission:edit-user')->name('user.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->middleware('permission:hapus-user')->name('user.destroy');
});

// ROLE
Route::middleware(['auth', 'permission:lihat-role', 'verified'])->prefix('settings')->group(function () {
    Route::resource('roles', RoleController::class)
        ->middleware([
            'index' => 'permission:lihat-role',
            'store' => 'permission:tambah-role',
            'update' => 'permission:edit-role',
            'destroy' => 'permission:hapus-role',
        ]);
});

// PERMISSION
Route::middleware(['auth', 'permission:lihat-permission', 'verified'])->prefix('settings')->group(function () {
    Route::resource('permissions', PermissionController::class)
        ->middleware([
            'index' => 'permission:lihat-permission',
            'store' => 'permission:tambah-permission',
            'update' => 'permission:edit-permission',
            'destroy' => 'permission:hapus-permission',
        ]);
});

// USER
//  Route::middleware(['auth', 'role_or_permission:Admin|lihat-user', 'verified'])->prefix('settings/user')->group(function () {
//     Route::get('/index', [UserController::class, 'index'])->name('user.index');
//     Route::get('/create', [UserController::class, 'create'])->name('user.create');
//     Route::post('/create', [UserController::class, 'store'])->name('user.store');
//     Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
//     Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
//     Route::put('/{id}', [UserController::class, 'update'])->name('user.update');
//     Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
// });

// Route::middleware(['auth', 'role:Admin', 'verified'])->prefix('settings')->group(function () {
//     // route resource role dan permission
//     Route::resource('roles', RoleController::class);
//     Route::resource('permissions', PermissionController::class);

// });