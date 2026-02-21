<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Peminjam;
use Illuminate\Http\Request;

class ValidasiController extends Controller
{
    public function index()
    {
        $dataPeminjaman = Peminjam::with(['buku', 'siswa'])->where('status', 'menunggu_validasi')->get();
        return view('petugas.validasi.index', compact('dataPeminjaman'));
    }

    public function detail(Peminjam $peminjam)
    {
        return view('petugas.validasi.detail', compact('peminjam'));
    }

    public function verify(Peminjam $peminjam){
        $peminjam->update([
            'status' => 'dipinjam'
        ]);
        return redirect()->route('petugas.validasi.index');
    }

    public function reject(Peminjam $peminjam){
        $peminjam->update([
            'status' => 'ditolak'
        ]);
        return redirect()->route('petugas.validasi.index');
    }
}
