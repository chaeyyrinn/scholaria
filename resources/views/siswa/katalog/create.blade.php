<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Form Peminjaman Buku
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto bg-white p-6 shadow rounded">

            <form action="{{ route('siswa.katalog.store') }}" method="POST">
                @csrf

                <!-- Buku -->
                <div class="mb-4">
                    <label class="block">Judul Buku</label>
                    <input type="text"
                           class="w-full border rounded px-3 py-2 bg-gray-100"
                           value="{{ $buku->judul }}"
                           readonly>
                    <input type="hidden" name="buku_id" value="{{ $buku->id }}">
                </div>

                <!-- Jumlah -->
                <div class="mb-4">
                    <label class="block">Jumlah Pinjam</label>
                    <input type="number"
                           name="jumlah"
                           min="1"
                           max="{{ $buku->stok }}"
                           class="w-full border rounded px-3 py-2"
                           required>
                    <small class="text-gray-500">
                        Stok tersedia: {{ $buku->stok }}
                    </small>
                </div>

                <!-- Tanggal Pengembalian -->
                <div class="mb-4">
                    <label class="block">Tanggal Pengembalian</label>
                    <input type="date"
                           name="tanggal_pengembalian"
                           class="w-full border rounded px-3 py-2"
                           required>
                </div>

                <!-- Button -->
                <div class="flex gap-2">
                    <button class="bg-blue-600 text-white px-4 py-2 rounded">
                        Ajukan Peminjaman
                    </button>

                    <a href="{{ route('siswa.katalog.index') }}"
                       class="bg-gray-500 text-white px-4 py-2 rounded">
                        Batal
                    </a>
                </div>
            </form>

            <!-- Error -->
            @if (session('error'))
                <p class="text-red-600 mt-3">
                    {{ session('error') }}
                </p>
            @endif

            <!-- Success -->
            @if (session('success'))
                <p class="text-green-600 mt-3">
                    {{ session('success') }}
                </p>
            @endif

        </div>
    </div>
</x-app-layout>
