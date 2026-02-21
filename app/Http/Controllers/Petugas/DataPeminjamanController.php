<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjam;
use Illuminate\Http\Request;

class DataPeminjamanController extends Controller
{
    public function index() {
        $dataPeminjaman = Peminjam::with(['siswa', 'buku'])
        ->where('status', 'dipinjam')
        ->get();
        return view('petugas.data-peminjaman.index', compact('dataPeminjaman'));
    }

    public function confirmation(Peminjam $peminjam) {
        $peminjam->update([
            'status' => 'dikembalikan'
        ]);

        $buku = Buku::findOrFail($peminjam->buku_id);
        $buku->increment('stok', $peminjam->jumlah);
        
        return redirect()->route('petugas.data-peminjaman.index');
    }
}
