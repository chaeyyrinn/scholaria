<x-app-layout>
    <div class="py-8 bg-gray-100 min-h-screen">

        <div class="max-w-sm mx-auto">

            <!-- STRUK -->
            <div id="struk"
                 class="bg-white border border-dashed border-gray-400
                        rounded-lg p-5 text-sm text-gray-800 shadow">

                <!-- HEADER STRUK -->
                <div class="text-center mb-4">
                    <h2 class="text-lg font-bold uppercase">
                        Bukti Peminjaman
                    </h2>
                    <p class="text-xs text-gray-500">
                        Perpustakaan Scholaria
                    </p>
                    <hr class="my-3 border-dashed">
                </div>

                <!-- ISI STRUK -->
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span>Nama Siswa</span>
                        <span class="font-medium">
                            {{ $peminjaman->siswa->nama }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span>Judul Buku</span>
                        <span class="font-medium text-right ml-2">
                            {{ $peminjaman->buku->judul }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span>Jumlah</span>
                        <span>{{ $peminjaman->jumlah }}</span>
                    </div>

                    <hr class="border-dashed my-2">

                    <div class="flex justify-between">
                        <span>Tgl Pinjam</span>
                        <span>
                            {{ \Carbon\Carbon::parse($peminjaman->tanggal_peminjaman)->format('d/m/Y') }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span>Tgl Kembali</span>
                        <span>
                            {{ \Carbon\Carbon::parse($peminjaman->tanggal_pengembalian)->format('d/m/Y') }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span>Status</span>
                        <span class="font-semibold capitalize">
                            {{ $peminjaman->status }}
                        </span>
                    </div>
                </div>

                <!-- FOOTER STRUK -->
                <hr class="my-4 border-dashed">
                <p class="text-center text-xs text-gray-500">
                    Simpan bukti ini sebagai tanda peminjaman
                </p>
            </div>

            <!-- BUTTON -->
            <div class="mt-6 flex justify-between">
                <a href="{{ route('siswa.katalog.index') }}"
                   class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 text-sm">
                    Kembali
                </a>

                <button onclick="window.print()"
                        class="px-4 py-2 rounded-lg bg-[#3B346D] text-white
                               hover:opacity-90 text-sm">
                    Print Struk
                </button>
            </div>

        </div>
    </div>

    <!-- STYLE KHUSUS PRINT -->
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            #struk, #struk * {
                visibility: visible;
            }

            #struk {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                box-shadow: none;
                border: none;
            }
        }
    </style>
</x-app-layout>
