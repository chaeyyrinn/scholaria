<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#3B346D] leading-tight">
            Riwayat Peminjaman
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- NOTIF -->
            @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <!-- CARD GRID -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

                @forelse ($dataPeminjaman as $item)
                    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-5">

                        <!-- COVER -->
                        <div class="flex justify-center mb-4">
                            <div class="w-[160px] aspect-[2/3] rounded-2xl overflow-hidden bg-gray-100">
                                <img
                                    src="{{ asset('storage/' . ($item->buku->cover ?? '')) }}"
                                    alt="{{ $item->buku->judul ?? '-' }}"
                                    class="w-full h-full object-contain">
                            </div>
                        </div>

                        <!-- AUTHOR -->
                        <p class="text-sm text-gray-500 mb-1">
                            {{ $item->buku->penulis ?? '-' }}
                        </p>

                        <!-- TITLE -->
                        <h3 class="font-semibold text-gray-900 leading-snug mb-3">
                            {{ $item->buku->judul ?? '-' }}
                        </h3>

                        <!-- INFO -->
                        <div class="text-sm text-gray-500 space-y-1 mb-4">
                            <p>Jumlah: {{ $item->jumlah }}</p>
                            <p>Tanggal Peminjaman:
                                {{ \Carbon\Carbon::parse($item->tanggal_peminjaman)->format('d M Y') }}
                            </p>
                            <p>Tanggal Pengembalian:
                                {{ \Carbon\Carbon::parse($item->tanggal_pengembalian)->format('d M Y') }}
                            </p>
                        </div>

                        <!-- STATUS -->
                        <span
                            class="inline-block mb-4 px-4 py-1 text-sm rounded-full
                                {{ $item->status === 'dipinjam'
                                    ? 'bg-yellow-100 text-yellow-700'
                                    : ($item->status === 'dikembalikan'
                                        ? 'bg-green-100 text-green-700'
                                        : 'bg-gray-100 text-gray-700') }}">
                            {{ ucfirst(str_replace('_', ' ', $item->status)) }}
                        </span>

                        <!-- ACTION -->
                        <div class="space-y-2">

                            <!-- LIHAT BUKTI -->
                            <a href="{{ route('siswa.peminjaman.bukti', $item->id) }}"
                               class="block w-full text-center px-4 py-2 rounded-full
                                      bg-[#3B346D] text-white
                                      hover:opacity-90 transition text-sm">
                                🧾 Lihat Bukti
                            </a>

                            <!-- ULASAN -->
                            @if ($item->status === 'dikembalikan')
                                @if ($item->buku->ulasan->isEmpty())
                                    <button
                                        onclick="openModal({{ $item->buku_id }})"
                                        class="w-full px-4 py-2 rounded-full
                                               border border-indigo-500 text-indigo-600
                                               hover:bg-indigo-50 transition text-sm">
                                        Beri Ulasan
                                    </button>
                                @else
                                    <div class="text-center text-green-600 text-sm font-medium">
                                        ✔ Sudah Diulas
                                    </div>
                                @endif
                            @endif

                        </div>

                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500 py-10">
                        Belum ada data peminjaman
                    </div>
                @endforelse

            </div>
        </div>
    </div>

    <!-- MODAL ULASAN -->
    <div id="ulasanModal"
         class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white w-full max-w-md rounded-xl p-6">
            <h3 class="text-lg font-semibold mb-4 text-[#3B346D]">
                Beri Ulasan Buku
            </h3>

            <form action="{{ route('siswa.ulasan.store') }}" method="POST">
                @csrf
                <input type="hidden" name="buku_id" id="buku_id">

                <div class="mb-3">
                    <label class="block text-sm mb-1">Rating</label>
                    <select name="rating"
                            class="w-full border rounded px-3 py-2" required>
                        <option value="">Pilih Rating</option>
                        <option value="5">⭐⭐⭐⭐⭐</option>
                        <option value="4">⭐⭐⭐⭐</option>
                        <option value="3">⭐⭐⭐</option>
                        <option value="2">⭐⭐</option>
                        <option value="1">⭐</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm mb-1">Ulasan</label>
                    <textarea name="ulasan" rows="3"
                              class="w-full border rounded px-3 py-2" required></textarea>
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button"
                            onclick="closeModal()"
                            class="px-4 py-2 bg-gray-300 rounded">
                        Batal
                    </button>
                    <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- SCRIPT -->
    <script>
        function openModal(bukuId) {
            document.getElementById('buku_id').value = bukuId;
            const modal = document.getElementById('ulasanModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal() {
            const modal = document.getElementById('ulasanModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>
</x-app-layout>
