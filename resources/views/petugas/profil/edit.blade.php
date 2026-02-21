<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">
        <div class="bg-white rounded-xl shadow p-6">

            <h2 class="text-xl font-semibold mb-6">Edit Profil</h2>

            <form method="POST"
                  action="{{ route('petugas.profil.update') }}"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                {{-- FOTO --}}
                <div class="mb-4">
                    <label class="block mb-2 font-medium">Foto Profil</label>

                    @if ($profil && $profil->foto_profil)
                        <img src="{{ asset('storage/' . $profil->foto_profil) }}"
                             class="w-20 h-20 rounded-full object-cover mb-2">
                    @endif

                    <input type="file" name="foto_profil"
                           class="block w-full text-sm border rounded">
                </div>

                {{-- ALAMAT --}}
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Alamat</label>
                    <textarea name="alamat"
                              class="w-full border rounded px-3 py-2"
                              rows="3">{{ old('alamat', $profil->alamat ?? '') }}</textarea>
                </div>

                {{-- NO HP --}}
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Nomor Telepon</label>
                    <input type="text"
                           name="nomor_telepon"
                           value="{{ old('nomor_telepon', $profil->nomor_telepon ?? '') }}"
                           class="w-full border rounded px-3 py-2">
                </div>

                {{-- JENIS KELAMIN --}}
                <div class="mb-6">
                    <label class="block mb-1 font-medium">Jenis Kelamin</label>
                    <select name="jenis_kelamin"
                            class="w-full border rounded px-3 py-2">
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki"
                            {{ old('jenis_kelamin', $profil->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>
                            Laki-laki
                        </option>
                        <option value="Perempuan"
                            {{ old('jenis_kelamin', $profil->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>
                    </select>
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                            class="px-5 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                        Simpan
                    </button>

                    <a href="{{ route('petugas.profil.index') }}"
                       class="px-5 py-2 bg-gray-300 rounded-lg">
                        Batal
                    </a>
                </div>

            </form>

        </div>
    </div>
</x-app-layout>
