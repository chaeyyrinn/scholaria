<x-app-layout>
    <div class="min-h-screen p-8 bg-[#EAF1FF]">

        <!-- HEADER -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
            <h1 class="text-xl font-semibold text-[#3B346D]">
                Data Buku
            </h1>

            <div class="flex gap-3">
                <a href="{{ route('admin.data-buku.create') }}"
                   class="inline-flex items-center gap-2 bg-[#3B346D] text-white
                          px-4 py-2 rounded-lg shadow hover:opacity-90 transition text-sm">
                    + Tambah Buku
                </a>

                <a href="{{ route('admin.laporan.data-buku') }}"
                   class="inline-flex items-center gap-2 bg-white
                          border border-[#3B346D] text-[#3B346D]
                          px-4 py-2 rounded-lg shadow
                          hover:bg-[#3B346D] hover:text-white transition text-sm">
                    Export Data
                </a>
            </div>
        </div>

        <!-- NOTIF SUCCESS -->
        @if (session('success'))
            <div id="alert-success"
                 class="mb-5 flex items-center gap-3 rounded-xl
                        bg-green-100 border border-green-300
                        px-5 py-3 text-green-700 shadow
                        transition-all duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 13l4 4L19 7"/>
                </svg>
                <span class="text-sm font-medium">
                    {{ session('success') }}
                </span>
            </div>
        @endif

        <!-- NOTIF DELETE -->
        @if (session('delete'))
            <div id="alert-delete"
                 class="mb-5 flex items-center gap-3 rounded-xl
                        bg-red-100 border border-red-300
                        px-5 py-3 text-red-700 shadow
                        transition-all duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
                <span class="text-sm font-medium">
                    {{ session('delete') }}
                </span>
            </div>
        @endif

        <!-- TABLE CARD -->
        <div class="bg-white rounded-xl shadow-md overflow-x-auto">
            <table class="w-full text-sm">

                <thead class="bg-[#CCD8EF] text-[#3B346D]">
                    <tr>
                        <th class="px-4 py-4 text-left font-semibold w-12">No</th>
                        <th class="px-4 py-4 text-left font-semibold">Cover</th>
                        <th class="px-4 py-4 text-left font-semibold">Judul</th>
                        <th class="px-4 py-4 text-left font-semibold">Penulis</th>
                        <th class="px-4 py-4 text-left font-semibold">Penerbit</th>
                        <th class="px-4 py-4 text-left font-semibold">Kategori</th>
                        <th class="px-4 py-4 text-left font-semibold">Tahun</th>
                        <th class="px-4 py-4 text-left font-semibold">Stok</th>
                        <th class="px-4 py-4 text-center font-semibold w-44">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @forelse ($buku as $item)
                        <tr class="hover:bg-[#EAF1FF]/60 transition">
                            <td class="px-4 py-4">{{ $loop->iteration }}</td>

                            <td class="px-4 py-4">
                                @if ($item->cover)
                                    <img src="{{ asset('storage/' . $item->cover) }}"
                                         class="w-12 h-16 object-cover rounded-lg shadow-sm">
                                @else
                                    <span class="text-xs text-gray-400">No Image</span>
                                @endif
                            </td>

                            <td class="px-4 py-4 font-medium">{{ $item->judul }}</td>
                            <td class="px-4 py-4">{{ $item->penulis }}</td>
                            <td class="px-4 py-4">{{ $item->penerbit }}</td>
                            <td class="px-4 py-4">{{ $item->kategori->nama_kategori ?? '-' }}</td>
                            <td class="px-4 py-4">{{ $item->tahun_terbit }}</td>
                            <td class="px-4 py-4">{{ $item->stok }}</td>

                            <td class="px-4 py-4 pr-6">
                                <div class="flex justify-end gap-3">
                                    <a href="{{ route('admin.data-buku.edit', $item->id) }}"
                                       class="px-4 py-1 text-xs rounded-full bg-[#3B346D] text-white">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.data-buku.destroy', $item->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin mau menghapus buku ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="px-4 py-1 text-xs rounded-full bg-red-500 text-white">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="py-8 text-center text-gray-500">
                                Data buku belum tersedia
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

    <!-- AUTO HIDE ALERT -->
    <script>
        setTimeout(() => {
            document.getElementById('alert-success')?.remove();
            document.getElementById('alert-delete')?.remove();
        }, 3000);
    </script>
</x-app-layout>
