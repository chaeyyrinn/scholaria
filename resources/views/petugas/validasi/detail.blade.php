<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#3B346D]">
            Detail Validasi Peminjaman
        </h2>
    </x-slot>

    <div class="py-8 bg-[#EEF4FF] min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

                <!-- HEADER CARD -->
                <div class="px-6 py-4 bg-[#3B346D] text-white">
                    <h3 class="text-lg font-semibold">
                        Informasi Peminjaman
                    </h3>
                    <p class="text-sm opacity-80">
                        Periksa detail sebelum melakukan validasi
                    </p>
                </div>

                <!-- CONTENT -->
                <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-6">

                    <!-- NAMA SISWA -->
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Nama Siswa</p>
                        <p class="font-semibold text-gray-800">
                            {{ $peminjam->siswa->nama }}
                        </p>
                    </div>

                    <!-- JUDUL BUKU -->
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Judul Buku</p>
                        <p class="font-semibold text-gray-800">
                            {{ $peminjam->buku->judul }}
                        </p>
                    </div>

                    <!-- JUMLAH -->
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Jumlah Buku</p>
                        <p class="font-semibold text-gray-800">
                            {{ $peminjam->jumlah }} Buku
                        </p>
                    </div>

                    <!-- TANGGAL AJU -->
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Tanggal Pengajuan</p>
                        <p class="font-semibold text-gray-800">
                            {{ $peminjam->created_at->format('d M Y') }}
                        </p>
                    </div>

                    <!-- TANGGAL KEMBALI -->
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Tanggal Pengembalian</p>
                        <p class="font-semibold text-gray-800">
                            {{ \Carbon\Carbon::parse($peminjam->tanggal_pengembalian)->format('d M Y') }}
                        </p>
                    </div>

                    <!-- STATUS -->
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Status</p>
                        <span
                            class="inline-block px-4 py-1 text-sm rounded-full font-medium
                                {{ $peminjam->status === 'menunggu_validasi'
                                    ? 'bg-yellow-100 text-yellow-700'
                                    : ($peminjam->status === 'disetujui'
                                        ? 'bg-green-100 text-green-700'
                                        : 'bg-red-100 text-red-700') }}">
                            {{ str_replace('_', ' ', ucfirst($peminjam->status)) }}
                        </span>
                    </div>

                </div>

                <!-- ACTION BUTTON -->
                <div class="px-6 py-5 bg-gray-50 flex flex-col sm:flex-row gap-3 justify-end">

                    <!-- SETUJUI -->
                    <form action="{{ route('petugas.validasi.verify', $peminjam->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button
                            class="inline-flex items-center gap-2 px-5 py-2 rounded-lg
                                   bg-green-600 text-white font-medium
                                   hover:bg-green-700 transition">
                            ✔ Setujui
                        </button>
                    </form>

                    <!-- TOLAK -->
                    <form action="{{ route('petugas.validasi.reject', $peminjam->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button
                            class="inline-flex items-center gap-2 px-5 py-2 rounded-lg
                                   bg-red-600 text-white font-medium
                                   hover:bg-red-700 transition">
                            ✖ Tolak
                        </button>
                    </form>

                    <!-- KEMBALI -->
                    <a href="{{ route('petugas.validasi.index') }}"
                       class="inline-flex items-center gap-2 px-5 py-2 rounded-lg
                              bg-gray-300 text-gray-800 font-medium
                              hover:bg-gray-400 transition">
                        ← Kembali
                    </a>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
