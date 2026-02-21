<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Data Buku</title>

    <style>
        body { font-family: Arial, sans-serif; font-size: 11px; }
        h2 { text-align: center; margin-bottom: 10px; }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 5px;
            vertical-align: top;
        }

        th {
            background-color: #eee;
            text-align: center;
        }
    </style>
</head>
<body>

<h2>LAPORAN DATA BUKU</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>ISBN</th>
            <th>Stok</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($buku as $item)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td>{{ $item->judul }}</td>
            <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
            <td>{{ $item->penulis }}</td>
            <td>{{ $item->penerbit }}</td>
            <td align="center">{{ $item->tahun_terbit }}</td>
            <td>{{ $item->isbn }}</td>
            <td align="center">{{ $item->stok }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
