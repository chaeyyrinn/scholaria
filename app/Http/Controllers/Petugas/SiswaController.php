<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataSiswaController extends Controller
{
    // Tampilkan daftar siswa
    public function index()
    {
        $data = User::where('role', 'siswa')->latest()->get();
        return view('petugas.data-siswa.index', compact('data'));
    }

    // Form tambah siswa
    public function create()
    {
        return view('petugas.data-siswa.create');
    }

    // Simpan siswa baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'siswa',
        ]);

        return redirect()
            ->route('petugas.data-siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    // Form edit siswa
    public function edit($id)
    {
        $siswa = User::where('role', 'siswa')->findOrFail($id);
        return view('petugas.data-siswa.edit', compact('siswa'));
    }

    // Update siswa
    public function update(Request $request, $id)
    {
        $siswa = User::where('role', 'siswa')->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $siswa->id,
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $siswa->update($data);

        return redirect()
            ->route('petugas.data-siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    // Hapus siswa
    public function destroy($id)
    {
        $siswa = User::where('role', 'siswa')->findOrFail($id);
        $siswa->delete();

        return redirect()
            ->route('petugas.data-siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}
