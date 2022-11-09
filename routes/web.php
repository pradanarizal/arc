<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CekLevel;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

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
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// Menu Super Admin
Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {
    Route::get('/dokumen', [SadminController::class, 'dokumen'])->name('dokumen');
});

// Menu Admin
Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {
    Route::get('/dokumen', [AdminController::class, 'dokumen'])->name('dokumen');
});

// Menu User
Route::group(['middleware' => ['auth', 'ceklevel:user']], function () {
    Route::get('/dokumen', [UserController::class, 'dokumen'])->name('dokumen');
});

// Menu Super Admin
Route::group(['middleware' => ['auth', 'ceklevel:superadmin']], function () {
    Route::get('/profil', [Controller::class, 'profil_pengguna'])->name('profil');
    Route::get('/dokumen', [SuperadminController::class, 'dokumen'])->name('dokumen');
    // Route::get('/lokasipenyimpanan', [SuperadminController::class, 'lokasi_penyimpanan'])->name('lokasipenyimpanan');
    Route::get('/ruang', [SuperadminController::class, 'ruang'])->name('ruang');
    Route::get('/rak', [SuperadminController::class, 'rak'])->name('rak');
    Route::get('/box', [SuperadminController::class, 'box'])->name('box');
    Route::get('/map', [SuperadminController::class, 'map'])->name('map');
    Route::get('/data_user', [SuperadminController::class, 'data_user'])->name('data_user');
    Route::get('/kelengkapan_dokumen', [SuperadminController::class, 'kelengkapan_dokumen'])->name('kelengkapan_dokumen');
});
