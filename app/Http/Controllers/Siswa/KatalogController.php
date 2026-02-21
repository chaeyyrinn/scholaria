<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KatalogController extends Controller
{
    public function index() {
        // Kalo index tuh load banyak data makanya pake get()
        $dataBuku = Buku::with('kategori')
        ->where('status', 'disetujui')
        ->get();
        return view('siswa.katalog.index', compact('dataBuku'));
    }

    public function detail(Buku $buku) {
        return view('siswa.katalog.detail', compact('buku'));
    }


     public function store(Request $request)
    {
        $validated = $request->validate([
            'buku_id' => 'required|exists:buku,id',
            'jumlah' => 'required',
            'tanggal_pengembalian' => 'required'
        ]);

        $buku = Buku::findOrFail($validated['buku_id']);

        // ❌ Jika stok habis
        if ($buku->stok < 1) {
            return back()->with('error', 'Stok buku habis');
        }

        // ❌ Jika siswa masih meminjam buku yang sama
        $cek = Peminjam::where('siswa_id', Auth::id())
            ->where('buku_id', $buku->id)
            ->where('status_pengembalian', 'dipinjam')
            ->exists();

        if ($cek) {
            return back()->with('error', 'Kamu masih meminjam buku ini');
        }

        // ✅ Simpan peminjaman
        Peminjam::create([
            'siswa_id' => Auth::id(),
            'buku_id' => $buku->id,
            'jumlah' => $validated['jumlah'],
            'tanggal_peminjaman' => now(),
            'status_pengembalian' => 'dipinjam',
        ]);

        // ✅ Kurangi stok buku
        $buku->decrement($validated['jumlah']);

        return redirect()
            ->route('siswa.katalog.index')
            ->with('success', 'Buku berhasil dipinjam');
    }

    public function create(Buku $buku){
        return view('siswa.katalog.create', compact('buku'));
    }
}
