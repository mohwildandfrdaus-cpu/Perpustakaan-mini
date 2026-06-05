<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\AuthController;

// AUTH ROUTES (TANPA LOGIN)
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Google OAuth
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

// Guest Mode
Route::get('/guest', [AuthController::class, 'guestLogin'])->name('guest.login');

// PROTECTED ROUTES (PERLU LOGIN)
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('buku.index');
    });
    
    Route::resource('buku', BukuController::class);
    Route::resource('anggota', AnggotaController::class)->parameters(['anggota' => 'anggota']);
    Route::resource('peminjaman', PeminjamanController::class)->parameters(['peminjaman' => 'peminjaman']);
});