<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::with('kategori')
            ->get();
        return view('petugas.data-buku.index', compact('buku'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('petugas.data-buku.create', compact('kategori'));
    }

    public function edit(Buku $buku)
    {
        $kategori = Kategori::all();
        return view('petugas.data-buku.edit', compact('buku', 'kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required|numeric',
            'isbn' => 'required',
            'cover' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'stok' => 'required|numeric',
            'sinopsis' => 'required',
            'penerbit' => 'required',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        // 🔥 SIMPAN FILE
        $coverPath = $request->file('cover')->store('covers', 'public');

        Buku::create([
            'judul' => $validated['judul'],
            'penulis' => $validated['penulis'],
            'tahun_terbit' => $validated['tahun_terbit'],
            'isbn' => $validated['isbn'],
            'cover' => $coverPath,
            'stok' => $validated['stok'],
            'sinopsis' => $validated['sinopsis'],
            'penerbit' => $validated['penerbit'],
            'kategori_id' => $validated['kategori_id'],
            'status' => 'menunggu_validasi',
        ]);

        return redirect()
            ->route('petugas.data-buku.index')
            ->with('success', 'Buku berhasil diajukan');
    }


    public function update(Request $request, Buku $buku)
    {
        $validated = $request->validate([
            'judul' => 'nullable|string',
            'penulis' => 'nullable|string',
            'tahun_terbit' => 'nullable|numeric',
            'isbn' => 'nullable|string',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'stok' => 'nullable|numeric',
            'sinopsis' => 'nullable|string',
            'penerbit' => 'nullable|string',
            'kategori_id' => 'nullable|exists:kategori,id',
        ]);


        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
            $buku->cover = $coverPath;
        }


        $buku->update([
            'judul' => $validated['judul'] ?? $buku->judul,
            'penulis' => $validated['penulis'] ?? $buku->penulis,
            'isbn' => $validated['isbn'] ?? $buku->isbn,
            'stok' => $validated['stok'] ?? $buku->stok,
            'sinopsis' => $validated['sinopsis'] ?? $buku->sinopsis,
            'penerbit' => $validated['penerbit'] ?? $buku->penerbit,
            'kategori_id' => $validated['kategori_id'] ?? $buku->kategori_id,
        ]);


        return redirect()->route('petugas.data-buku.index');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect()->route('petugas.data-buku.index');
    }
}
