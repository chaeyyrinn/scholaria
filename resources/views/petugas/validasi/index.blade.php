<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#2E2A6A]">
            Validasi Peminjaman Buku
        </h2>
    </x-slot>

    <div class="py-8 bg-[#EEF4FF] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Title -->
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-800">
                    Daftar Pengajuan Peminjaman
                </h3>
            </div>

            <!-- Card Table -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <table class="min-w-full text-sm text-gray-700">
                    <thead class="bg-[#D7E1F3] text-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left">No</th>
                            <th class="px-6 py-3 text-left">Nama Siswa</th>
                            <th class="px-6 py-3 text-left">Judul Buku</th>
                            <th class="px-6 py-3 text-left">Jumlah</th>
                            <th class="px-6 py-3 text-left">Tanggal Pinjam</th>
                            <th class="px-6 py-3 text-left">Tanggal Pengembalian</th>
                            <th class="px-6 py-3 text-left">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        @forelse ($dataPeminjaman as $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4 font-medium">
                                {{ $item->siswa->nama ?? '-' }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $item->buku->judul ?? '-' }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $item->jumlah }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $item->created_at->format('d M Y') }}
                            </td>

                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($item->tanggal_pengembalian)->format('d M Y') }}
                            </td>

                            <td class="px-6 py-4">
                                <a href="{{ route('petugas.validasi.detail', $item->id) }}"
                                   class="inline-block bg-[#3B346D] text-white
                                          px-4 py-1.5 rounded-lg text-xs
                                          shadow hover:bg-[#2f2a59] transition">
                                    Detail
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7"
                                class="text-center py-6 text-gray-500">
                                Tidak ada pengajuan peminjaman
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>