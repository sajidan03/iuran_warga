<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DuesCategoryController;
use App\Http\Controllers\DuesMemberController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('warga.dashboard');
    return view('landingPage');
});

Route::get('/login', [LoginController::class, 'loginView'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/warga/dashboard', [WargaController::class, 'dashboard'])->name('warga.dashboard')->middleware('auth');
Route::get('/warga/payment', [WargaController::class, 'tagihanWarga'])->name('warga.tagihan')->middleware('auth');
Route::get('/admin/dashboard', [AdminController::class, 'userView'])->name('admin.dashboard')->middleware('auth');
Route::get('/register', [LoginController::class, 'showRegister'])->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('register.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/user', [AdminController::class, 'userView'])->name('users.index')->middleware('auth');
Route::get('/user/edit/{id}', [AdminController::class, 'userEditView'])->name('users.edit')->middleware('auth');
Route::post('/user/edit/{id}', [AdminController::class, 'userEdit'])->name('users.edit')->middleware('auth');
Route::get('/user/add/user', [AdminController::class,'userTambahView'])->name('user.tambah')->middleware('auth');
Route::post('/user/add/user', [AdminController::class,'userTambah'])->name('user.tambah.post')->middleware('auth');
Route::post('/user/delete/{id}', [AdminController::class, 'userDelete'])->name('users.delete')->middleware('auth');
Route::get('/warga', [WargaController::class, 'wargaAdmin'])->name('warga.index');
// Route::get('/officer', [PetugasController::class, 'officerAdmin'])->name('officer.index');
// Route::resource('/jenisiuran', DuesCategoryController::class);
// Route::get('/officers', [AdminController::class, 'officersView'])->name('officers.index')->middleware('auth');
// Route::get('/officers/add', [AdminController::class, 'officerTambahView'])->name('officers.tambah')->middleware('auth');
// Route::post('/officers/add', [AdminController::class, 'officerTambah'])->name('officers.tambah.post')->middleware('auth');
// Route::post('/admin/jenis-iuran/tambah', [DuesCategoryController::class, 'store'])->name('admin.tambah.jenisIuran');
// Route::get('/admin/jenis-iuran/create', [DuesCategoryController::class, 'create'])->name('admin.jenisIuran.create');

Route::get('/officers', [PetugasController::class, 'officerAdmin'])->name('officers.index');
Route::get('/officers/create', [PetugasController::class, 'create'])->name('officers.create');
Route::post('/officers', [PetugasController::class, 'store'])->name('officers.store');
Route::delete('/officers/{officer}', [PetugasController::class, 'destroy'])->name('officers.destroy');

Route::prefix('admin')->group(function () {
    Route::get('jenis-iuran', [DuesCategoryController::class, 'index'])->name('admin.jenisIuran.index');
    Route::get('jenis-iuran/tambah', [DuesCategoryController::class, 'create'])->name('admin.jenisIuran.create');
    Route::post('jenis-iuran/tambah', [DuesCategoryController::class, 'store'])->name('admin.jenisIuran.store');
    Route::get('jenis-iuran/{id}/edit', [DuesCategoryController::class, 'edit'])->name('admin.jenisIuran.edit');
    Route::post('jenis-iuran/{id}/update', [DuesCategoryController::class, 'update'])->name('admin.jenisIuran.update');
    Route::post('jenis-iuran/{id}/hapus', [DuesCategoryController::class, 'destroy'])->name('admin.jenisIuran.delete');
});

Route::resource('dues_members', DuesMemberController::class);
Route::resource('payments', PaymentController::class);

Route::prefix('officer')->group(function () {
    Route::get('dashboard', [PetugasController::class, 'payment'])->name('officer.dashboard');
    Route::get('payment', [PetugasController::class, 'payment'])->name('officer.payment');
    Route::post('payment/{id}', [PetugasController::class, 'payment_detail'])->name('officer.payment.detail');
    Route::get('payment/{id}', [PetugasController::class, 'payment_detail'])->name('officer.payment.detail');
    Route::post('bayar/{member}', [PetugasController::class, 'bayar'])->name('officer.bayar');
});

