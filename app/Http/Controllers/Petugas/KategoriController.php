<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index() {
        $dataKategori = Kategori::all();

        return view('petugas.data-kategori.index', compact('dataKategori'));
    }

    public function create() {
        return view('petugas.data-kategori.create');
    }

    public function edit(Kategori $kategori) {
        return view('petugas.data-kategori.edit', compact('kategori'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);
        Kategori::create($validated);

        return redirect()->route('petugas.data-kategori.index');
    }

    public function update(Request $request, Kategori $kategori) {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);
        $kategori->update($validated);

        return redirect()->route('petugas.data-kategori.index');
    }

    public function destroy(Kategori $kategori) {
        $kategori->delete();

        return redirect()->route('petugas.data-kategori.index');
    }
}
