<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Detail Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-[#F5F6FA]">

    <div class="max-w-6xl mx-auto px-6 py-10">

        <!-- Kembali -->
        <a href="{{ route('siswa.katalog.index') }}"
            class="inline-flex items-center gap-2 text-[#3B346D] font-medium mb-8 hover:underline">
            ← Kembali
        </a>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 bg-white rounded-2xl shadow-md p-8">

            <!-- COVER -->
            <div class="flex justify-center">
                <img
                    src="{{ asset('storage/' . $buku->cover) }}"
                    alt="{{ $buku->judul }}"
                    class="w-full max-w-sm rounded-xl shadow-lg">
            </div>

            <!-- DETAIL -->
            <div>
                <!-- Kategori -->
                <span class="inline-block bg-[#C5CCE7] text-[#3B346D] text-xs font-semibold px-3 py-1 rounded-full mb-3">
                    {{ $buku->kategori->nama_kategori ?? 'Tanpa Kategori' }}
                </span>

                <!-- Judul & Penulis -->
                <h1 class="text-3xl font-bold text-[#3B346D] mb-1">
                    {{ $buku->judul }}
                </h1>
                <p class="text-[#3B346D]/70 mb-4">
                    {{ $buku->penulis }}
                </p>

                <!-- Info Badge -->
                <div class="flex flex-wrap gap-3 mb-6">

                    <!-- Tahun Terbit -->
                    <div class="bg-[#C5CCE7] px-4 py-2 rounded-lg text-sm text-[#3B346D]">
                        <div class="flex gap-4 items-center">
                            <i data-lucide="calendar-days" class="w-5 h-5"></i>
                            <div class="flex flex-col">
                                <p>Tahun Terbit</p>
                                <span class="font-semibold">{{ $buku->tahun_terbit }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- ISBN -->
                    <div class="bg-[#C5CCE7] px-4 py-2 rounded-lg text-sm text-[#3B346D]">
                        <div class="flex gap-4 items-center">
                            <i data-lucide="barcode" class="w-5 h-5"></i>
                            <div class="flex flex-col">
                                <p>ISBN</p>
                                <span class="font-semibold">{{ $buku->isbn }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Stok -->
                    <div class="bg-[#C5CCE7] px-4 py-2 rounded-lg text-sm text-[#3B346D]">
                        <div class="flex gap-4 items-center">
                            <i data-lucide="package" class="w-5 h-5"></i>
                            <div class="flex flex-col">
                                <p>Stok Tersedia</p>
                                <span class="font-semibold">{{ $buku->stok }}</span>
                            </div>
                        </div>
                    </div>

                </div>


                <!-- Sinopsis -->
                <div class="border border-[#C5CCE7] rounded-xl p-5 mb-6">
                    <h3 class="font-semibold text-[#3B346D] mb-2">
                        Sinopsis
                    </h3>
                    <p class="text-sm text-gray-700 leading-relaxed">
                        {{ $buku->sinopsis }}
                    </p>
                </div>

                <!-- ACTION -->
                <a href="{{ route('siswa.form-peminjaman.create', $buku->id) }}"
                    class="inline-block bg-[#3B346D] hover:bg-[#2f295a] text-white font-semibold px-6 py-3 rounded-xl transition">
                    Pinjam buku sekarang
                </a>
            </div>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>

</body>

</html>