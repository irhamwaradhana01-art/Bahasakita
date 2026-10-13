<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Rute untuk halaman login (hanya bisa diakses jika belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [UserController::class, 'login'])->name('login.post');
});

// Rute untuk proses logout
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

// Halaman beranda sementara setelah berhasil login
Route::middleware('auth')->get('/beranda', function () {
    return view('beranda');
})->name('beranda');