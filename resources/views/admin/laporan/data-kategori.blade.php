<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Data Kategori</title>

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

<h2>LAPORAN DATA KATEGORI</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kategori as $item)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td>{{ ucfirst($item->nama_kategori) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
