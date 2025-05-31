@extends('layout.menu')
@section('konten')
<div style="margin-top: 30px; margin-bottom: 20px;" class="card-header">
        <b>Edit Data Pembeli</b>
</div>

<table class="table">
<form method="POST" action="{{ route('pembeli.update', $pembeli->id) }}">
    @csrf
    @method('PUT')
        <div class="form-group">
            <label for="id_pembeli">ID Pembeli</label>
            <input type="text" class="form-control" id="id_pembeli" name="id_pembeli" required readonly value="{{ old('id_pembeli', $pembeli->id_pembeli) }}">
            @error('id_pembeli') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="nama_pembeli">Nama Pembeli</label>
            <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" required value="{{ old('nama_pembeli', $pembeli->nama) }}">
            @error('nama_pembeli') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="jk">Jenis Kelamin</label>
            <select class="form-control" id="jk" name="jk" required>
                <option value="">Pilih</option>
                <option value="Laki-laki" {{ $pembeli->jns_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $pembeli->jns_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('jk') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat">{{ old('alamat', $pembeli->alamat) }}</textarea>
            @error('alamat') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="kode_pos">Kode Pos</label>
            <input type="text" class="form-control" id="kode_pos" name="kode_pos" required value="{{ old('kode_pos', $pembeli->kode_pos) }}">
            @error('kode_pos') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required value="{{ old('tgl_lahir', $pembeli->tgl_lahir) }}">
            @error('tgl_lahir') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" style="border-radius: 8px;"class="btn btn-primary btn-sm mt-2">Simpan</button>
        <a href="{{ route('pembeli.index') }}" style="border-radius: 8px; margin-left: 3px;"class="btn btn-secondary btn-sm mt-2">Kembali</a>
</form>
@endsection
