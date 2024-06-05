@extends('layouts.app')

@section('title')
Edit Penyedia |  Admin
@endsection

@section('content')
<h3>Edit Penyedia</h3>
<div class="form-login">
  <form action="{{ url('/penyedia/update/' . $penyedia->id_penyedia) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <label for="nama">Nama Penyedia</label>
    <input class="input" type="text" name="nama" id="nama" placeholder="Nama Penyedia"
      value="{{ old('nama', $penyedia->nama) }}" />
    @error('nama')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="harga">Harga</label>
    <input class="input" type="text" name="harga" id="harga" placeholder="Harga"
      value="{{ old('harga', $penyedia->harga) }}" />
    @error('harga')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="deskripsi">Deskripsi</label>
    <textarea class="input" name="deskripsi" id="deskripsi"
      placeholder="Deskripsi">{{ old('deskripsi', $penyedia->deskripsi) }}</textarea>
    @error('deskripsi')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <label for="photo">Photo</label>
    <img src="{{ asset('img_penyedia/' . $penyedia->photo) }}" alt="" width="200px">
    <input type="file" name="photo" id="photo" />
    @error('photo')
    <p style="font-size: 10px; color: red">{{ $message }}</p>
    @enderror

    <button type="submit" class="btn btn-simpan" name="edit" style="margin-top: 50px">
      Edit
    </button>
  </form>
</div>
@endsection
