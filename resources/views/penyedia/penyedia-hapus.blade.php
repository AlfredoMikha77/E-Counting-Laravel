@extends('layouts.app')

@section('title')
Hapus Penyedia |  Admin
@endsection

@section('content')
<h3>Hapus Penyedia</h3>
<div class="form-login">
  <h4>Ingin Menghapus Data ?</h4>
  <button type="submit" class="btn btn-simpan" name="hapus" style="width: 40%; margin: 20px auto;">
    <a href="{{ url('/penyedia/destroy/' . $penyedia->id_penyedia) }}">
      Yes
    </a>
  </button>
  <button type="submit" class="btn btn-simpan" name="tidak" style="width: 40%; margin: 20px auto;">
    <a href="/penyedia">
      No
    </a>
  </button>
</div>
@endsection
