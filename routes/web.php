<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ResepController;
use Illuminate\Support\Facades\Auth;

// LANDING PAGE
Route::get('/', function () {
    return view('welcome');
});

// ====================== USER ======================
Route::get('/registrasi', [UserController::class, 'tampilRegistrasi'])->name('registrasi');
Route::post('/registrasi/submit', [UserController::class, 'submitRegistrasi'])->name('registrasi.submit');

Route::post('/login/submit', [UserController::class, 'submitLogin'])->name('login.submit');
Route::get('/login', [UserController::class, 'tampilLogin'])->name('login.tampil');

Route::get('/user/jabar', [UserController::class, 'jabar'])->name('user.jabar');
Route::get('/user/jatim', [UserController::class, 'jatim'])->name('user.jatim');
Route::get('/user/jateng', [UserController::class, 'jateng'])->name('user.jateng');

Route::get('/landing', [UserController::class, 'landing'])->name('landing');
Route::post('/logout', [UserController::class, 'logout'])->name('logout'); // ✅ Logout pakai POST

Route::get('/resep/{id}', [ResepController::class, 'show'])->name('resep');
Route::get('/resep-admin/{id}', [ResepController::class, 'detail'])->name('resep-adm.detail');
Route::get('admin/resep-adm/detail/{id}', [AdminController::class, 'detail'])->name('admin.resep.detail');
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/reseps/create', [ResepController::class, 'create'])->name('reseps.create'); // Route untuk form
    Route::post('/admin/reseps', [ResepController::class, 'store'])->name('reseps.store'); // Route untuk menyimpan data
});
Route::middleware(['auth'])->group(function () {
    Route::get('/user/reseps/create', [UserController::class, 'create'])->name('reseps.create'); // Route untuk form
    Route::post('/user/reseps', [UserController::class, 'store'])->name('reseps.store'); // Route untuk menyimpan data
    Route::get('/resep/{id}', [UserController::class, 'show'])->name('resep.detail');

});
// ====================== ADMIN ======================
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'tampilLogin'])->name('admin.login');
    Route::post('/login/submit', [AdminController::class, 'submitLogin'])->name('admin.login.submit');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::put('/update', [AdminController::class, 'update'])->name('admin.update');//my akun admin
    Route::get('/kelola-user', [AdminController::class, 'kelolaUser'])->name('admin.kelola-user');
    Route::get('/kelola-resep-user', [AdminController::class, 'kelolaResepUser'])->name('admin.kelola-resep-user');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout'); // ✅ Logout admin pakai POST
    });

    // ====================== RESEP ADMIN ======================
    Route::resource('resep-adm', ResepController::class);
});

Route::get('/akun', [UserController::class, 'akun'])->name('user.akun');

    
Route::middleware(['auth'])->group(function () {
    Route::get('/user/landing', [UserController::class, 'landing'])->name('user.landing');
    Route::get('/user/tambah', [UserController::class, 'tambah'])->name('user.tambah');
    Route::post('/tambah', [UserController::class, 'store'])->name('tambah.store');
    Route::get('/resep/{id}/edit', [UserController::class, 'edit'])->name('resep.edit');
    Route::put('/resep/{id}', [UserController::class, 'ganti'])->name('resep.ganti');
    Route::get('/akun', [UserController::class, 'akun'])->name('user.akun');
    Route::put('/akun', [UserController::class, 'update'])->name('akun.update');
});

