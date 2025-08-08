<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('warga.dashboard');
    return view('landingPage');
});

Route::get('/login', [LoginController::class, 'loginView'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/warga/dashboard', [WargaController::class, 'dashboard'])->name('warga.dashboard')->middleware('auth');
Route::get('/admin/dashboard', [AdminController::class, 'dashboardAdmin'])->name('admin.dashboard')->middleware('auth');
Route::get('/register', [LoginController::class, 'showRegister'])->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('register.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/user', [AdminController::class, 'userView'])->name('users.index')->middleware('auth');
Route::get('/user/edit/{id}', [AdminController::class, 'userEditView'])->name('users.edit')->middleware('auth');
Route::post('/user/edit/{id}', [AdminController::class, 'userEdit'])->name('users.edit')->middleware('auth');
Route::get('/user/add/user', [AdminController::class,'userTambahView'])->name('user.tambah')->middleware('auth');
Route::post('/user/add/user', [AdminController::class,'userTambah'])->name('user.tambah.post')->middleware('auth');
Route::post('/user/delete/{id}', [AdminController::class, 'userDelete'])->name('users.delete')->middleware('auth');

Route::get('/officers', [AdminController::class, 'officersView'])->name('officers.index')->middleware('auth');
Route::get('/officers/add', [AdminController::class, 'officerTambahView'])->name('officers.tambah')->middleware('auth');
Route::post('/officers/add', [AdminController::class, 'officerTambah'])->name('officers.tambah.post')->middleware('auth');
