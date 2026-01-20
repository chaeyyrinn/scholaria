<x-app-layout>
    <h1 class="text-xl text-gray-500 p-5">Data Siswa</h1>


    @foreach($data as $d)
    <div>
        <h1 class="text-2xl">Data Siswa</h1>
        <p>Nama siswa: {{ $d->nama }}</p>
        <p>Email siswa: {{ $d->email }}</p>
        <p>Role: {{ $d->role }}</p>

    </div>
    @endforeach
</x-app-layout>