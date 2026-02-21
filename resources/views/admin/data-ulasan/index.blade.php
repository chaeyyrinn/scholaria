<x-app-layout>
    <div class="min-h-screen p-8 bg-[#EAF1FF]">

        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-xl font-semibold text-[#3B346D]">
                Data Ulasan
            </h1>

            <a href="{{ route('admin.laporan.data-ulasan') }}"
               class="flex items-center gap-2 bg-[#3B346D] text-white px-5 py-2 rounded-lg shadow hover:opacity-90 transition text-sm">
                Export PDF
            </a>
        </div>

        <!-- Alert -->
        @if (session('success'))
            <div class="mb-5 px-4 py-3 rounded-lg bg-green-100 text-green-700 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">

            <table class="w-full text-sm">
                <!-- Table Head -->
                <thead class="bg-[#CCD8EF] text-[#3B346D]">
                    <tr>
                        <th class="px-6 py-4 text-left font-semibold">Siswa</th>
                        <th class="px-6 py-4 text-left font-semibold">Buku</th>
                        <th class="px-6 py-4 text-left font-semibold">Rating</th>
                        <th class="px-6 py-4 text-left font-semibold">Ulasan</th>
                        <th class="px-6 py-4 text-left font-semibold">Aksi</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody class="divide-y divide-gray-100">
                    @foreach ($ulasans as $ulasan)
                        <tr class="hover:bg-[#EAF1FF]/60 transition">
                            <td class="px-6 py-4">
                                {{ $ulasan->user->nama }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $ulasan->buku->judul }}
                            </td>

                            <td class="px-6 py-4 font-medium">
                                {{ $ulasan->rating }} ⭐
                            </td>

                            <td class="px-6 py-4 text-gray-600">
                                {{ $ulasan->ulasan }}
                            </td>

                            <td class="px-6 py-4">
                                <form action="{{ route('admin.data-ulasan.destroy', $ulasan->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus ulasan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center px-4 py-1 text-xs font-medium rounded-full
                                            bg-red-100 text-red-700 hover:bg-red-200 transition">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if ($ulasans->isEmpty())
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                Data ulasan belum tersedia
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>

    </div>
</x-app-layout>