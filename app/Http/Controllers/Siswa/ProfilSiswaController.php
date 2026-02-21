<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\ProfilSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilSiswaController extends Controller
{
    
    public function index()
    {
        $profil = ProfilSiswa::where('user_id', Auth::id())->first();

        return view('siswa.profil.index', compact('profil'));
    }

    public function edit()
    {
        $profil = ProfilSiswa::where('user_id', Auth::id())->first();

        return view('siswa.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $profil = ProfilSiswa::firstOrCreate(
            ['user_id' => Auth::id()]
        );

        if ($request->hasFile('foto_profil')) {
            if ($profil->foto_profil) {
                Storage::delete($profil->foto_profil);
            }

            $path = $request->file('foto_profil')->store('foto-profil');
            $profil->foto_profil = $path;
        }

        $profil->update([
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()
            ->route('siswa.profil.index')
            ->with('success', 'Profil berhasil diperbarui');
    }
}
