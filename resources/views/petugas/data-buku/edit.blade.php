<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Buku
        </h2>
    </x-slot>


    <div class="py-6">
        <div class="max-w-xl mx-auto bg-white p-6 shadow rounded">
            <form action="{{ route('petugas.data-buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="mb-4">
                    <label class="block">Judul</label>
                    <input type="text" name="judul" value="{{ $buku->judul }}" class="w-full border rounded px-3 py-2" required>
                </div>


                <div class="mb-4">
                    <label class="block">Penulis</label>
                    <input type="text" name="penulis" value="{{ $buku->penulis }}" class="w-full border rounded px-3 py-2" required>
                </div>


                <div class="mb-4">
                    <label class="block">Penerbit</label>
                    <input type="text" name="penerbit" value="{{ $buku->penerbit }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <!-- ISBN -->
                <div class="mb-4">
                    <label class="block">ISBN</label>
                    <input type="text" name="isbn" value="{{ $buku->isbn }}" class="w-full border rounded px-3 py-2" required>
                </div>


                <div class="mb-4">
                    <label class="block">Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" value="{{ $buku->tahun_terbit }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <!-- Cover -->
                <div class="mb-4">
                    <label class="block">Cover</label>
                    @if ($buku->cover)
                    <img src="{{ asset('storage/' . $buku->cover) }}" class="h-32 mb-2 rounded">
                    @endif
                    <input type="file" name="cover" class="w-full border rounded px-3 py-2">

                </div>

                <div class="mb-4">
                    <label class="block">Kategori</label>
                    <select name="kategori_id"
                        class="w-full border rounded px-3 py-2" required>
                        @foreach ($kategori as $k)
                        <option value="{{ $k->id }}"
                            {{ $buku->kategori_id == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                        @endforeach
                    </select>
                </div>



                <div class="mb-4">
                    <label class="block">Stok</label>
                    <input type="number" name="stok" value="{{ $buku->stok }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <!-- Sinopsis -->
                <div class="mb-4">
                    <label class="block">Sinopsis</label>
                    <textarea name="sinopsis" rows="3"
                        class="w-full border rounded px-3 py-2" required>{{ $buku->sinopsis }}</textarea>
                </div>


                <div class="flex gap-2">
                    <button class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
                    <a href="{{ route('petugas.data-buku.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>