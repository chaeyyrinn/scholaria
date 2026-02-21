<?php

namespace App\Http\Controllers\Siswa;

use App\Events\PeminjamanBerhasil;
use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Notifikasi;
use App\Models\Peminjam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PeminjamanController extends Controller
{
    public function create(Buku $buku)
    {
        return view('siswa.peminjaman.create', compact('buku'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:buku,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date',
        ]);

        $buku = Buku::findOrFail($request->buku_id);

        if ($buku->stok < $request->jumlah) {
            return back()->with('error', 'Stok buku tidak mencukupi');
        }

        $peminjaman = Peminjam::create([
            'siswa_id' => Auth::id(),
            'buku_id' => $buku->id,
            'jumlah' => $request->jumlah,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'status' => 'menunggu_validasi',
        ]);

        $buku->decrement('stok', $request->jumlah);

        // 🔥 Data notifikasi
        $notifData = [
            'judul' => $buku->judul,
            'jumlah' => $peminjaman->jumlah,
            'nama_siswa' => Auth::user()->nama,
            'tanggal' => now()->format('d M Y H:i'),
            'tipe' => 'peminjaman_diajukan',
        ];

        // 🔔 Fire Event realtime
        event(new PeminjamanBerhasil($notifData));

        // 💾 Simpan notifikasi di DB untuk semua petugas
        $petugas = User::where('role', 'petugas')->get();

        foreach ($petugas as $p) {
            Notifikasi::create([
                'user_id' => $p->id,
                'judul' => 'Peminjaman Baru',
                'isi' => "{$notifData['nama_siswa']} mengajukan peminjaman {$notifData['judul']} ({$notifData['jumlah']})",
                'tipe' => $notifData['tipe'],
            ]);
        }

        return redirect()->route('siswa.peminjaman.bukti', $peminjaman->id);
    }


    public function bukti(Peminjam $peminjaman)
    {
        // keamanan: cuma pemilik yang bisa lihat
        if ($peminjaman->siswa_id !== Auth::id()) {
            abort(403);
        }

        return view('siswa.peminjaman.bukti', compact('peminjaman'));
    }
}
