<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjam;  
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
public function buku() {
    $buku = Buku::with('kategori')->get();

    $pdf = Pdf::loadView('petugas.laporan.buku', compact('buku'))
              ->setPaper('A4', 'portrait');
    return $pdf->download('laporan-data-buku.pdf');
}


public function peminjaman()
{
    $peminjaman = Peminjam::with(['siswa', 'buku'])->get();

    $pdf = Pdf::loadView('petugas.laporan.peminjaman', compact('peminjaman'))
              ->setPaper('A4', 'landscape');

    return $pdf->download('laporan-peminjaman.pdf');
}
}
