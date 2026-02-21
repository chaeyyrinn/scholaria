<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Kategori
        </h2>
    </x-slot>


    <div class="py-6">
        <div class="max-w-xl mx-auto bg-white p-6 shadow rounded">
            <form action="{{ route('admin.data-kategori.update', $kategori->id) }}" method="POST">
                @csrf
                @method('PUT')


                <div class="mb-4">
                    <label class="block">Nama Kategori</label>
                    <input type="text" name="nama_kategori"
                        value="{{ $kategori->nama_kategori }}"
                        class="w-full border rounded px-3 py-2" required>
                </div>


                <div class="flex gap-2">
                    <button class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
                    <a href="{{ route('admin.data-kategori.index') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>