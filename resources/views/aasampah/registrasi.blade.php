<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="container bg-white p-4 rounded shadow" style="max-width: 400px;">
        <h2 class="text-center mb-4">Form Registrasi</h2>
        <form action="{{ route('registrasi.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Daftar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
 






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

Route::post('/login/submit', [UserController::class, 'submitlogin'])->name('login.submit');
Route::get('/login', [UserController::class, 'tampilLogin'])->name('login.tampil');

Route::get('/user/jabar', [UserController::class, 'jabar'])->name('user.jabar');
Route::get('/user/jatim', [UserController::class, 'jatim'])->name('user.jatim');
Route::get('/user/jateng', [UserController::class, 'jateng'])->name('user.jateng');

Route::get('/landing', [UserController::class, 'landing'])->name('landing');
Route::get('/user/landing', [UserController::class, 'landing'])->name('user.landing');
Route::post('/logout', [UserController::class, 'logout'])->name('logout'); // ✅ Logout pakai POST
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('/resep/{id}', [ResepController::class, 'show'])->name('resep');

Route::post('/tambah', [UserController::class, 'store'])->name('tambah.store');
Route::get('/user/tambah', [UserController::class, 'tambah'])->name('user.tambah');

// ====================== ADMIN ======================
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'tampilLogin'])->name('admin.login');
    Route::post('/login/submit', [AdminController::class, 'submitLogin'])->name('admin.login.submit');

    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::put('/update', [AdminController::class, 'update'])->name('admin.update');
        Route::get('/kelola-user', [AdminController::class, 'kelolaUser'])->name('admin.kelola-user');
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout'); // ✅ Logout admin pakai POST
    });

    // ====================== RESEP ADMIN ======================
    Route::resource('resep-adm', ResepController::class);
});

