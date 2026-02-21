<?php

use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\DashboardController as DashboardAdminController;
use App\Http\Controllers\Admin\DataPetugasController;
use App\Http\Controllers\Admin\DataSiswaController;
use App\Http\Controllers\Admin\GenerateLaporanController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\RiwayatController;
use App\Http\Controllers\Admin\UlasanController as AdminUlasanController;
use App\Http\Controllers\Admin\ValidasiController;
use App\Http\Controllers\Petugas\BukuController as PetugasBukuController;
use App\Http\Controllers\Petugas\DashboardController as DashboardPetugasController;
use App\Http\Controllers\Petugas\DataPeminjamanController;
use App\Http\Controllers\Petugas\DataSiswaController as PetugasDataSiswaController;
use App\Http\Controllers\Petugas\KategoriController as PetugasKategoriController;
use App\Http\Controllers\Petugas\LaporanController;
use App\Http\Controllers\Petugas\ProfilePetugasController;
use App\Http\Controllers\Petugas\RiwayatPeminjamanController;
use App\Http\Controllers\Petugas\ValidasiController as PetugasValidasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Siswa\BukuSayaController;
use App\Http\Controllers\Siswa\DashboardController as DashboardSiswaController;
use App\Http\Controllers\Siswa\KatalogController;
use App\Http\Controllers\Siswa\PeminjamanController;
use App\Http\Controllers\Siswa\PengembalianController;
use App\Http\Controllers\Siswa\ProfilSiswaController;
use App\Http\Controllers\Siswa\RiwayatController as SiswaRiwayatController;
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

/* =======================
   ADMIN
======================= */
Route::prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/data-siswa', [DataSiswaController::class, 'index'])->name('admin.data-siswa');

    // Data Petugas
    Route::get('/data-petugas/index', [DataPetugasController::class, 'index'])->name('admin.data-petugas.index');
    Route::get('/data-petugas/create', [DataPetugasController::class, 'create'])->name('admin.data-petugas.create');
    Route::get('/data-petugas/{petugas}/edit', [DataPetugasController::class, 'edit'])->name('admin.data-petugas.edit');
    Route::post('/data-petugas/store', [DataPetugasController::class, 'store'])->name('admin.data-petugas.store');
    Route::put('/data-petugas/{petugas}/update', [DataPetugasController::class, 'update'])->name('admin.data-petugas.update');
    Route::delete('/admin/data-petugas/{petugas}', [DataPetugasController::class, 'destroy'])->name('admin.data-petugas.destroy');

    // Data Kategori
    Route::get('/data-kategori/index', [KategoriController::class, 'index'])->name('admin.data-kategori.index');
    Route::get('/data-kategori/create', [KategoriController::class, 'create'])->name('admin.data-kategori.create');
    Route::get('/data-kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('admin.data-kategori.edit');
    Route::post('/data-kategori/store', [KategoriController::class, 'store'])->name('admin.data-kategori.store');
    Route::put('/data-kategori/{kategori}/update', [KategoriController::class, 'update'])->name('admin.data-kategori.update');
    Route::delete('/admin/data-kategori/{kategori}', [KategoriController::class, 'destroy'])->name('admin.data-kategori.destroy');


    // Data Buku
    Route::get('/data-buku/index', [BukuController::class, 'index'])->name('admin.data-buku.index');
    Route::get('/data-buku/create', [BukuController::class, 'create'])->name('admin.data-buku.create');
    Route::get('/data-buku/{buku}/edit', [BukuController::class, 'edit'])->name('admin.data-buku.edit');
    Route::post('/data-buku/store', [BukuController::class, 'store'])->name('admin.data-buku.store');
    Route::put('/data-buku/{buku}/update', [BukuController::class, 'update'])->name('admin.data-buku.update');
    Route::delete('/admin/data-buku/{buku}', [BukuController::class, 'destroy'])->name('admin.data-buku.destroy');


    // Validasi Buku
    Route::get('/validasi', [ValidasiController::class, 'index'])->name('admin.validasi.index');
    Route::get('/validasi/{buku}', [ValidasiController::class, 'detail'])->name('admin.validasi.detail');
    Route::put('/validasi/{buku}/verify', [ValidasiController::class, 'verify'])->name('admin.validasi.verifikasi');
    Route::put('/validasi/{buku}/reject', [ValidasiController::class, 'reject'])->name('admin.validasi.reject');

    // Riwayat
    Route::get('/data-riwayat/index', [RiwayatController::class, 'index'])->name('admin.data-riwayat.index');
    
    Route::get('/data-ulasan/index', [AdminUlasanController::class, 'index'])->name('admin.data-ulasan.index');
    Route::delete('/data-ulasan/{ulasan}', [AdminUlasanController::class, 'destroy'])->name('admin.data-ulasan.destroy');


    Route::get('/laporan/siswa', [GenerateLaporanController::class, 'dataSiswa'])->name('admin.laporan.data-siswa');
    Route::get('/laporan/buku', [GenerateLaporanController::class, 'dataBuku'])->name('admin.laporan.data-buku');
    Route::get('/laporan/kategori', [GenerateLaporanController::class, 'dataKategori'])->name('admin.laporan.data-kategori');
    Route::get('/laporan/petugas', [GenerateLaporanController::class, 'dataPetugas'])->name('admin.laporan.data-petugas');
    Route::get('/laporan/ulasan', [GenerateLaporanController::class, 'dataUlasan'])->name('admin.laporan.data-ulasan');
});


