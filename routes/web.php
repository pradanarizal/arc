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
use App\Http\Controllers\superadmin\master_setup\DepartemenController;
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
Route::group(['middleware' => ['auth', 'cekaktif']], function () {
    Route::get('dashboard', [DashboardController::class, 'afterlogin'])->name('dashboard');
});

//// Untuk Admin ////
Route::group(['middleware' => ['auth', 'ceklevel:admin', 'cekaktif']], function () {
    //Menu Dokumen
    Route::get('/dokumen_admin', [DokumenadminController::class, 'index'])->name('dokumen');
    Route::get('/detail_dokumen_admin/{id}', [DokumenadminController::class, 'detail_data'])->name('dokumen');
    //Menu Riwayat
    Route::get('/riwayat/riwayat_pengarsipan', [RiwayatpengarsipanController::class, 'index']);
    Route::get('/riwayat/riwayat_retensi', [RiwayatretensiController::class, 'index']);
    Route::get('/riwayat/riwayat_peminjaman', [RiwayatpeminjamanController::class, 'index']);
    Route::get('/riwayat/riwayat_pengembalian', [RiwayatpengembalianController::class, 'index']);
    // Untuk CRUD Dokumen
    Route::resource('/input_retensi_admin', DokumenadminController::class);
    Route::resource('/input_pengarsipan_admin', DokumenadminController::class);
    Route::post('/input_peminjaman_dokumen/{no_dokumen}', [DokumenadminController::class, 'pinjam_dokumenById']);
    Route::post('/input_pengembalian_dokumen/{no_dokumen}', [DokumenadminController::class, 'pengembalian_dokumenById']);
    // showpdf
    Route::get('/showPdfAdmin/{nomorDokumen}', [DokumenadminController::class, 'showPdfAdmin'])->name('dokumen');
    //detail riwayat
    Route::get('/d_riwayat_pengarsipan/{id}', [RiwayatpengarsipanController::class, 'show_detail']);
    Route::get('/d_riwayat_retensi/{id}', [RiwayatretensiController::class, 'show_detail']);
    Route::get('/d_riwayat_peminjaman/{id}', [RiwayatpeminjamanController::class, 'show_detail']);
    Route::get('/d_riwayat_pengembalian/{id}', [RiwayatpengembalianController::class, 'show']);
    // Route::resource('/d_riwayat_pengembalian/{id}', RiwayatpengembalianController::class);
});

//// Untuk User ////
Route::group(['middleware' => ['auth', 'ceklevel:user', 'cekaktif']], function () {
    Route::get('/dokumen_user', [UserController::class, 'index'])->name('dokumen');
    Route::get('/detail_dokumen_user/{id}', [UserController::class, 'detail_data'])->name('dokumen');
    Route::get('/showPdfUser/{nomorDokumen}', [UserController::class, 'showPdfUser'])->name('dokumen');
});

//// Untuk Super Admin ////
Route::group(['middleware' => ['auth', 'ceklevel:superadmin', 'cekaktif']], function () {
    //Menu Dokumen
    // Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen');
    Route::resource('/dokumen', DokumenController::class);
    Route::get('/detail_dokumen/{id}', [DokumenController::class, 'detail_data'])->name('dokumen');

    //Menu Master Setup
    Route::get('/master_setup/ruang', [RuangController::class, 'index'])->name('ruang');
    Route::get('/master_setup/rak', [RakController::class, 'index'])->name('rak');
    Route::get('/master_setup/box', [BoxController::class, 'index'])->name('box');
    Route::get('/master_setup/map', [MapController::class, 'index'])->name('map');
    Route::get('/master_setup/data_departemen', [DepartemenController::class, 'index'])->name('data_departemen');
    Route::get('/master_setup/data_user', [DatauserController::class, 'index'])->name('data_user');
    Route::post('/master_setup/data_user/{id}', [DatauserController::class, 'update_password'])->name('data_user');
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
    Route::resource('/data_departemen', DepartemenController::class);
    Route::resource('/data_user', DatauserController::class);
    Route::resource('/kelengkapan', KelengkapanController::class);

    //get rak berdasarkan id ruang
    Route::get('/getRak/{id_ruang}', [RakController::class, 'detail_rak'])->name('getRak');
    //get box berdasarkan id rak
    Route::get('/getBox/{id_rak}', [BoxController::class, 'detail_box'])->name('getBox');

    Route::get('/getMap/{id_box}', [MapController::class, 'detail_map'])->name('getMap');

    // Route::get('/get_rak_pengarsipan/{id_ruang}', [PengarsipanController::class, 'lokasi_dokumen'])->name('get_rak_pengarsipan');


    // Untuk CRUD Dokumen
    Route::resource('/input_retensi', DokumenController::class);
    Route::resource('/input_pengarsipan', DokumenController::class);
    Route::resource('/softdelete', DokumenController::class);

    // Approval
    Route::resource('/retensi', RetensiController::class);
    Route::resource('/pengarsipan', PengarsipanController::class);
    Route::resource('/peminjaman', PeminjamanController::class);

    // show pdf
    Route::get('/showPdf/{nomorDokumen}', [DokumenController::class, 'showPdf'])->name('dokumen');
});

//Menu Profil
Route::get('/profil', [Controller::class, 'profil_pengguna'])->name('profil');
