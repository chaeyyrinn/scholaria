<x-app-layout>
    <div class="bg-[#EEF3FF] min-h-[calc(100vh-4rem)] p-6">

        ```
        <!-- HEADER -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <div>
                <h1 class="text-2xl font-semibold text-[#3B346D]">
                    Dashboard Admin
                </h1>
                <p class="text-sm text-gray-500">
                    Ringkasan sistem perpustakaan
                </p>
            </div>

            <!-- SEARCH + PROFILE -->
            <div class="flex items-center gap-3">
                <input
                    type="text"
                    placeholder="Cari sesuatu..."
                    class="px-4 py-2 rounded-lg border text-sm focus:ring-2 focus:ring-[#5B5AF7] outline-none">

                <div class="w-10 h-10 bg-[#5B5AF7] text-white rounded-full flex items-center justify-center font-bold">
                    A
                </div>
            </div>
        </div>

        <!-- STAT CARDS -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

            <div x-data="counter(120)" x-init="start()"
                class="bg-white rounded-xl p-4 shadow hover:shadow-lg transition flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500">Total Siswa</p>
                    <p class="text-2xl font-bold text-[#3B346D]" x-text="count"></p>
                </div>
                <div class="w-10 h-10 bg-[#EEF3FF] text-[#5B5AF7] rounded-lg flex items-center justify-center">
                    👨‍🎓
                </div>
            </div>

            <div x-data="counter(8)" x-init="start()"
                class="bg-white rounded-xl p-4 shadow hover:shadow-lg transition flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500">Petugas</p>
                    <p class="text-2xl font-bold text-[#3B346D]" x-text="count"></p>
                </div>
                <div class="w-10 h-10 bg-[#EEF3FF] text-[#5B5AF7] rounded-lg flex items-center justify-center">
                    👩‍💼
                </div>
            </div>

            <div x-data="counter(540)" x-init="start()"
                class="bg-white rounded-xl p-4 shadow hover:shadow-lg transition flex items-center justify-between">
                <div>
                    <p class="text-xs text-gray-500">Total Buku</p>
                    <p class="text-2xl font-bold text-[#3B346D]" x-text="count"></p>
                </div>
                <div class="w-10 h-10 bg-[#EEF3FF] text-[#5B5AF7] rounded-lg flex items-center justify-center">
                    📚
                </div>
            </div>

            <div x-data="counter(12)" x-init="start()"
                class="bg-[#5B5AF7] text-white rounded-xl p-4 shadow hover:shadow-lg transition flex items-center justify-between">
                <div>
                    <p class="text-xs opacity-80">Kategori</p>
                    <p class="text-2xl font-bold" x-text="count"></p>
                </div>
                <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                    🏷️
                </div>
            </div>

        </div>

        <!-- MAIN GRID -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mt-6">

            <!-- LEFT SIDE -->
            <div class="xl:col-span-2 space-y-6">

                <!-- CHART -->
                <div class="bg-white rounded-xl p-5 shadow">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-sm font-semibold text-[#3B346D]">
                            Statistik Peminjaman
                        </h3>
                        <span class="text-xs text-gray-400">Bulan ini</span>
                    </div>

                    <div class="flex items-end gap-3 h-52">
                        @foreach ([40, 80, 70, 120, 30, 100, 90, 130, 20, 85, 45] as $val)
                        <div class="flex-1">
                            <div class="bg-gradient-to-t from-[#5B5AF7] to-[#8B8AF9] rounded-lg transition-all duration-700"
                                style="height: {{ $val }}px">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- ACTIVITY TABLE -->
                <div class="bg-white rounded-xl shadow">
                    <div class="p-5 border-b flex justify-between items-center">
                        <h2 class="text-lg font-semibold text-[#3B346D]">
                            Aktivitas Terbaru
                        </h2>
                        <a href="#" class="text-sm text-[#5B5AF7] font-medium">
                            Lihat semua
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-50 text-gray-600">
                                <tr>
                                    <th class="text-left px-5 py-3">User</th>
                                    <th class="text-left px-5 py-3">Aktivitas</th>
                                    <th class="text-left px-5 py-3">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                <tr class="hover:bg-gray-50">
                                    <td class="px-5 py-3">Siswa A</td>
                                    <td class="px-5 py-3">Meminjam buku</td>
                                    <td class="px-5 py-3">21 Jan 2026</td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-5 py-3">Petugas</td>
                                    <td class="px-5 py-3">Menambahkan buku</td>
                                    <td class="px-5 py-3">20 Jan 2026</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <!-- RIGHT SIDE -->
            <div class="space-y-6">

                <!-- TOP BOOKS -->
                <div class="bg-white rounded-xl p-5 shadow">
                    <h3 class="text-sm font-semibold text-[#3B346D] mb-4">
                        Buku Terpopuler
                    </h3>

                    <ul class="space-y-3 text-sm">
                        <li class="flex justify-between">
                            <span>Matematika Kelas 10</span>
                            <span class="text-gray-500">32x</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Bahasa Indonesia</span>
                            <span class="text-gray-500">28x</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Sejarah Dunia</span>
                            <span class="text-gray-500">21x</span>
                        </li>
                    </ul>
                </div>

                <!-- QUICK INFO -->
                <div class="bg-gradient-to-br from-[#5B5AF7] to-[#8B8AF9] text-white rounded-xl p-5 shadow">
                    <p class="text-sm opacity-80">Peminjaman hari ini</p>
                    <p class="text-3xl font-bold mt-1">24</p>

                    <p class="text-sm opacity-80 mt-4">Pengembalian hari ini</p>
                    <p class="text-2xl font-semibold">18</p>
                </div>

            </div>
        </div>
    </div>

    <!-- COUNTER SCRIPT -->
    <script>
        function counter(target) {
            return {
                count: 0,
                target: target,
                start() {
                    let step = Math.ceil(this.target / 40);
                    let interval = setInterval(() => {
                        if (this.count < this.target) {
                            this.count += step;
                        } else {
                            this.count = this.target;
                            clearInterval(interval);
                        }
                    }, 30);
                }
            }
        }
    </script>
    ```

</x-app-layout>