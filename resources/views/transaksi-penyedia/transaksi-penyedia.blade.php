@extends('layouts.app')

@section('title')
Transaksi Penyedia | Admin
@endsection

@section('content')
<h3>Transaksi Penyedia</h3>
<button type="button" class="btn btn-cetak">
    <a href="{{ url('/transaksi-penyedia/cetak') }}">Cetak PDF</a>
</button>
<table class="table-data">
    <thead>
        <tr>
            <th scope="col">Penyedia</th>
            <th scope="col">Harga</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Foto</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($transaksipenyedias as $transaksi)
        <tr>
            <td>{{ $transaksi->penyedia->nama }}</td>
            <td>Rp. {{ number_format(intval($transaksi->penyedia->harga)) }}</td>
            <td>{{ $transaksi->penyedia->deskripsi }}</td>
            <td>{{ $transaksi->created_at }}</td>
            <td><img src="{{ asset('img_penyedia/' . $transaksi->penyedia->photo) }}" alt="Photo Penyedia" width="100px"></td>

        </tr>
        @empty
        <tr>
            <td colspan="4" align="center">Tidak ada data</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
