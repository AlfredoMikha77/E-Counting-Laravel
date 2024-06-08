@extends('layouts.app')

@section('title')
Edit Layanan | Admin
@endsection

@section('content')
<h3>Edit Layanan</h3>
<form action="{{ url('/layanan/update/' . $layanan->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <label for="layanan">Layanan</label>
    <input class="input" type="text" name="layanan" id="layanan" value="{{ $layanan->layanan }}" />
    @error('layanan')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="harga">Harga</label>
    <input class="input" type="text" name="harga" id="harga" value="{{ $layanan->harga }}" />
    @error('harga')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="deskripsi">Deskripsi</label>
    <textarea class="input" name="deskripsi" id="deskripsi">{{ $layanan->deskripsi }}</textarea>
    @error('deskripsi')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="photo">Photo</label>
    <input type="file" name="photo" id="photo" />
    @error('photo')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
