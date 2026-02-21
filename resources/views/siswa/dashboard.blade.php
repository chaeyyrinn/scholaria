<x-app-layout>

<div class="bg-[#EEF3FF] min-h-screen py-10 px-6">
    <div class="max-w-7xl mx-auto space-y-16">

        <!-- HERO -->
        <div class="bg-[#DDE6FB] rounded-2xl py-12 px-6 flex justify-center">
            <img
                src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f"
                alt="Library"
                class="rounded-xl shadow-md max-h-[280px] object-cover"
            >
        </div>

        <!-- BEST SELLERS -->
        <div class="space-y-6">
            <h2 class="text-center text-xl font-bold text-gray-800">
                Best Sellers
            </h2>

            <div class="flex gap-6 justify-center flex-wrap">

                <!-- CARD -->
                <div class="w-40 bg-white rounded-xl shadow p-3">
                    <img src="https://covers.openlibrary.org/b/id/10521258-L.jpg"
                         class="rounded-md mb-2 h-48 w-full object-cover">
                    <p class="text-sm font-semibold">Sisi Tergelap Surga</p>
                    <p class="text-xs text-gray-500">Sya Tergelap Surga</p>
                </div>

                <div class="w-40 bg-white rounded-xl shadow p-3">
                    <img src="https://covers.openlibrary.org/b/id/11153213-L.jpg"
                         class="rounded-md mb-2 h-48 w-full object-cover">
                    <p class="text-sm font-semibold">Cantik Itu Luka</p>
                    <p class="text-xs text-gray-500">Eka Kurniawan</p>
                </div>

                <div class="w-40 bg-white rounded-xl shadow p-3">
                    <img src="https://covers.openlibrary.org/b/id/12648932-L.jpg"
                         class="rounded-md mb-2 h-48 w-full object-cover">
                    <p class="text-sm font-semibold">23:59</p>
                    <p class="text-xs text-gray-500">Tere Liye</p>
                </div>

                <div class="w-40 bg-white rounded-xl shadow p-3">
                    <img src="https://covers.openlibrary.org/b/id/10513245-L.jpg"
                         class="rounded-md mb-2 h-48 w-full object-cover">
                    <p class="text-sm font-semibold">Keigo Higashino</p>
                    <p class="text-xs text-gray-500">Devotion of Suspect X</p>
                </div>

            </div>
        </div>

        <!-- CARA MEMINJAM -->
        <div class="bg-[#DDE6FB] rounded-2xl p-10 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

            <h2 class="text-2xl font-bold text-gray-800">
                Cara meminjam buku
            </h2>

            <div class="space-y-4">
                <div class="bg-white p-4 rounded-xl shadow">
                    <p class="font-semibold text-sm">Step 1</p>
                    <p class="text-sm text-gray-600">
                        Login akun lalu pilih buku yang ingin dipinjam
                    </p>
                </div>

                <div class="bg-white p-4 rounded-xl shadow">
                    <p class="font-semibold text-sm">Step 2</p>
                    <p class="text-sm text-gray-600">
                        Klik tombol “Pinjam” dan isi data peminjaman
                    </p>
                </div>

                <div class="bg-white p-4 rounded-xl shadow">
                    <p class="font-semibold text-sm">Step 3</p>
                    <p class="text-sm text-gray-600">
                        Kirim pengajuan dan tunggu konfirmasi
                    </p>
                </div>
            </div>

        </div>

    </div>
</div>

</x-app-layout>
