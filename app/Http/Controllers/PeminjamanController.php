<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Peminjam;
use App\Models\User;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjams = Peminjam::with(['siswa','buku'])->get();
        return view('peminjaman.index', compact('peminjams'));
    }

    public function create()
    {
        $bukus = Buku::where(['stok', '>', 0])->get();
        $users = user::all();
        return view('peminjaman.index', compact('Bukus', 'Users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'buku_id' => 'required',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date'
        ]);

    Peminjam::create([
        'siswa_id' => $request->siswa_id,
        'buku_id' => $request->buku_id,
        'tanggal_peminjaman' => $request->tanggal_peminjaman,
        'tanggal_pengembalian' => $request->tanggal_pengembalian,
        'status_pengembalian' => 'dipinjam'
    ]);

    Buku::where('id', $request->buku_id)->decrement('stok');
    return redirect()->route('peminjaman.index')->with('success', 'Buku berhasil dipinjam');
    }

    public function pengembalian(Peminjam $peminjam)
    {
        $peminjam->update([
            'status_pengembalian' => 'Dikembalikan',
            'tanggal_kembali' => Carbon::now()

        ]);
        Buku::where('id', $peminjam->buku_id)->increment('stok');
        return redirect()->back() ->with('success', 'Buku berhasil dikembalikan');
    }
}
