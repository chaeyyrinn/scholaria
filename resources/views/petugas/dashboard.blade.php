<x-app-layout>
    <div class="-mt-8 p-6 space-y-6">

        <!-- HERO / HEADER -->
        <div class="relative overflow-hidden rounded-2xl
                    bg-gradient-to-r from-[#3B346D] to-[#5A52A3]
                    text-white p-6 shadow-lg">
            <div class="relative z-10">
                <h1 class="text-2xl font-semibold">
                    Dashboard Petugas
                </h1>
                <p class="text-sm opacity-90 mt-1">
                    Ringkasan aktivitas perpustakaan
                </p>
            </div>

            <!-- dekor -->
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/10 rounded-full"></div>
        </div>

        <!-- STATISTIK -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

            <!-- Card -->
            <div class="bg-white/70 dark:bg-[#1E1B3A]/80
                        backdrop-blur-md rounded-2xl p-5 shadow-xl">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Total Buku
                </p>
                <h2 class="text-3xl font-bold text-[#3B346D] dark:text-[#C7C5FF] mt-2">
                    120
                </h2>
            </div>

            <div class="bg-white/70 dark:bg-[#1E1B3A]/80
                        backdrop-blur-md rounded-2xl p-5 shadow-xl">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Sedang Dipinjam
                </p>
                <h2 class="text-3xl font-bold text-[#3B346D] dark:text-[#C7C5FF] mt-2">
                    35
                </h2>
            </div>

            <div class="bg-white/70 dark:bg-[#1E1B3A]/80
                        backdrop-blur-md rounded-2xl p-5 shadow-xl">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Pengguna Aktif
                </p>
                <h2 class="text-3xl font-bold text-[#3B346D] dark:text-[#C7C5FF] mt-2">
                    78
                </h2>
            </div>

            <div class="bg-white/70 dark:bg-[#1E1B3A]/80
                        backdrop-blur-md rounded-2xl p-5 shadow-xl">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Terlambat
                </p>
                <h2 class="text-3xl font-bold text-red-500 mt-2">
                    5
                </h2>
            </div>
        </div>

        <!-- AKTIVITAS TERBARU -->
        <div class="bg-white/70 dark:bg-[#1E1B3A]/80
                    backdrop-blur-md rounded-2xl shadow-xl p-6">
            <h3 class="text-lg font-semibold text-[#3B346D] dark:text-[#C7C5FF] mb-4">
                Aktivitas Terbaru
            </h3>

            <ul class="space-y-4 text-sm">
                <li class="flex justify-between items-center
                           border-b border-gray-200 dark:border-white/10 pb-3">
                    <span class="text-gray-700 dark:text-gray-300">
                        Andi meminjam <b>Laravel Dasar</b>
                    </span>
                    <span class="text-gray-400 text-xs">
                        Hari ini
                    </span>
                </li>

                <li class="flex justify-between items-center
                           border-b border-gray-200 dark:border-white/10 pb-3">
                    <span class="text-gray-700 dark:text-gray-300">
                        Siti mengembalikan <b>UI UX Design</b>
                    </span>
                    <span class="text-gray-400 text-xs">
                        Kemarin
                    </span>
                </li>

                <li class="flex justify-between items-center">
                    <span class="text-gray-700 dark:text-gray-300">
                        Budi terlambat mengembalikan <b>Algoritma</b>
                    </span>
                    <span class="text-red-500 text-xs font-semibold">
                        3 hari
                    </span>
                </li>
            </ul>
        </div>

    </div>
</x-app-layout>