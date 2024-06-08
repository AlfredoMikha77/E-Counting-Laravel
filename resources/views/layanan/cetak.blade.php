<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cetak PDF Layanan</title>
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
    </style>
</head>
<body>
    <h3>Layanan</h3>
    <table class="table-data">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Layanan</th>
                <th>Harga</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($layanans as $layanan)
            <tr>
                <td><img src="{{ public_path('img_layanan/' . $layanan->photo) }}" alt="" width="100px"></td>
                <td>{{ $layanan->layanan }}</td>
                <td>Rp. {{ number_format($layanan->harga) }}</td>
                <td>{{ $layanan->deskripsi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
