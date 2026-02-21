<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4">
        <h3 class="text-2xl font-semibold mb-6 text-[#3B346D]">
            Validasi Pengajuan Buku
        </h3>

        @if($buku->count())
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-[#3B346D] text-white">
                    <tr>
                        <th class="px-4 py-3 text-left">No</th>
                        <th class="px-4 py-3 text-left">Judul Buku</th>
                        <th class="px-4 py-3 text-left">Kategori</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buku as $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3 font-medium">{{ $item->judul }}</td>
                        <td class="px-4 py-3">
                            {{ $item->kategori->nama_kategori ?? '-' }}
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 text-sm rounded-full 
                                bg-[#3B346D]/10 text-[#3B346D] font-semibold">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <a href="{{ route('admin.validasi.detail', $item->id) }}"
                               class="inline-block px-4 py-2 text-sm rounded 
                               bg-[#3B346D] text-white hover:bg-[#2f2a59] transition">
                                Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="mt-4 bg-[#3B346D]/10 text-[#3B346D] px-4 py-3 rounded">
            Tidak ada buku yang menunggu validasi.
        </div>
        @endif
    </div>
</x-app-layout>
