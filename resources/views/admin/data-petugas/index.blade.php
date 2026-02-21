<x-app-layout>
    <div class="min-h-screen p-8 bg-[#EAF1FF]">

        <!-- HEADER + ACTIONS -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">

            <!-- Title -->
            <h1 class="text-xl font-semibold text-[#3B346D]">
                Data Petugas
            </h1>

            <!-- Actions -->
            <div class="flex gap-3">

                <!-- Tambah -->
                <a href="{{ route('admin.data-petugas.create') }}"
                   class="inline-flex items-center gap-2 bg-[#3B346D] text-white px-4 py-2 rounded-lg shadow hover:opacity-90 transition text-sm">
                    + Tambah Petugas
                </a>

                <!-- Export -->
                <a href="{{ route('admin.laporan.data-petugas') }}"
                   class="inline-flex items-center gap-2 bg-white border border-[#3B346D]
                          text-[#3B346D] px-4 py-2 rounded-lg shadow
                          hover:bg-[#3B346D] hover:text-white transition text-sm">
                    Export Data
                </a>

            </div>
        </div>

        <!-- ALERT SUCCESS -->
        @if (session('success'))
            <div class="mb-5 bg-green-100 border border-green-300 text-green-700 px-5 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- TABLE CARD -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">

            <table class="w-full text-sm">
                <!-- TABLE HEAD -->
                <thead class="bg-[#CCD8EF] text-[#3B346D]">
                    <tr>
                        <th class="px-6 py-4 text-left font-semibold">No</th>
                        <th class="px-6 py-4 text-left font-semibold">Nama Petugas</th>
                        <th class="px-6 py-4 text-left font-semibold">Email</th>
                        <th class="px-6 py-4 text-left font-semibold">Aksi</th>
                    </tr>
                </thead>

                <!-- TABLE BODY -->
                <tbody class="divide-y divide-gray-100">
                    @forelse ($petugas as $p)
                        <tr class="hover:bg-[#EAF1FF]/60 transition">
                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4 font-medium text-gray-800">
                                {{ $p->nama }}
                            </td>

                            <td class="px-6 py-4 text-gray-600">
                                {{ $p->email }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex gap-2">

                                    <!-- EDIT -->
                                    <a href="{{ route('admin.data-petugas.edit', $p->id) }}"
                                       class="inline-flex items-center px-4 py-1 text-xs font-medium rounded-full
                                              bg-[#3B346D] text-white hover:opacity-90 transition">
                                        Edit
                                    </a>

                                    <!-- DELETE -->
                                    <form action="{{ route('admin.data-petugas.destroy', $p->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin mau menghapus petugas ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-1 text-xs font-medium rounded-full
                                                   bg-red-500 text-white hover:bg-red-600 transition">
                                            Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                                Data petugas belum tersedia
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

    </div>
</x-app-layout>
