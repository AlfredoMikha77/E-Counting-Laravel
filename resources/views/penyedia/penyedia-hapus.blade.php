@extends('layouts.app')

@section('title')
Hapus Penyedia |  Admin
@endsection

@section('content')
<h3>Hapus Penyedia</h3>
<div class="form-login">
  <h4>Ingin Menghapus Data ?</h4>
  <form action="{{ url('/penyedia/destroy/' . $penyedia->id_penyedia) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-simpan" style="width: 40%; margin: 20px auto;">Yes</button>
  </form>
  <a href="/penyedia" class="btn btn-simpan" style="width: 40%; margin: 20px auto;">No</a>
</div>
@endsection
