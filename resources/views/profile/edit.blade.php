@extends('layout.menu')
@section('konten')
<div style="margin-top:30px">
<div class="table">
<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="foto" style="border-radius: 8px; margin-top: 7px; margin-bottom: 7px; margin-left: 7px;" class="btn btn-sm">
    <button type="submit" style="border-radius: 8px;" class="btn btn-primary btn-sm">Simpan</button>
    <a href="{{ route('dashboard.index') }}"></a>
</form>
@endsection