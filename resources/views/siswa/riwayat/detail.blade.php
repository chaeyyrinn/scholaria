<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#3B346D]">
            Detail Validasi Peminjaman
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-xl p-6 space-y-4">

                <div>
                    <span class="text-sm text-gray-500">Nama Siswa</span>
                    <p class="font-medium">{{ $peminjam->siswa->name }}</p>
                </div>

                <div>
                    <span class="text-sm text-gray-500">Judul Buku</span>
                    <p class="font-medium">{{ $peminjam->buku->judul }}</p>
                </div>

                <div>
                    <span class="text-sm text-gray-500">Jumlah</span>
                    <p class="font-medium">{{ $peminjam->jumlah }}</p>
                </div>

                <div>
                    <span class="text-sm text-gray-500">Tanggal Pengajuan</span>
                    <p class="font-medium">{{ $peminjam->created_at->format('d M Y') }}</p>
                </div>

                <div>
                    <span class="text-sm text-gray-500">Status</span>
                    <p class="font-medium capitalize">{{ $peminjam->status }}</p>
                </div>

                {{-- ACTION --}}
                <div class="flex gap-3 pt-4">
                    <form action="{{ route('petugas.validasi.verify', $peminjam->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                            Setujui
                        </button>
                    </form>

                    <form action="{{ route('petugas.validasi.reject', $peminjam->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                            Tolak
                        </button>
                    </form>

                    <a href="{{ route('petugas.validasi.index') }}"
                       class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                        Kembali
                    </a>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
