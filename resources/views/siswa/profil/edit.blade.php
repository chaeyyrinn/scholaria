<x-app-layout>
    <div class="max-w-4xl mx-auto px-6 py-10">

        <h1 class="text-2xl font-bold text-[#3B346D] mb-6">
            ✏️ Edit Profil
        </h1>

        <form
            action="{{ route('siswa.profil.update') }}"
            method="POST"
            enctype="multipart/form-data"
            class="bg-white rounded-2xl shadow-md p-6 space-y-5">
            @csrf

            <div>
                <label class="text-sm">Alamat</label>
                <textarea name="alamat"
                    class="w-full border rounded-lg px-4 py-2"
                    required>{{ old('alamat', $profil->alamat ?? '') }}</textarea>
            </div>

            <div>
                <label class="text-sm">Nomor Telepon</label>
                <input type="text"
                    name="nomor_telepon"
                    value="{{ old('nomor_telepon', $profil->nomor_telepon ?? '') }}"
                    class="w-full border rounded-lg px-4 py-2"
                    required>
            </div>

            <div>
                <label class="text-sm">Jenis Kelamin</label>
                <select name="jenis_kelamin"
                    class="w-full border rounded-lg px-4 py-2"
                    required>
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki" @selected(($profil->jenis_kelamin ?? '') == 'Laki-laki')>Laki-laki</option>
                    <option value="Perempuan" @selected(($profil->jenis_kelamin ?? '') == 'Perempuan')>Perempuan</option>
                </select>
            </div>

            <div>
                <label class="text-sm">Foto Profil</label>
                <input type="file"
                    name="foto_profil"
                    class="w-full border rounded-lg px-4 py-2">
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('siswa.profil.index') }}"
                    class="px-5 py-2 border rounded-lg">
                    Batal
                </a>

                <button
                    type="submit"
                    class="px-6 py-2 bg-[#3B346D] text-white rounded-lg">
                    Simpan
                </button>
            </div>
        </form>

    </div>
</x-app-layout>
