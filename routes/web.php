<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\superadmin\DokumenController;
use App\Http\Controllers\superadmin\master_setup\RuangController;
use App\Http\Controllers\superadmin\master_setup\RakController;
use App\Http\Controllers\superadmin\master_setup\BoxController;
use App\Http\Controllers\superadmin\master_setup\KelengkapanController;
use App\Http\Controllers\superadmin\master_setup\MapController;
use App\Http\Controllers\superadmin\master_setup\DatauserController;
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
    Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen');
    Route::get('/ruang', [RuangController::class, 'index'])->name('ruang');
    Route::resource('/ruang', RuangController::class);
    Route::get('/rak', [RakController::class, 'index'])->name('rak');
    Route::get('/box', [BoxController::class, 'index'])->name('box');
    Route::get('/map', [MapController::class, 'index'])->name('map');
    Route::get('/data_user', [DatauserController::class, 'index'])->name('data_user');
    Route::get('/kelengkapan_dokumen', [KelengkapanController::class, 'index'])->name('kelengkapan_dokumen');
});
