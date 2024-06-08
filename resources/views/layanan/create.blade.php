@extends('layouts.app')

@section('title')
Tambah Layanan | Admin
@endsection

@section('content')
<h3>Tambah Layanan</h3>
<form action="{{ url('/layanan/store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="layanan">Layanan</label>
    <input class="input" type="text" name="layanan" id="layanan" placeholder="Layanan" value="{{ old('layanan') }}" />
    @error('layanan')
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

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
