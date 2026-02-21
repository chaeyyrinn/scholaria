<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Peminjam;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index()
    {
        $dataPeminjaman = Peminjam::with([
            'buku.ulasan' => function ($query) {
                $query->where('user_id', Auth::id());
            }
        ])
            ->where('siswa_id', Auth::id())
            ->get();

            return view('siswa.riwayat.index', compact('dataPeminjaman'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUlasan(Request $request)
    {
        $request->validate([
            'buku_id' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'required'
        ]);

        $exists = Ulasan::where('buku_id', $request->buku_id)
            ->where('user_id', Auth::id())
            ->exists();

        if ($exists) {
            return back()->with('error', 'Kamu sudah memberi ulasan untuk buku ini');
        }

        Ulasan::create([
            'buku_id' => $request->buku_id,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'ulasan' => $request->ulasan,
        ]);

        return back()->with('success', 'Ulasan berhasil dikirim');
    }
}
