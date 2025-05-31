@extends('layout.menu')
@section('konten')
<div style="margin-top: 30px; margin-bottom: 20px;" class="card-header">
    <b>Edit Data Suplier</b>
</div>

<table class="table">
<form method="POST" action="{{ route('suplier.update', $sup->id_suplier) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="id_suplier">ID Suplier</label>
        <input type="text" class="form-control" id="id_suplier" name="id_suplier" required value="{{ old('id_suplier', $sup->id_suplier) }}" readonly>
        @error('id_suplier') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="form-group">
        <label for="nama">Nama Suplier</label>
        <input type="text" class="form-control" id="nama" name="nama" required value="{{ old('nama', $sup->nama) }}">
        @error('nama') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="form-group">
        <label for="alamat">Alamat Suplier</label>
        <textarea class="form-control" id="alamat" name="alamat" required>{{ old('alamat', $sup->alamat) }}</textarea>
        @error('alamat') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="form-group">
        <label for="kode_pos">Kode Pos</label>
        <input type="text" class="form-control" id="kode_pos" name="kode_pos" required value="{{ old('kode_pos', $sup->kode_pos) }}">
        @error('kode_pos') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="form-group">
        <label for="kota">Kota</label>
        <input type="text" class="form-control" id="kota" name="kota" required value="{{ old('kota', $sup->kota) }}">
        @error('kota') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <button type="submit" style="border-radius: 8px;"class="btn btn-primary btn-sm mt-2">Simpan</button>
    <a href="{{ route('suplier.index') }}" style="border-radius: 8px; margin-left: 3px;" class="btn btn-secondary btn-sm mt-2">Kembali</a>
</form>
@endsection