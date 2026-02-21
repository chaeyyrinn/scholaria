<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Kategori
        </h2>
    </x-slot>


    <div class="py-6">
        <div class="max-w-xl mx-auto bg-white p-6 shadow rounded">
            <form action="{{ route('petugas.data-kategori.store') }}" method="POST">
                @csrf


                <div class="mb-4">
                    <label class="block">Nama Kategori</label>
                    <input type="text" name="nama_kategori"
                        class="w-full border rounded px-3 py-2" required>
                </div>


                <div class="flex gap-2">
                    <button class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
                    <a href="{{ route('petugas.data-kategori.index') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>