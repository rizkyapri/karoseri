<?php

use App\Http\Controllers\AppFiturController;
use App\Http\Controllers\AppProfileController;
use App\Http\Controllers\DataGuruController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\KompetensiKeahlianController;
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


// Route::fallback([TemplateController::class, 'error_pages']);

/* Route::middleware(['auth'])->group(function () {
    Route::resource('app_fiturs', AppFiturController::class);
    Route::post('app_fiturs/toggle-aktif', [AppFiturController::class, 'toggleAktif'])->name('app_fiturs.toggleAktif');

    Route::get('app_profiles', [AppProfileController::class, 'show'])->name('app_profiles.show');
    Route::get('app_profiles/edit', [AppProfileController::class, 'edit'])->name('app_profiles.edit');
    Route::put('app_profiles', [AppProfileController::class, 'update'])->name('app_profiles.update');
    //Route::get('/app_fiturs', [AppFiturController::class, 'index'])->name('app_fiturs');

    Route::get('/master_profil', [MasterController::class, 'master_profil'])->name('master_profil');
}); */
//TOOLS
Route::middleware(['auth', 'role:Admin', 'verified'])->prefix('tools')->group(function () {


    Route::resource('app_fiturs', AppFiturController::class);
    Route::post('app_fiturs/toggle-aktif', [AppFiturController::class, 'toggleAktif'])->name('app_fiturs.toggleAktif');

    Route::get('app_profiles', [AppProfileController::class, 'show'])->name('app_profiles.show');
    Route::get('app_profiles/edit', [AppProfileController::class, 'edit'])->name('app_profiles.edit');
    Route::put('app_profiles', [AppProfileController::class, 'update'])->name('app_profiles.update');
    //Route::get('/app_fiturs', [AppFiturController::class, 'index'])->name('app_fiturs');

    Route::get('/opsi_aplikasi', [MasterController::class, 'tools_opsi_aplikasi'])->name('opsi_aplikasi');
    Route::get('/impor_data_master', [MasterController::class, 'tools_impor_data_master'])->name('impor_data_master');
    Route::get('/ekspor_data_master', [MasterController::class, 'tools_ekspor_data_master'])->name('ekspor_data_master');
    Route::get('/backup_database', [MasterController::class, 'tools_backup_database'])->name('backup_database');
    Route::get('/data_login', [MasterController::class, 'tools_data_login'])->name('data_login');
});

//Profil Admin
// groups middleware
Route::middleware('auth')->group(function () {
    Route::middleware('role:Admin|Purchasing|Gudang')->prefix('settings/profile')->group(function () {
        Route::get('/profil_admin', [MasterController::class, 'master_profil'])->name('profil_admin');
        Route::get('/profil_admin/edit', [MasterController::class, 'master_profil_edit'])->name('profil_admin.edit');
        Route::put('/profil_admin', [MasterController::class, 'master_profil_update'])->name('profil_admin.update');
    });
});
