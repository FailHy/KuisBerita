<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BeritaController;
use App\Models\Article;

// =======================
// RUTE PUBLIK
// =======================

// Halaman utama
Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('auth.login');

// Halaman berita
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/show/{article}', [BeritaController::class, 'show'])->name('berita.show');

// =======================
// RUTE DASHBOARD KE BERITA.INDEX (user harus login)
// =======================
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return redirect()->route('berita.index');
})->name('dashboard');

// =======================
// RUTE PROFIL USER
// =======================
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// =======================
// RUTE ADMIN: CRUD BERITA
// =======================
Route::middleware(['auth', 'admin'])->prefix('berita')->name('berita.')->group(function () {
    Route::get('/create', [BeritaController::class, 'create'])->name('create');
    Route::post('/store', [BeritaController::class, 'store'])->name('store');
    Route::get('/edit/{article}', [BeritaController::class, 'edit'])->name('edit');
    Route::put('/update/{article}', [BeritaController::class, 'update'])->name('update');
    Route::delete('/delete/{article}', [BeritaController::class, 'destroy'])->name('destroy');
});

// =======================
// AUTHENTIKASI (Laravel Breeze / Jetstream / dll)
// =======================
require __DIR__.'/auth.php';
