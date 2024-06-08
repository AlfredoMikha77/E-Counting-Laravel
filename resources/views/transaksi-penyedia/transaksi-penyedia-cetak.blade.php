<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cetak PDF Transaksi Penyedia</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        .table-data {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table-data th, .table-data td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table-data th {
            background-color: #f2f2f2;
            text-align: left;
            color: #333;
        }

        .table-data td {
            text-align: left;
            vertical-align: top;
        }

        .table-data tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table-data tr:hover {
            background-color: #f1f1f1;
        }

        .table-data th, .table-data td {
            padding: 12px;
            text-align: left;
        }

        .header {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <h3>Transaksi Penyedia</h3>
    <table class="table-data">
        <thead>
            <tr class="header">
                <th>Penyedia</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
                <th>Foto</th> <!-- Tambah kolom photo -->
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksipenyedias as $transaksi)
            <tr>
                <td>{{ $transaksi->penyedia->nama }}</td>
                <td>Rp. {{ number_format(intval($transaksi->penyedia->harga)) }}</td>
                <td>{{ $transaksi->penyedia->deskripsi }}</td>
                <td>{{ $transaksi->created_at->format('d-m-Y') }}</td>
                <td><img src="{{ public_path('img_penyedia/' . $transaksi->penyedia->photo) }}" alt="" width="100px"></td>
            </tr>
            @empty
            <tr>
                <td colspan="5" align="center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
