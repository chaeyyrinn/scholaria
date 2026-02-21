<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Buku
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto bg-white p-6 shadow rounded">

            <form action="{{ route('admin.data-buku.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="block font-medium">Judul</label>
                    <input type="text" name="judul" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Penulis</label>
                    <input type="text" name="penulis" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Penerbit</label>
                    <input type="text" name="penerbit" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block font-medium">ISBN</label>
                    <input type="text" name="isbn" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Kategori</label>
                    <select name="kategori_id" class="w-full border rounded px-3 py-2" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($kategori as $k)
                        <option value="{{ $k->id }}">
                            {{ $k->nama_kategori }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Stok</label>
                    <input type="number" name="stok" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Cover Buku</label>
                    <input type="file" name="cover" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Sinopsis</label>
                    <textarea name="sinopsis" rows="4" class="w-full border rounded px-3 py-2"></textarea>
                </div>

                <!-- <div class="mb-6">
                    <label class="block font-medium">Status</label>
                    <select name="status" class="w-full border rounded px-3 py-2">
                        <option value="tersedia">Tersedia</option>
                        <option value="dipinjam">Dipinjam</option>
                    </select>
                </div> -->

                <div class="flex gap-2">
                    <button class="bg-green-600 text-white px-4 py-2 rounded">
                        Simpan
                    </button>

                    <a href="{{ route('admin.data-buku.index') }}"
                       class="bg-gray-500 text-white px-4 py-2 rounded">
                        Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>
</x-app-layout>
