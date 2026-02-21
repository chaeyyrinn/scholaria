<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Ulasan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class GenerateLaporanController extends Controller
{
    public function dataSiswa() {
        $siswa = User::where('role', 'siswa')->get();

        $pdf = Pdf::loadView('admin.laporan.data-siswa', compact('siswa'))
                ->setPaper('A4', 'landscape');

        return $pdf->download('laporan-data-siswa.pdf');
    }

    public function dataPetugas() {
        $petugas = User::where('role', 'petugas')->get();

        $pdf = Pdf::loadView('admin.laporan.data-petugas', compact('petugas'))
                ->setPaper('A4', 'landscape');

        return $pdf->download('laporan-data-petugas.pdf');
    }

    public function dataBuku() {
        $buku = Buku::with('kategori')->get();

        $pdf = Pdf::loadView('admin.laporan.data-buku', compact('buku'))
                ->setPaper('A4', 'landscape');
        
        return $pdf->download('laporan-data-buku.pdf');
    }

    public function dataKategori() {
        $kategori = Kategori::all();

        $pdf = Pdf::loadView('admin.laporan.data-kategori', compact('kategori'))
                ->setPaper('A4', 'landscape');
        
        return $pdf->download('laporan-data-kategori.pdf');
    }

    public function dataUlasan() {
        $ulasan = Ulasan::with('user', 'buku')->get();

        $pdf = Pdf::loadView('admin.laporan.data-ulasan', compact('ulasan'))
                ->setPaper('A4', 'landscape');
        
        return $pdf->download('laporan-data-ulasan.pdf');
    }
}
