<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Petugas
        </h2>
    </x-slot>


    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 bg-white p-6 shadow rounded">
            <form action="{{ route('petugas.update', $petugas->id) }}" method="POST">
                @csrf
                @method('PUT')


                <div class="mb-4">
                    <label class="block">Nama</label>
                    <input type="text" name="name" value="{{ $petugas->name }}" class="w-full border rounded px-3 py-2" required>
                </div>


                <div class="mb-4">
                    <label class="block">Email</label>
                    <input type="email" name="email" value="{{ $petugas->email }}" class="w-full border rounded px-3 py-2" required>
                </div>


                <div class="mb-4">
                    <label class="block">Password (opsional)</label>
                    <input type="password" name="password" class="w-full border rounded px-3 py-2">
                </div>


                <div class="flex gap-2">
                    <button class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
                    <a href="{{ route('petugas.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>