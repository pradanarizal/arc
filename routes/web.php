<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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

Route::get('/', [LoginController::class, 'view_login'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/refreshCapcha', [LoginController::class, 'refreshCapcha']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Menu Super Admin
// Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {
//     Route::get('/dokumen', [SadminController::class, 'dokumen'])->name('dokumen');
// });

//// Untuk Admin ////
Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {
    Route::get('/dokumen_admin', [DokumenadminController::class, 'index'])->name('dokumen');
    Route::get('/riwayat/riwayat_pengarsipan', [RiwayatpengarsipanController::class, 'index']);
    Route::get('/riwayat/riwayat_retensi', [RiwayatretensiController::class, 'index']);
    Route::get('/riwayat/riwayat_peminjaman', [RiwayatpeminjamanController::class, 'index']);
    Route::get('/riwayat/riwayat_pengembalian', [RiwayatpengembalianController::class, 'index']);
});

//// Untuk User ////
Route::group(['middleware' => ['auth', 'ceklevel:user']], function () {
    Route::get('/dokumen', [UserController::class, 'dokumen'])->name('dokumen');
});

//// Untuk Super Admin ////
Route::group(['middleware' => ['auth', 'ceklevel:superadmin']], function () {
    //Menu Dokumen
    Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen');

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
});

//Menu Profil
Route::get('/profil', [Controller::class, 'profil_pengguna'])->name('profil');
