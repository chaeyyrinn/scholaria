<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataPetugasController extends Controller
{
    public function index()
    {
        $petugas = User::where('role', 'petugas')
            ->get();
        return view('admin.data-petugas.index', compact('petugas'));
    }

    public function create()
    {
        return view('admin.data-petugas.create');
    }

    public function edit(User $petugas)
    {
        return view('admin.data-petugas.edit', compact('petugas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255|string',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'petugas',
        ]);

        return redirect()->route('admin.data-petugas.index')->with('success', 'Data petugas berhasil ditambahkan');
    }

    public function update(Request $request, User $petugas)
    {
        $request->validate([
            'nama' => 'required|max:255|string',
            'email' => 'required',
            'password' => 'nullable',
        ]);

        $data = $request->only('nama', 'email');

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $petugas->update($data);



        return redirect()->route('admin.data-petugas.index')->with('success', 'Data petugas berhasil diupdate');
    }

    public function destroy(User $petugas) {
        $petugas->delete();

        return redirect()->route('admin.data-petugas.index');
    }
}
