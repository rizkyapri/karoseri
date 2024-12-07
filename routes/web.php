<?php

use App\Http\Controllers\ErrorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\TemplateController;
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
}); */

Route::fallback([ErrorController::class, 'index']);


Route::get('/', [GuestController::class, 'index'])->middleware('guest');

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', [TemplateController::class, 'index'])->middleware(['auth', 'check.role.status']);
Route::get('/about', [TemplateController::class, 'about'])->middleware(['auth', 'check.role.status']);

// KAROSESI PROGRESS
require __DIR__ . '/mainmenu-template.php';
require __DIR__ . '/mainmenu-master.php';
require __DIR__ . '/mainmenu-settings.php';
require __DIR__ . '/mainmenu-product.php';
require __DIR__ . '/mainmenu-supplier.php';
require __DIR__ . '/mainmenu-incoming.php';
require __DIR__ . '/mainmenu-outcoming.php';
