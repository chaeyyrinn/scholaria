<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#2E2A6A]">
            Data Peminjaman Buku
        </h2>
    </x-slot>

    <div class="py-8 bg-[#EEF4FF] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Title + Button -->
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">
                    Daftar Peminjaman
                </h3>

                <a href="{{ route('petugas.laporan.peminjaman') }}"
                   class="flex items-center gap-2 bg-[#3B346D] text-white
                          px-4 py-2 rounded-lg shadow hover:bg-[#2f2a59] transition">
                    Generate Laporan
                </a>
            </div>

            <!-- Card Table -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-gray-700">
                        <thead class="bg-[#D7E1F3] text-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left">No</th>
                                <th class="px-6 py-3 text-left">Nama Siswa</th>
                                <th class="px-6 py-3 text-left">Judul Buku</th>
                                <th class="px-6 py-3 text-left">Jumlah</th>
                                <th class="px-6 py-3 text-left">Tanggal Pinjam</th>
                                <th class="px-6 py-3 text-left">Status</th>
                                <th class="px-6 py-3 text-left">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">
                            @forelse ($dataPeminjaman as $item)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $item->siswa->nama ?? '-' }}
                                </td>

                                <td class="px-6 py-4 font-medium">
                                    {{ $item->buku->judul ?? '-' }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $item->jumlah }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $item->created_at->format('d M Y') }}
                                </td>

                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold
                                                 bg-yellow-100 text-yellow-700">
                                        Dipinjam
                                    </span>
                                </td>

                                <td class="px-6 py-4">
                                    <form action="{{ route('petugas.data-peminjaman.confirmation', $item->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin buku sudah dikembalikan?')">
                                        @csrf
                                        @method('PUT')

                                        <button
                                            class="inline-block bg-green-600 text-white
                                                   px-4 py-1.5 rounded-lg text-xs
                                                   shadow hover:bg-green-700 transition">
                                            Konfirmasi
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7"
                                    class="px-6 py-6 text-center text-gray-500">
                                    Tidak ada buku yang sedang dipinjam
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
