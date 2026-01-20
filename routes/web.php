<?php

use App\Http\Controllers\Admin\DashboardController as DashboardAdminController;
use App\Http\Controllers\Admin\DataSiswaController;
use App\Http\Controllers\Petugas\DashboardController as DashboardPetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Siswa\DashboardController as DashboardSiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->group(function (){
    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/data-siswa', [DataSiswaController::class, 'index'])->name('admin.data-siswa');
});

Route::prefix('petugas')->group(function (){
    Route::get('/dashboard', [DashboardPetugasController::class, 'index'])->name('petugas.dashboard');
});

// Manajemen Route Role Siswa
Route::prefix('siswa')->group(function () {
    Route::get('/dashboard', [DashboardSiswaController::class, 'index'])->name('siswa.dashboard');
});

require __DIR__.'/auth.php';
