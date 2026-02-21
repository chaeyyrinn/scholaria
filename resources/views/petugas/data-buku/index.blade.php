<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#2E2A6A]">
            Pengajuan Buku
        </h2>
    </x-slot>

    <div class="py-8 bg-[#EEF4FF] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Title + Button -->
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">
                    Data Pengajuan Buku
                </h3>

                <div class="flex gap-3">
                    <a href="{{ route('petugas.data-buku.create') }}"
                       class="flex items-center gap-2 bg-[#3B346D] text-white
                              px-4 py-2 rounded-lg shadow hover:bg-[#2f2a59] transition">
                        + Ajukan Buku
                    </a>

                    <a href="{{ route('petugas.laporan.buku') }}"
                       class="flex items-center gap-2 bg-indigo-600 text-white
                              px-4 py-2 rounded-lg shadow hover:bg-indigo-700 transition">
                        Generate Laporan
                    </a>
                </div>
            </div>

            <!-- Card Table -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <table class="min-w-full text-sm text-gray-700">
                    <thead class="bg-[#D7E1F3]">
                        <tr>
                            <th class="px-6 py-3 text-left">No</th>
                            <th class="px-6 py-3 text-left">Judul</th>
                            <th class="px-6 py-3 text-left">Kategori</th>
                            <th class="px-6 py-3 text-left">Stok</th>
                            <th class="px-6 py-3 text-left">Status</th>
                            <th class="px-6 py-3 text-left">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        @foreach ($buku as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 font-medium">
                                {{ $item->judul }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->kategori->nama_kategori ?? '-' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->stok }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                    {{ $item->status === 'diajukan'
                                        ? 'bg-yellow-100 text-yellow-700'
                                        : 'bg-green-100 text-green-700' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 flex gap-3">
                                <a href="{{ route('petugas.data-buku.edit', $item->id) }}"
                                   class="inline-block bg-yellow-500 text-white
                                          px-3 py-1.5 rounded-lg text-xs shadow hover:bg-yellow-600">
                                    Edit
                                </a>

                                <form action="{{ route('petugas.data-buku.destroy', $item->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus pengajuan buku ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="inline-block bg-red-500 text-white
                                               px-3 py-1.5 rounded-lg text-xs shadow hover:bg-red-600">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                        @if($buku->isEmpty())
                        <tr>
                            <td colspan="6"
                                class="px-6 py-6 text-center text-gray-500">
                                Data pengajuan buku belum tersedia
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
