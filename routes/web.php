<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\UsulanController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\UmkmController;

Route::get('/', [HomeController::class, 'index'])->name('home.guest');
Route::get('/profile', [HomeController::class, 'profile']);
Route::get('/potensi', [HomeController::class, 'potensi']);
Route::get('/berita', [HomeController::class, 'berita']);
Route::get('/sotk', [HomeController::class, 'sotk']);
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'loginPage'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/pengaduan', PengaduanController::class);
    Route::resource('/usulan', UsulanController::class);
    Route::resource('/aspirasi', AspirasiController::class);
    Route::resource('/umkm', UmkmController::class);
    Route::get('/visitors/data', [TamuController::class, 'getData'])->name('visitors.data');
    Route::resource('/visitors', TamuController::class);
    // ajax ========================================================
    Route::get('/aspiration/data', [AspirasiController::class, 'getData'])->name('aspiration.data');
    Route::get('/usulan/data', [UsulanController::class, 'getData'])->name('usulan.data');
    // ajax ========================================================

    Route::put('/dashboard-home/{id}', [DashboardController::class, 'updateHome']);
    Route::put('/dashboard-home-information/{id}', [DashboardController::class, 'updateHomeInformation']);
    Route::put('/dashboard-home-job-information', [DashboardController::class, 'updateHomeJobInformation']);
    Route::put('/dashboard-profile/{id}', [DashboardController::class, 'updateProfile']);
    Route::put('/dashboard-potensi/{id}', [DashboardController::class, 'updatePotensi']);
    Route::put('/dashboard-berita/{id}', [DashboardController::class, 'updateBerita']);
    Route::put('/dashboard-sotk/{id}', [DashboardController::class, 'updateSotk']);
    Route::put('/dashboard-footer/{id}', [DashboardController::class, 'updateFooter']);

    Route::get('/dashboard-home', [DashboardController::class, 'homeView']);
    Route::get('/dashboard-profile', [DashboardController::class, 'profileView']);
    Route::get('/dashboard-potensi', [DashboardController::class, 'potensiView']);
    Route::get('/dashboard-berita', [DashboardController::class, 'beritaView']);
    Route::get('/dashboard-sotk', [DashboardController::class, 'sotkView']);
    Route::get('/dashboard-footer', [DashboardController::class, 'footerView']);
});