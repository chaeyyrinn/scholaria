<x-app-layout>
    <div class="max-w-5xl mx-auto py-6 px-4">
        <h3 class="text-2xl font-semibold mb-6 text-[#3B346D]">
            Detail Validasi Buku
        </h3>

        <div class="bg-white shadow rounded-lg p-6">
            <table class="w-full">
                <tbody class="text-gray-700">
                    <tr class="border-b">
                        <th class="py-3 w-1/4 text-left font-medium">Judul Buku</th>
                        <td class="py-3">{{ $buku->judul }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-3 text-left font-medium">Penulis</th>
                        <td class="py-3">{{ $buku->penulis }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-3 text-left font-medium">Kategori</th>
                        <td class="py-3">{{ $buku->kategori->nama_kategori ?? '-' }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-3 text-left font-medium">Status</th>
                        <td class="py-3">
                            <span class="px-3 py-1 rounded-full text-sm font-semibold
                                bg-[#3B346D]/10 text-[#3B346D]">
                                {{ $buku->status }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th class="py-3 text-left font-medium">Deskripsi</th>
                        <td class="py-3">{{ $buku->sinopsis ?? '-' }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="flex gap-3 mt-6">
                <!-- Setujui -->
                <form action="{{ route('admin.validasi.verifikasi', $buku->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button
                        class="px-5 py-2 rounded bg-[#3B346D] text-white hover:bg-[#2f2a59] transition">
                        Setujui
                    </button>
                </form>

                <!-- Tolak -->
                <form action="{{ route('admin.validasi.reject', $buku->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button
                        class="px-5 py-2 rounded bg-red-500 text-white hover:bg-red-600 transition">
                        Tolak
                    </button>
                </form>

                <!-- Kembali -->
                <a href="{{ route('admin.validasi.index') }}"
                   class="px-5 py-2 rounded border border-[#3B346D] text-[#3B346D]
                   hover:bg-[#3B346D] hover:text-white transition">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
