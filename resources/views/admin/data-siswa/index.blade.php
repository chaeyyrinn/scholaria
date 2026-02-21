<x-app-layout>
    <div class="min-h-screen p-8 bg-[#EAF1FF]">

        <!-- Judul & Button -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-xl font-semibold text-[#3B346D]">
                Data Siswa
            </h1>

            <a href="{{ route('admin.laporan.data-siswa') }}"
               class="flex items-center gap-2 bg-[#3B346D] text-white px-5 py-2 rounded-lg shadow hover:opacity-90 transition text-sm">
                Export data
            </a>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">

            <table class="w-full text-sm">
                <!-- Header -->
                <thead class="bg-[#CCD8EF] text-[#3B346D]">
                    <tr>
                        <th class="px-6 py-4 text-left font-semibold">No</th>
                        <th class="px-6 py-4 text-left font-semibold">Nama Siswa</th>
                        <th class="px-6 py-4 text-left font-semibold">Email</th>
                        <th class="px-6 py-4 text-left font-semibold">Role</th>
                    </tr>
                </thead>

                <!-- Body -->
                <tbody class="divide-y divide-gray-100">
                    @foreach($data as $index => $d)
                    <tr class="hover:bg-[#EAF1FF]/60 transition">
                        <td class="px-6 py-4">
                            {{ $index + 1 }}
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-800">
                            {{ $d->nama }}
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            {{ $d->email }}
                        </td>

                        <td class="px-6 py-4">
                            <span
                                class="inline-flex items-center justify-center px-4 py-1 text-xs font-medium rounded-full
                                bg-[#3B346D] text-white">
                                {{ ucfirst($d->role) }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>