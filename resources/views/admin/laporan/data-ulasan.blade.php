<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Data Ulasan</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
        }

        h2 {
            text-align: center;
            margin-bottom: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            vertical-align: top;
        }

        th {
            background-color: #eee;
            text-align: center;
        }
    </style>
</head>

<body>

    <h2>LAPORAN DATA ULASAN</h2>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Siswa</th>
                <th>Buku</th>
                <th width="10%">Rating</th>
                <th>Ulasan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ulasan as $item)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td>{{ $item->user->nama ?? '-' }}</td>
                <td>{{ $item->buku->judul ?? '-' }}</td>
                <td align="center">
                    {{ $item->rating }} / 5
                </td>

                <td>{{ $item->ulasan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>