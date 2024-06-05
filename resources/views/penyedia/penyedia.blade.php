@extends('layouts.app')

@section('title')
Penyedia |  Admin
@endsection

@section('content')
<h3>Penyedia</h3>
<button type="button" class="btn btn-tambah">
  <a href="/penyedia/tambah">Tambah Data</a>
</button>
<table class="table-data">
  <thead>
    <tr>
        <th scope="col" style="width: 20%">Photo</th>
        <th>Penyedia</th>
        <th scope="col" style="width: 15%">Harga</th>
        <th scope="col" style="width: 30%">Deskripsi</th>
        <th scope="col" style="width: 20%">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($penyedias as $penyedia)
    <tr>
      <td><img src="{{ asset('img_penyedia/' . $penyedia->photo) }}" alt="" width="300px"></td>
      <td>{{ $penyedia->nama }}</td>
      <td>Rp. {{ number_format($penyedia->harga) }}</td>
      <td>{{ $penyedia->deskripsi }}</td>
      <td>
        <a class='btn-edit' href="/penyedia/edit/{{ $penyedia->id_penyedia }}">Edit</a>
        |
        <a class='btn-delete' href="/penyedia/hapus/{{ $penyedia->id_penyedia }}">Hapus</a>
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