/* =======================
   PETUGAS
======================= */
Route::prefix('petugas')->group(function () {

    Route::get('/dashboard', [DashboardPetugasController::class, 'index'])->name('petugas.dashboard');

    Route::get('/data-siswa', [PetugasDataSiswaController::class, 'index'])->name('petugas.data-siswa');

    
    Route::get('/data-kategori', [PetugasKategoriController::class, 'index'])->name('petugas.data-kategori.index');
    Route::get('/data-kategori/create', [PetugasKategoriController::class, 'create'])->name('petugas.data-kategori.create');
    Route::get('/data-kategori/{kategori}/edit', [PetugasKategoriController::class, 'edit'])->name('petugas.data-kategori.edit');
    Route::post('/data-kategori/store', [PetugasKategoriController::class, 'store'])->name('petugas.data-kategori.store');
    Route::put('/data-kategori/{kategori}/update', [PetugasKategoriController::class, 'update'])->name('petugas.data-kategori.update');
    Route::delete('/data-kategori/{kategori}/destroy', [PetugasKategoriController::class, 'destroy'])->name('petugas.data-kategori.destroy');
    
    Route::get('/data-buku', [PetugasBukuController::class, 'index'])->name('petugas.data-buku.index');
    Route::get('/data-buku/create', [PetugasBukuController::class, 'create'])->name('petugas.data-buku.create');
    Route::get('/data-buku/{buku}/edit', [PetugasBukuController::class, 'edit'])->name('petugas.data-buku.edit');
    Route::post('/data-buku/store', [PetugasBukuController::class, 'store'])->name('petugas.data-buku.store');
    Route::put('/data-buku/{buku}/update', [PetugasBukuController::class, 'update'])->name('petugas.data-buku.update');
    Route::delete('/data-buku/{buku}/destroy', [PetugasBukuController::class, 'destroy'])->name('petugas.data-buku.destroy');

    Route::get('/data-peminjaman', [DataPeminjamanController::class, 'index'])->name('petugas.data-peminjaman.index');

    Route::put('/data-peminjaman/{peminjam}/confirmation',[DataPeminjamanController::class, 'confirmation'])->name('petugas.data-peminjaman.confirmation');

    Route::get('/validasi', [PetugasValidasiController::class, 'index'])->name('petugas.validasi.index');
    Route::get('/validasi/{peminjam}', [PetugasValidasiController::class, 'detail'])->name('petugas.validasi.detail');

    Route::put('/validasi/{peminjam}/verify', [PetugasValidasiController::class, 'verify'])->name('petugas.validasi.verify');
    Route::put('/validasi/{peminjam}/reject', [PetugasValidasiController::class, 'reject'])->name('petugas.validasi.reject');

    Route::get('riwayat-petugas', [RiwayatPeminjamanController::class, 'index'])->name('petugas.riwayat-peminjaman.index');

    Route::get('/profile', [ProfilePetugasController::class, 'index'])->name('petugas.profil.index');

    Route::get('/profile/edit', [ProfilePetugasController::class, 'edit'])->name('petugas.profil.edit');

    Route::put('/profile', [ProfilePetugasController::class, 'update'])->name('petugas.profil.update');

    Route::get('/petugas/laporan/buku',[LaporanController::class, 'buku'])->name('petugas.laporan.buku');
    Route::get('/petugas/laporan/peminjaman', [LaporanController::class, 'peminjaman'])->name('petugas.laporan.peminjaman');
    });


/* =======================
   SISWA
======================= */
Route::prefix('siswa')->group(function () {

    Route::get('/dashboard', [DashboardSiswaController::class, 'index'])->name('siswa.dashboard');

    Route::get('/buku-saya', [BukuSayaController::class, 'index'])->name('siswa.buku-saya.index');
    Route::post('/buku-saya/perpanjang/{id}', [BukuSayaController::class, 'ajukanPerpanjangan'])->name('siswa.perpanjang');


    Route::get('/katalog', [KatalogController::class, 'index'])->name('siswa.katalog.index');
    Route::get('/detail/{buku}', [KatalogController::class, 'detail'])->name('siswa.katalog.detail');

    Route::get('/peminjaman/{buku}', [PeminjamanController::class, 'create'])->name('siswa.form-peminjaman.create');
    Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('siswa.peminjaman.store');
    Route::get('/peminjaman/{peminjaman}/bukti',[PeminjamanController::class, 'bukti'])->name('siswa.peminjaman.bukti');


    Route::get('/riwayat', [SiswaRiwayatController::class, 'index'])->name('siswa.riwayat.index');

    Route::post('/ulasan/store', [SiswaRiwayatController::class, 'storeUlasan'])->name('siswa.ulasan.store');

    Route::get('/profil', [ProfilSiswaController::class, 'index'])->name('siswa.profil.index');

    Route::get('/profil/edit', [ProfilSiswaController::class, 'edit'])->name('siswa.profil.edit');

    Route::post('/profil/update', [ProfilSiswaController::class, 'update'])->name('siswa.profil.update');

    Route::get('/peminjaman/bukti/{peminjaman}', [PeminjamanController::class, 'bukti'])->name('siswa.peminjaman.bukti');

    Route::put('/buku-saya/pengembalian/{id}', [PengembalianController::class, 'ajukan'])->name('siswa.pengembalian.ajukan');

    });

require __DIR__ . '/auth.php';
