<x-app-layout>
    <div class="max-w-4xl mx-auto px-6 py-10">

        <h1 class="text-2xl font-bold text-[#3B346D] mb-6">
            👤 Profil Saya
        </h1>

        <div class="bg-white rounded-2xl shadow-md p-6 flex gap-6 items-center">
            @if ($profil && $profil->foto_profil)
            <img
                src="{{ asset('storage/' . $profil->foto_profil) }}"
                class="w-28 h-28 rounded-full object-cover">
            @else
            <div
                class="w-28 h-28 rounded-full bg-[#3B346D] flex items-center justify-center text-white text-4xl font-bold">
                {{ strtoupper(substr(Auth::user()->nama, 0, 1)) }}
            </div>
            @endif


            <div class="flex-1">
                <p class="text-lg font-bold text-[#3B346D]">
                    {{ Auth::user()->name }}
                </p>
                <p class="text-sm text-gray-600">
                    {{ Auth::user()->email }}
                </p>

                <div class="mt-3 space-y-1 text-sm">
                    <p><b>Alamat:</b> {{ $profil->alamat ?? '-' }}</p>
                    <p><b>No. Telepon:</b> {{ $profil->nomor_telepon ?? '-' }}</p>
                    <p><b>Jenis Kelamin:</b>
                        {{ $profil?->jenis_kelamin === 'Laki-laki' ? 'Laki-laki' : ($profil?->jenis_kelamin === 'Perempuan' ? 'Perempuan' : '-') }}
                    </p>
                </div>
            </div>

            <a href="{{ route('siswa.profil.edit') }}"
                class="px-5 py-2 bg-[#3B346D] text-white rounded-lg">
                Edit Profil
            </a>
        </div>

    </div>
</x-app-layout>