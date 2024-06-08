@extends('layouts.app')

@section('title')
Layanan | Admin
@endsection

@section('content')
<h3>Layanan</h3>
<div class="btn-group">
    <button type="button" class="btn btn-tambah">
        <a href="{{ url('/layanan/create') }}">Tambah Data</a>
    </button>
    <button type="button" class="btn btn-cetak">
        <a href="{{ url('/layanan/cetak') }}">Cetak PDF</a>
    </button>
</div>
<table class="table-data">
    <thead>
        <tr>
            <th>Photo</th>
            <th>Layanan</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($layanans as $layanan)
        <tr>
            <td><img src="{{ asset('img_layanan/' . $layanan->photo) }}" alt="" width="100px"></td>
            <td>{{ $layanan->layanan }}</td>
            <td>Rp. {{ number_format($layanan->harga) }}</td>
            <td>{{ $layanan->deskripsi }}</td>
            <td>
                <a class='btn-edit' href="/layanan/edit/{{ $layanan->id }}">Edit</a>
                <form action="/layanan/{{ $layanan->id }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" align="center">Tidak ada data</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
