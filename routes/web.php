<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\JobVacancyController;
use App\Http\Controllers\Frontend\HomeController; // <-- Tambahkan
use App\Http\Controllers\Frontend\ProductPageController; // <-- Tambahkan
use App\Http\Controllers\Frontend\JobVacancyPageController; // <-- Tambahkan

// --- Rute Frontend (Public) ---
// Rute Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute Daftar Produk
Route::get('/products', [ProductPageController::class, 'index'])->name('products.index');
// Rute Detail Produk (opsional, bisa ditambahkan nanti)
Route::get('/products/{product}', [ProductPageController::class, 'show'])->name('products.show');


// Rute Daftar Lowongan Karir
Route::get('/job-vacancies', [JobVacancyPageController::class, 'index'])->name('job-vacancies.index');
// Rute Detail Lowongan Karir (opsional, bisa ditambahkan nanti)
Route::get('/job-vacancies/{jobVacancy}', [JobVacancyPageController::class, 'show'])->name('job-vacancies.show');


// --- Rute Admin (Dilindungi Autentikasi) ---
Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('products', ProductController::class);
        Route::resource('job-vacancies', JobVacancyController::class);
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
