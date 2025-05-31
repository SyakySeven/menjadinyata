@extends('layout.menu')
@section('konten')
<div style="margin-top: 30px; margin-bottom: 20px;" class="card-header">
    <b>Tambah Data Barang</b>
</div>

<table class="table">
<form method="POST" action="{{route('barang.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="id_barang">ID Barang</label>
        <input type="text" class="form-control" id="id_barang" name="id_barang" required value=" {{ $kode_barang }} ">
        @error('id_barang') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="form-group">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
        @error('nama_barang') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="form-group">
        <label for="varian">Varian Barang</label>
        <select class="form-control" id="varian" name="varian" required>
            <option value="">Pilih</option>
            <option value="Baru">Baru</option>
            <option value="Bekas">Bekas</option>
        </select>
        @error('varian') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="form-group">
        <label for="harga_beli">Harga Beli</label>
        <input type="number" class="form-control" id="harga_beli" name="harga_beli" required>
        @error('harga_beli') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="form-group">
        <label for="harga_jual">Harga Jual</label>
        <input type="number" class="form-control" id="harga_jual" name="harga_jual" required>
        @error('harga_jual') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="form-group">
        <label for="foto">Foto Barang</label>
        <input type="file" name ="foto" class="form-control" accept=".jpg, .jpeg, .png">
        @error('foto') {{ $message }} @enderror
    </div>

    <button type="submit" style="border-radius: 8px;" class="btn btn-primary btn-sm mt-2">Simpan</button>
    <a href="{{ route('barang.index') }}" style="border-radius: 8px; margin-left: 3px;" class="btn btn-secondary btn-sm mt-2">Kembali</a>

</form>
@endsection