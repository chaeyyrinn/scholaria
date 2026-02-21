<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Form Peminjaman Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-[#D9ECE2] via-[#D6D7EB] to-[#F9E1ED]">

    <div class="max-w-6xl mx-auto px-6 py-10">

        <!-- Kembali -->
        <a href="{{ route('siswa.katalog.index') }}"
            class="inline-flex items-center gap-2 text-[#3B346D] font-medium mb-6 hover:underline">
            ← Kembali
        </a>

        <div class="bg-[#3B346D] rounded-3xl shadow-lg p-8 grid grid-cols-1 lg:grid-cols-2 gap-8">

            <!-- LEFT INFO -->
            <div class="text-white flex flex-col justify-between">
                <div class="flex flex-col justify-between h-64">
                    <h1 class="text-3xl font-bold mb-4">
                        SCHOLARIA
                    </h1>
                    <p class="text-[#C5CCE7] leading-relaxed max-w-sm text-2xl font-bold">
                        Pastikan buku yang dipilih sesuai kebutuhan dan
                        jadwal pengembalian tidak terlewat.
                    </p>
                </div>

                <div class="flex gap-4 text-[#C5CCE7] mt-8">

                    <!-- LinkedIn -->
                    <a href="#" class="w-9 h-9 flex items-center justify-center rounded-full hover:bg-white/10 transition">
                        <svg class="w-10 h-10 fill-current" viewBox="0 0 24 24">
                            <path d="M4.98 3.5a2.5 2.5 0 11-.02 5.02 2.5 2.5 0 01.02-5.02zM3 8.98h4v12H3zM9 8.98h3.8v1.64h.05c.53-1 1.83-2.06 3.77-2.06 4.03 0 4.78 2.65 4.78 6.1v6.32h-4v-5.6c0-1.34-.03-3.06-1.87-3.06-1.88 0-2.17 1.46-2.17 2.96v5.7H9z" />
                        </svg>
                    </a>

                    <!-- WhatsApp -->
                    <a href="#" class="w-9 h-9 flex items-center justify-center rounded-full hover:bg-white/10 transition">
                        <svg class="w-10 h-10 fill-current" viewBox="0 0 32 32">
                            <path d="M16 3C9.38 3 4 8.38 4 15c0 2.64.86 5.08 2.32 7.06L4 29l7.19-2.29A12.94 12.94 0 0016 27c6.62 0 12-5.38 12-12S22.62 3 16 3zm6.43 17.39c-.27.77-1.58 1.49-2.2 1.57-.6.09-1.38.13-2.23-.14-.52-.17-1.18-.38-2.03-.75-3.57-1.55-5.9-5.15-6.08-5.39-.17-.24-1.45-1.93-1.45-3.69 0-1.76.92-2.63 1.24-2.99.33-.36.72-.45.96-.45h.69c.22 0 .51-.08.8.61.27.64.93 2.28 1.01 2.45.08.17.13.38.02.62-.11.24-.16.38-.32.59-.16.21-.34.47-.48.63-.16.16-.32.34-.14.66.17.32.77 1.27 1.66 2.06 1.14 1.01 2.1 1.32 2.42 1.48.32.16.51.13.69-.08.19-.21.8-.93 1.01-1.25.21-.32.43-.27.72-.16.29.11 1.82.86 2.14 1.01.32.16.53.24.61.38.08.14.08.82-.19 1.59z" />
                        </svg>
                    </a>

                    <!-- Instagram -->
                    <a href="#" class="w-9 h-9 flex items-center justify-center rounded-full hover:bg-white/10 transition">
                        <svg class="w-10 h-10 fill-current" viewBox="0 0 24 24">
                            <path d="M7 2C4.24 2 2 4.24 2 7v10c0 2.76 2.24 5 5 5h10c2.76 0 5-2.24 5-5V7c0-2.76-2.24-5-5-5H7zm10 2c1.65 0 3 1.35 3 3v10c0 1.65-1.35 3-3 3H7c-1.65 0-3-1.35-3-3V7c0-1.65 1.35-3 3-3h10zm-5 3a5 5 0 100 10 5 5 0 000-10zm0 2a3 3 0 110 6 3 3 0 010-6zm4.75-.25a1.25 1.25 0 11-2.5 0 1.25 1.25 0 012.5 0z" />
                        </svg>
                    </a>

                    <!-- Facebook -->
                    <a href="#" class="w-9 h-9 flex items-center justify-center rounded-full hover:bg-white/10 transition">
                        <svg class="w-10 h-10 fill-current" viewBox="0 0 24 24">
                            <path d="M22 12a10 10 0 10-11.5 9.87v-6.99h-2.1V12h2.1V9.8c0-2.08 1.23-3.23 3.12-3.23.9 0 1.84.16 1.84.16v2.03h-1.04c-1.03 0-1.35.64-1.35 1.29V12h2.3l-.37 2.88h-1.93v6.99A10 10 0 0022 12z" />
                        </svg>
                    </a>

                </div>

            </div>

            <!-- FORM -->
            <div class="bg-white rounded-2xl p-8">
                <h2 class="text-xl font-bold text-center text-[#3B346D] mb-6">
                    Formulir peminjaman
                </h2>

                <form action="{{ route('siswa.peminjaman.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <!-- Judul Buku -->
                    <div>
                        <label class="block text-sm text-[#3B346D] mb-1">
                            Judul Buku
                        </label>
                        <input type="text"
                            class="w-full border border-[#C5CCE7] rounded-lg px-4 py-2 bg-[#F5F6FA]"
                            value="{{ $buku->judul }}"
                            readonly>
                        <input type="hidden" name="buku_id" value="{{ $buku->id }}">
                    </div>

                    <!-- Jumlah -->
                    <div>
                        <label class="block text-sm text-[#3B346D] mb-1">
                            Jumlah Pinjam
                        </label>
                        <input type="number"
                            name="jumlah"
                            min="1"
                            max="{{ $buku->stok }}"
                            class="w-full border border-[#C5CCE7] rounded-lg px-4 py-2"
                            required>
                        <p class="text-xs text-gray-500 mt-1">
                            Stok tersedia: {{ $buku->stok }}
                        </p>
                    </div>

                    <!-- Tanggal Peminjaman -->
                    <div>
                        <label class="block text-sm text-[#3B346D] mb-1">
                            Tanggal peminjaman
                        </label>
                        <input type="date"
                            name="tanggal_peminjaman"
                            class="w-full border border-[#C5CCE7] rounded-lg px-4 py-2"
                            required>
                    </div>

                    <!-- Tanggal Pengembalian -->
                    <div>
                        <label class="block text-sm text-[#3B346D] mb-1">
                            Tanggal pengembalian
                        </label>
                        <input type="date"
                            name="tanggal_pengembalian"
                            class="w-full border border-[#C5CCE7] rounded-lg px-4 py-2"
                            required>
                    </div>

                    <!-- BUTTON -->
                    <div class="flex justify-end gap-3 pt-4">
                        <a href="{{ route('siswa.katalog.index') }}"
                            class="px-5 py-2 border border-[#3B346D] text-[#3B346D] rounded-lg">
                            Batal
                        </a>

                        <button type="submit"
                            class="px-6 py-2 bg-[#3B346D] text-white rounded-lg hover:bg-[#2f295a] transition">
                            Pinjam buku sekarang
                        </button>
                    </div>
                </form>

                <!-- Error -->
                @if (session('error'))
                <p class="text-red-600 text-sm mt-4">
                    {{ session('error') }}
                </p>
                @endif

                <!-- Success -->
                @if (session('success'))
                <p class="text-green-600 text-sm mt-4">
                    {{ session('success') }}
                </p>
                @endif
            </div>

        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>

</html>