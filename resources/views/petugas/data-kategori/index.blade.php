<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#2E2A6A]">
            Data Kategori
        </h2>
    </x-slot>

    <div class="py-8 bg-[#EEF4FF] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Title + Button -->
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">
                    Data Kategori
                </h3>

                <a href="{{ route('admin.data-kategori.create') }}"
                    class="flex items-center gap-2 bg-[#3B346D] text-white
                          px-4 py-2 rounded-lg shadow hover:bg-[#2f2a59] transition">
                    + Tambah Kategori
                </a>
            </div>

            <!-- Card Table -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <table class="min-w-full text-sm text-gray-700">
                    <thead class="bg-[#D7E1F3] text-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left">No</th>
                            <th class="px-6 py-3 text-left">Nama Kategori</th>
                            <th class="px-6 py-3 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach ($dataKategori as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 font-medium">
                                {{ $item->nama_kategori }}
                            </td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('petugas.data-kategori.edit', $item->id) }}"
                                    class="bg-[#3B346D] text-white
              px-4 py-1.5 rounded-lg text-xs shadow">
                                    Edit
                                </a>

                                <form action="{{ route('petugas.data-kategori.destroy', $item->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 text-white
                   px-4 py-1.5 rounded-lg text-xs shadow hover:bg-red-700">
                                        Hapus
                                    </button>
                                </form>
                            </td>

                        </tr>
                        @endforeach

                        @if($dataKategori->isEmpty())
                        <tr>
                            <td colspan="3"
                                class="px-6 py-6 text-center text-gray-500">
                                Data kategori belum tersedia
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>