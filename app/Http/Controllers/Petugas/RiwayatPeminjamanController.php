<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Peminjam;
use Illuminate\Http\Request;

class RiwayatPeminjamanController extends Controller
{
    public function index(Request $request)
{
    $status = $request->status;

    $query = Peminjam::with(['buku', 'siswa']);

    if ($status) {
        $query->where('status', $status);
    }

    $dataPeminjaman = $query->latest()->get();

    return view('petugas.riwayat-peminjaman.index', compact('dataPeminjaman', 'status'));
}

}
