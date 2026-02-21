<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">
        <div class="bg-white rounded-xl shadow p-6">

            <h2 class="text-xl font-semibold mb-6">Profil Petugas</h2>

            <div class="flex items-center gap-6">
                {{-- FOTO PROFIL --}}
                @if ($profil && $profil->foto_profil)
                    <img src="{{ asset('storage/' . $profil->foto_profil) }}"
                         class="w-24 h-24 rounded-full object-cover">
                @else
                    <div class="w-24 h-24 rounded-full bg-blue-600
                                flex items-center justify-center
                                text-white text-3xl font-bold">
                        {{ strtoupper(substr(Auth::user()->nama, 0, 1)) }}
                    </div>
                @endif

                {{-- DATA --}}
                <div class="space-y-1">
                    <p><span class="font-semibold">Nama:</span> {{ Auth::user()->nama }}</p>
                    <p><span class="font-semibold">Email:</span> {{ Auth::user()->email }}</p>
                    <p><span class="font-semibold">Alamat:</span> {{ $profil->alamat ?? '-' }}</p>
                    <p><span class="font-semibold">No. Telepon:</span> {{ $profil->nomor_telepon ?? '-' }}</p>
                    <p><span class="font-semibold">Jenis Kelamin:</span> {{ $profil->jenis_kelamin ?? '-' }}</p>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('petugas.profil.edit') }}"
                   class="inline-block px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Edit Profil
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
