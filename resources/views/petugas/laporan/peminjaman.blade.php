<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Peminjaman</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px 8px;
        }

        th {
            background-color: #f3f4f6;
            text-align: center;
        }

        .text-center {
            text-align: center;
        }

        .judul {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }

        .subjudul {
            text-align: center;
            margin-top: 4px;
            font-size: 12px;
        }

        .tanggal {
            margin-top: 10px;
            font-size: 11px;
        }
    </style>
</head>
<body>

    <!-- Judul -->
    <div class="judul">
        LAPORAN DATA PEMINJAMAN BUKU
    </div>
    <div class="subjudul">
        Perpustakaan Scholaria
    </div>

    <div class="tanggal">
        Dicetak pada: {{ date('d M Y') }}
    </div>

    <!-- Table -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Judul Buku</th>
                <th>Jumlah</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($peminjaman as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $item->siswa->nama ?? '-' }}</td>
                    <td>{{ $item->buku->judul ?? '-' }}</td>
                    <td class="text-center">{{ $item->jumlah }}</td>
                    <td class="text-center">
                        {{ \Carbon\Carbon::parse($item->tanggal_peminjaman)->format('d-m-Y') }}
                    </td>
                    <td class="text-center">
                        {{ $item->tanggal_pengembalian
                            ? \Carbon\Carbon::parse($item->tanggal_pengembalian)->format('d-m-Y')
                            : '-' }}
                    </td>
                    <td class="text-center">
                        {{ ucfirst($item->status) }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">
                        Tidak ada data peminjaman
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
