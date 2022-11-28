<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\superadmin\menu_dokumen\DokumenController;
use App\Http\Controllers\superadmin\master_setup\RuangController;
use App\Http\Controllers\superadmin\master_setup\RakController;
use App\Http\Controllers\superadmin\master_setup\BoxController;
use App\Http\Controllers\superadmin\master_setup\KelengkapanController;
use App\Http\Controllers\superadmin\master_setup\MapController;
use App\Http\Controllers\superadmin\master_setup\DatauserController;
use App\Http\Controllers\superadmin\approval\PengarsipanController;
use App\Http\Controllers\superadmin\approval\PeminjamanController;
use App\Http\Controllers\superadmin\approval\PengembalianController;
use App\Http\Controllers\superadmin\approval\RetensiController;
use App\Http\Controllers\admin\riwayat\RiwayatpengarsipanController;
use App\Http\Controllers\admin\riwayat\RiwayatpeminjamanController;
use App\Http\Controllers\admin\riwayat\RiwayatpengembalianController;
use App\Http\Controllers\admin\riwayat\RiwayatretensiController;
use App\Http\Controllers\admin\dokumen\DokumenadminController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CekLevel;
use Illuminate\Routing\RouteGroup;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardController::class, 'beforelogin'])->name('first');

Route::get('/login', [LoginController::class, 'view_login'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/refreshCapcha', [LoginController::class, 'refreshCapcha']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'afterlogin'])->name('dashboard');
});

//// Untuk Admin ////
Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {
    //Menu Dokumen
    Route::get('/dokumen_admin', [DokumenadminController::class, 'index'])->name('dokumen');
    Route::get('/detail_dokumen/{id}', [DokumenadminController::class, 'detail_data'])->name('dokumen');
    //Menu Riwayat
    Route::get('/riwayat/riwayat_pengarsipan', [RiwayatpengarsipanController::class, 'index']);
    Route::get('/riwayat/riwayat_retensi', [RiwayatretensiController::class, 'index']);
    Route::get('/riwayat/riwayat_peminjaman', [RiwayatpeminjamanController::class, 'index']);
    Route::get('/riwayat/riwayat_pengembalian', [RiwayatpengembalianController::class, 'index']);
    // Untuk CRUD Dokumen
    Route::resource('/input_retensi_admin', DokumenadminController::class);
    Route::resource('/input_pengarsipan_admin', DokumenadminController::class);
});

//// Untuk User ////
Route::group(['middleware' => ['auth', 'ceklevel:user']], function () {
    Route::get('/dokumen_user', [UserController::class, 'index'])->name('dokumen');
    Route::get('/detail_dokumen/{id}', [UserController::class, 'detail_data'])->name('dokumen');
});

//// Untuk Super Admin ////
Route::group(['middleware' => ['auth', 'ceklevel:superadmin']], function () {
    //Menu Dokumen
    // Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen');
    Route::resource('/dokumen', DokumenController::class);
    Route::get('/detail_dokumen/{id}', [DokumenController::class, 'detail_data'])->name('dokumen');

    //Menu Master Setup
    Route::get('/master_setup/ruang', [RuangController::class, 'index'])->name('ruang');
    Route::get('/master_setup/rak', [RakController::class, 'index'])->name('rak');
    Route::get('/master_setup/box', [BoxController::class, 'index'])->name('box');
    Route::get('/master_setup/map', [MapController::class, 'index'])->name('map');
    Route::get('/master_setup/data_user', [DatauserController::class, 'index'])->name('data_user');
    Route::get('/master_setup/kelengkapan_dokumen', [KelengkapanController::class, 'index'])->name('kelengkapan_dokumen');

    // Menu Approval
    Route::get('/approval/pengarsipan', [PengarsipanController::class, 'index'])->name('pengarsipan');
    Route::get('/approval/retensi', [RetensiController::class, 'index'])->name('retensi');
    Route::get('/approval/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman');
    Route::get('/approval/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian');

    //Untuk CRUD Master Setup
    Route::resource('/ruang', RuangController::class);
    Route::resource('/rak', RakController::class);
    Route::resource('/box', BoxController::class);
    Route::resource('/map', MapController::class);
    Route::resource('/data_user', DatauserController::class);
    Route::resource('/kelengkapan', KelengkapanController::class);

    // Untuk CRUD Dokumen
    Route::resource('/input_retensi', DokumenController::class);
    Route::resource('/input_pengarsipan', DokumenController::class);
});

//Menu Profil
Route::get('/profil', [Controller::class, 'profil_pengguna'])->name('profil');
