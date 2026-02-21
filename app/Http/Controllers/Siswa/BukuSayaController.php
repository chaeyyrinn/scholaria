<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BukuSayaController extends Controller
{
    public function index()
    {
        $dataBuku = Peminjam::with('buku')
            ->where('siswa_id', Auth::id())
            ->where('status', 'dipinjam')
            ->get();

        return view('siswa.buku-saya.index', compact('dataBuku'));
    }

    public function ajukanPerpanjangan(Request $request, $id)
    {
        $request->validate([
            'tanggal_pengembalian' => 'required|date|after:today',
        ]);

        $peminjaman = Peminjam::where('id', $id)
            ->where('siswa_id', Auth::id())
            ->where('status', 'dipinjam')
            ->firstOrFail();

        $peminjaman->update([
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'status' => 'menunggu_validasi',
        ]);

        return back()->with('success', 'Permintaan perpanjangan berhasil dikirim');
    }
}
