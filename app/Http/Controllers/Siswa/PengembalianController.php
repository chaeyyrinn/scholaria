<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Peminjam;
use Illuminate\Support\Facades\Auth;

class PengembalianController extends Controller
{
    public function ajukan($id)
    {
        $peminjam = Peminjam::where('id', $id)
            ->where('siswa_id', Auth::id())
            ->firstOrFail();

        if ($peminjam->status !== 'dipinjam') {
            return back()->with('error', 'Pengembalian tidak dapat diajukan.');
        }

        $peminjam->status = 'menunggu_pengembalian';
        $peminjam->save();

        return back()->with('success', 'Pengajuan pengembalian berhasil.');
    }
}
