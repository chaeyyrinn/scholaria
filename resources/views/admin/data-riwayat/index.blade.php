<x-app-layout>
    <div class="min-h-screen p-8 bg-[#EAF1FF]">

        <!-- Judul -->
        <h1 class="text-xl font-semibold text-[#3B346D] mb-6">
            Riwayat Peminjaman
        </h1>

        <!-- Table Card -->
        <div class="bg-white rounded-xl shadow-md overflow-x-auto">

            <table class="w-full text-sm">
                <!-- Table Head -->
                <thead class="bg-[#CCD8EF] text-[#3B346D]">
                    <tr>
                        <th class="px-6 py-4 text-left font-semibold">No</th>
                        <th class="px-6 py-4 text-left font-semibold">Nama Siswa</th>
                        <th class="px-6 py-4 text-left font-semibold">Judul Buku</th>
                        <th class="px-6 py-4 text-left font-semibold">Tanggal Pinjam</th>
                        <th class="px-6 py-4 text-left font-semibold">Tanggal Kembali</th>
                        <th class="px-6 py-4 text-left font-semibold">Status</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody class="divide-y divide-gray-100">
                    @forelse ($dataRiwayat as $item)
                    <tr class="hover:bg-[#EAF1FF]/60 transition">
                        <td class="px-6 py-4">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-800">
                            {{ $item->siswa->nama ?? '-' }}
                        </td>

                        <td class="px-6 py-4 text-gray-700">
                            {{ $item->buku->judul ?? '-' }}
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            {{ $item->tanggal_pinjam }}
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            {{ $item->tanggal_kembali ?? '-' }}
                        </td>

                        <td class="px-6 py-4">
                            @if ($item->status === 'dipinjam')
                                <span class="inline-flex items-center px-4 py-1 text-xs font-medium rounded-full
                                             bg-yellow-100 text-yellow-700">
                                    Dipinjam
                                </span>
                            @else
                                <span class="inline-flex items-center px-4 py-1 text-xs font-medium rounded-full
                                             bg-green-100 text-green-700">
                                    Dikembalikan
                                </span>
                            @endif
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                            Belum ada data riwayat
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

    </div>
</x-app-layout>