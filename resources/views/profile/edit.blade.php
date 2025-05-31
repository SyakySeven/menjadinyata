@extends('layout.menu')
@section('konten')
<div style="margin-top:30px">
<div class="table">
<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="foto">
    <button type="submit" class="btn btn-primary btn-sm">Update</button>
    <a href="{{ route('dashboard.index') }}"></a>
</form>
@endsection