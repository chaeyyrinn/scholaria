<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Katalog buku
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-6">

            @if ($dataBuku->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-10">

                @foreach ($dataBuku as $buku)
                <div
                    class="bg-white rounded-2xl border border-gray-200
                           shadow-sm hover:shadow-md transition
                           flex flex-col">

                    <!-- COVER (RASIO SAMA) -->
                    <div class="p-4">
                        <div class="aspect-[3/4] w-full overflow-hidden rounded-xl">
                            <img
                                src="{{ asset('storage/' . $buku->cover) }}"
                                alt="{{ $buku->judul }}"
                                class="w-full h-full object-contain">
                        </div>
                    </div>

                    <!-- CONTENT -->
                    <div class="px-5 pb-6 text-center flex flex-col flex-1">

                        <p class="text-xs text-gray-500 mb-1">
                            {{ $buku->penulis }}
                        </p>

                        <h3 class="font-semibold text-gray-800 leading-snug line-clamp-2">
                            {{ $buku->judul }}
                        </h3>

                        <!-- PUSH BUTTON KE BAWAH -->
                        <div class="mt-auto">
                            <a
                                href="{{ route('siswa.katalog.detail', $buku->id) }}"
                                class="inline-block mt-4 px-5 py-2 text-sm
                                       rounded-full border border-gray-300
                                       text-gray-700 hover:bg-gray-100 transition">
                                Lihat detail
                            </a>
                        </div>

                    </div>
                </div>
                @endforeach

            </div>
            @else
            <div class="bg-white p-6 text-center rounded-xl shadow">
                <p class="text-gray-500">
                    Belum ada buku yang tersedia
                </p>
            </div>
            @endif

        </div>
    </div>

    @include('layouts.footer.footer-siswa')
</x-app-layout>