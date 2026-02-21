<x-app-layout>
    <div class="max-w-6xl mx-auto px-6 py-10">

        <h1 class="text-2xl font-bold text-[#3B346D] mb-6">
            📚 Buku yang Sedang Dipinjam
        </h1>

        @if($dataBuku->isEmpty())
        <div class="bg-white rounded-xl p-6 text-center text-gray-500">
            Kamu belum memiliki buku yang sedang dipinjam.
        </div>
        @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($dataBuku as $item)
            <div class="bg-white rounded-2xl shadow-md p-6 flex flex-col justify-between">

                <div>
                    <h2 class="text-lg font-bold text-[#3B346D] mb-2">
                        {{ $item->buku->judul }}
                    </h2>

                    <p class="text-sm text-gray-600">
                        Jumlah: <span class="font-medium">{{ $item->jumlah }}</span>
                    </p>

                    <p class="text-sm text-gray-600">
                        Tanggal Pinjam:
                        <span class="font-medium">
                            {{ \Carbon\Carbon::parse($item->tanggal_peminjaman)->format('d M Y') }}
                        </span>
                    </p>

                    <p class="text-sm text-gray-600">
                        Batas Pengembalian:
                        <span class="font-medium text-red-600">
                            {{ \Carbon\Carbon::parse($item->tanggal_pengembalian)->format('d M Y') }}
                        </span>
                    </p>
                </div>

                <div class="mt-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs px-3 py-1 rounded-full bg-blue-100 text-blue-700">
                            {{ strtoupper($item->status) }}
                        </span>
                        
                        @if ($item->status === 'menunggu_validasi')
                        <span class="text-sm text-yellow-600 font-medium">
                            Menunggu validasi
                        </span>
                        @endif
                    </div>

                    @if ($item->status === 'dipinjam')
                    <div class="flex flex-col gap-2">
                        <form action="{{ route('siswa.pengembalian.ajukan', $item->id) }}" method="POST" class="w-full">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                class="w-full text-sm px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-medium text-center">
                                Ajukan Pengembalian
                            </button>
                        </form>

                        <button onclick="openModal({{ $item->id }}, '{{ $item->tanggal_pengembalian }}')"
                            class="w-full text-sm px-4 py-2 border border-[#3B346D] text-[#3B346D] rounded-lg hover:bg-gray-50 transition font-medium">
                            Ajukan Perpanjangan
                        </button>
                    </div>
                    @endif
                </div>

            </div>
            @endforeach
        </div>
        @endif

    </div>


    <div id="modalPerpanjang" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-2xl w-full max-w-md p-6">
            <h2 class="text-lg font-bold text-[#3B346D] mb-4">
                Ajukan Perpanjangan Peminjaman
            </h2>

            <form id="formPerpanjang" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm text-gray-700 mb-1">
                        Tanggal Pengembalian Baru
                    </label>
                    <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian"
                        class="w-full border rounded-lg px-4 py-2" required>
                </div>

                <div class="flex justify-end gap-3">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 border rounded-lg">
                        Batal
                    </button>
                    <button type="submit" class="px-5 py-2 bg-[#3B346D] text-white rounded-lg">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>


    <script>
        function openModal(id, tanggalLama) {
            const modal = document.getElementById('modalPerpanjang');
            const form = document.getElementById('formPerpanjang');
            const tanggalInput = document.getElementById('tanggal_pengembalian');

            form.action = `/siswa/buku-saya/perpanjang/${id}`;
            tanggalInput.value = tanggalLama;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal() {
            const modal = document.getElementById('modalPerpanjang');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>
</x-app-layout>