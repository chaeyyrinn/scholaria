<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ajukan Buku Baru
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto bg-white p-6 shadow rounded">
            <form action="{{ route('petugas.data-buku.store') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="block">Kategori</label>
                    <select name="kategori_id" class="w-full border rounded px-3 py-2" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($kategori as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block">Judul</label>
                    <input type="text" name="judul" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block">Penulis</label>
                    <input type="text" name="penulis" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block">Penerbit</label>
                    <input type="text" name="penerbit" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block">Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block">ISBN</label>
                    <input type="text" name="isbn" class="w-full border rounded px-3 py-2" required>
                </div>

                <!-- 🔥 UPLOAD COVER -->
                <div class="mb-4">
                    <label class="block">Cover Buku</label>
                    <input type="file" name="cover"
                        class="w-full border rounded px-3 py-2"
                        accept="image/*"
                        required>
                </div>

                <div class="mb-4">
                    <label class="block">Stok</label>
                    <input type="number" name="stok" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block">Sinopsis</label>
                    <textarea name="sinopsis" rows="3"
                        class="w-full border rounded px-3 py-2" required></textarea>
                </div>

                <div class="flex gap-2">
                    <button class="bg-green-600 text-white px-4 py-2 rounded">
                        Ajukan
                    </button>
                    <a href="{{ route('petugas.data-buku.index') }}"
                       class="bg-gray-500 text-white px-4 py-2 rounded">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
