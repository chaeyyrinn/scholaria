<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'buku_id' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'required'
        ]);
    }
}
