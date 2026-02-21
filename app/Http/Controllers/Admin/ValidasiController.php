<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;

class ValidasiController extends Controller
{
    public function index(){
        $buku = Buku::with('kategori')
        ->where('status', 'menunggu_validasi')
        ->get();

        return view('admin.validasi.index', compact('buku'));
    }

    public function detail(Buku $buku) {
        return view('admin.validasi.detail', compact('buku'));
    }

    public function verify(Buku $buku) {
        $buku->update([
            'status' => 'disetujui'
        ]);

        return redirect()->route('admin.validasi.index');
    }

    public function reject(Buku $buku) {
        $buku->update([
            'status' => 'ditolak',
        ]);

        return redirect()->route('admin.validasi.index');
    }
}
