<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjam;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $dataRiwayat = Peminjam::with(['siswa', 'buku'])->get();
        return view('admin.data-riwayat.index', compact('dataRiwayat'));
    }
}
