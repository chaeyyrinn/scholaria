<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#2E2A6A]">
            Riwayat Peminjaman Buku
        </h2>
    </x-slot>

    <div class="py-8 bg-[#EEF4FF] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Title + Filter -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-4">
                <h3 class="text-lg font-semibold text-gray-800">
                    Riwayat Peminjaman
                </h3>

                <form method="GET">
                    <select name="status"
                        class="border border-gray-300 rounded-lg
                               px-4 py-2 text-sm text-gray-700
                               focus:outline-none focus:ring-2 focus:ring-[#3B346D]/40"
                        onchange="this.form.submit()">
                        <option value="">Semua Status</option>
                        <option value="dipinjam" {{ request('status') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                        <option value="dikembalikan" {{ request('status') == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                        <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        <option value="terlambat" {{ request('status') == 'terlambat' ? 'selected' : '' }}>Terlambat</option>
                        <option value="menunggu_validasi" {{ request('status') == 'menunggu_validasi' ? 'selected' : '' }}>
                            Menunggu Validasi
                        </option>
                    </select>
                </form>
            </div>

            <!-- Card Table -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-gray-700">
                        <thead class="bg-[#D7E1F3]">
                            <tr>
                                <th class="px-6 py-3 text-left">No</th>
                                <th class="px-6 py-3 text-left">Nama Siswa</th>
                                <th class="px-6 py-3 text-left">Judul Buku</th>
                                <th class="px-6 py-3 text-left">Jumlah</th>
                                <th class="px-6 py-3 text-left">Tanggal Pinjam</th>
                                <th class="px-6 py-3 text-left">Tanggal Kembali</th>
                                <th class="px-6 py-3 text-left">Status</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">
                            @forelse ($dataPeminjaman as $item)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $loop->iteration }}</td>

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
                                    {{ $item->tanggal_pengembalian
                                        ? \Carbon\Carbon::parse($item->tanggal_pengembalian)->format('d M Y')
                                        : '-' }}
                                </td>

                                <td class="px-6 py-4">
                                    @php
                                        $statusClass = match($item->status) {
                                            'dipinjam' => 'bg-blue-100 text-blue-700',
                                            'dikembalikan' => 'bg-green-100 text-green-700',
                                            'ditolak' => 'bg-red-100 text-red-700',
                                            'terlambat' => 'bg-orange-100 text-orange-700',
                                            'menunggu_validasi' => 'bg-yellow-100 text-yellow-700',
                                            default => 'bg-gray-100 text-gray-700'
                                        };
                                    @endphp

                                    <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $statusClass }}">
                                        {{ str_replace('_', ' ', ucfirst($item->status)) }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7"
                                    class="px-6 py-6 text-center text-gray-500">
                                    Belum ada riwayat peminjaman
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
