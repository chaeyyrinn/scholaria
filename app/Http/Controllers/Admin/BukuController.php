<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::with('kategori')
            ->get();
        return view('admin.data-buku.index', compact('buku'));
    }


    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.data-buku.create', compact('kategori'));
    }

    public function edit(Buku $buku)
    {
        $kategori = Kategori::all();
        return view('admin.data-buku.edit', compact('buku', 'kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required',
            'kategori_id' => 'required',
            'isbn' => 'required',
            'stok' => 'required',
            'cover' => 'required',
            'sinopsis' => 'required|string'
        ]);

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request
                ->file('cover')
                ->store('covers', 'public');
        }

        Buku::create([
            'judul' => $validated['judul'],
            'penulis' => $validated['penulis'],
            'penerbit' => $validated['penerbit'],
            'tahun_terbit' => $validated['tahun_terbit'],
            'kategori_id' => $validated['kategori_id'],
            'isbn' => $validated['isbn'],
            'stok' => $validated['stok'],
            'cover' => $validated['cover'],
            'sinopsis' => $validated['sinopsis'],
            'status' => 'disetujui'
        ]);

        return redirect()->route('admin.data-buku.index');
    }

    public function destroy(Buku $buku)
    {
        // hapus cover kalau ada
        if ($buku->cover && Storage::disk('public')->exists($buku->cover)) {
            Storage::disk('public')->delete($buku->cover);
        }

        $buku->delete();

        return redirect()
            ->route('admin.data-buku.index');
    }

    public function update(Request $request, Buku $buku)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required',
            'kategori_id' => 'required',
            'isbn' => 'required',
            'stok' => 'required',
            'cover' => 'required',
            'sinopsis' => 'required|string'
        ]);

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request
                ->file('cover')
                ->store('covers', 'public');
        }

        $buku->update([
            'judul' => $validated['judul'],
            'penulis' => $validated['penulis'],
            'penerbit' => $validated['penerbit'],
            'tahun_terbit' => $validated['tahun_terbit'],
            'kategori_id' => $validated['kategori_id'],
            'isbn' => $validated['isbn'],
            'stok' => $validated['stok'],
            'cover' => $validated['cover'],
            'sinopsis' => $validated['sinopsis'],
            'status' => 'disetujui'
        ]);

        return redirect()->route('admin.data-buku.index');
    }
}
