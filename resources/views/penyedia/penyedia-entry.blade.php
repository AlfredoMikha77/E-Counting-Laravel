@extends('layouts.app')

@section('title')
Tambah Penyedia |  Admin
@endsection

@section('content')
<h3>Input Penyedia</h3>
<div class="form-login">
  <form action="{{ url('/penyedia/store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="nama">Nama Penyedia</label>
    <input class="input" type="text" name="nama" id="nama" placeholder="Nama Penyedia" value="{{ old('nama') }}" />
    @error('nama')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="harga">Harga</label>
    <input class="input" type="text" name="harga" id="harga" placeholder="Harga" value="{{ old('harga') }}" />
    @error('harga')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="deskripsi">Deskripsi</label>
    <textarea class="input" name="deskripsi" id="deskripsi" placeholder="Deskripsi">{{ old('deskripsi') }}</textarea>
    @error('deskripsi')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="photo">Photo</label>
    <input type="file" name="photo" id="photo" />
    @error('photo')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <button type="submit" class="btn btn-simpan" name="simpan" style="margin-top: 50px">
      Simpan
    </button>
  </form>
</div>
@endsection
