<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
});

Route::get('/login', [LoginController::class, 'loginView'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/dashboard', [WargaController::class, 'dashboard'])->name('warga.dashboard')->middleware('auth');
