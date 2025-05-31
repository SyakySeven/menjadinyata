@extends('layout.menu')
@section('konten')
<div style="margin-top: 30px; margin-bottom: 20px;" class="card-header">
    <b>Edit Data Barang</b>
</div>

<table class="table">
<form method="POST" action="{{route('barang.update', $barang->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="form-group">
            <label for="id_barang">ID Barang</label>
            <input type="text" class="form-control" id="id_barang" name="id_barang" required readonly value="{{ old('id_barang', $barang->id_barang) }}">
            @error('id_barang') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" required value="{{ old('nama_barang', $barang->nama) }}">
            @error('nama_barang') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="varian">Varian Barang</label>
            <select class="form-control" id="varian" name="varian" required>
                <option value="">Pilih</option>
                <option value="Baru" {{ $barang->varian == 'Baru' ? 'selected' : '' }}>Baru</option>
                <option value="Bekas" {{ $barang->varian == 'Bekas' ? 'selected' : '' }}>Bekas</option>
            </select>
            @error('varian') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="harga_beli">Harga Beli</label>
            <input type="number" class="form-control" id="harga_beli" name="harga_beli" required value="{{ old('harga_beli', $barang->harga_beli) }}">
            @error('harga_beli') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="harga_jual">Harga Jual</label>
            <input type="number" class="form-control" id="harga_jual" name="harga_jual" required value="{{ old('harga_jual', $barang->harga_jual) }}">
            @error('harga_jual') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="foto">Foto Barang</label>
            @if($barang->foto)
                <div style="margin-bottom:10px;">
                    <img src="{{ asset('uploads/foto_barang/' . $barang->foto) }}" style="width:100px; height:auto; border-radius:8px;">
                </div>
            @endif
            <input type="file" name="foto" class="form-control" accept=".jpg, .jpeg, .png">
            @error('foto') {{ $message }} @enderror
        </div>
        <button type="submit" style="border-radius: 8px;" class="btn btn-primary btn-sm mt-2">Simpan</button>
        <a href="{{ route('barang.index') }}" style="border-radius: 8px; margin-left: 3px;"class="btn btn-secondary btn-sm mt-2">Kembali</a>
</form>
@endsection
