<x-app-layout>
    <div class="max-w-6xl mx-auto px-6 py-10">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-[#3B346D]">
                👨‍🎓 Data Siswa
            </h1>

            <a href="{{ route('petugas.data-siswa.create') }}"
               class="bg-[#3B346D] text-white px-4 py-2 rounded-lg hover:bg-[#2f2a57]">
                + Tambah Siswa
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3">No</th>
                        <th class="p-3">Nama</th>
                        <th class="p-3">Email</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $index => $siswa)
                        <tr class="border-t">
                            <td class="p-3">{{ $index + 1 }}</td>
                            <td class="p-3">{{ $siswa->name }}</td>
                            <td class="p-3">{{ $siswa->email }}</td>
                            <td class="p-3 text-center flex justify-center gap-2">
                                
                                <a href="{{ route('petugas.data-siswa.edit', $siswa->id) }}"
                                   class="bg-yellow-400 text-white px-3 py-1 rounded">
                                    Edit
                                </a>

                                <form action="{{ route('petugas.data-siswa.destroy', $siswa->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin hapus siswa ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white px-3 py-1 rounded">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-4 text-center text-gray-500">
                                Belum ada data siswa.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
