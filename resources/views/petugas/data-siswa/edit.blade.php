<x-app-layout>
    <div class="max-w-3xl mx-auto px-6 py-10">

        <h1 class="text-2xl font-bold text-[#3B346D] mb-6">
            ✏️ Edit Siswa
        </h1>

        <div class="bg-white p-6 rounded-xl shadow">
            <form action="{{ route('petugas.data-siswa.update', $siswa->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block font-medium">Nama</label>
                    <input type="text" name="name"
                           class="w-full border rounded-lg p-2"
                           value="{{ old('name', $siswa->name) }}">
                    @error('name')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Email</label>
                    <input type="email" name="email"
                           class="w-full border rounded-lg p-2"
                           value="{{ old('email', $siswa->email) }}">
                    @error('email')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">
                        Password (kosongkan jika tidak diubah)
                    </label>
                    <input type="password" name="password"
                           class="w-full border rounded-lg p-2">
                    @error('password')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('petugas.data-siswa.index') }}"
                       class="px-4 py-2 bg-gray-300 rounded-lg">
                        Batal
                    </a>
                    <button class="px-4 py-2 bg-[#3B346D] text-white rounded-lg">
                        Update
                    </button>
                </div>
            </form>
        </div>

    </div>
</x-app-layout>
