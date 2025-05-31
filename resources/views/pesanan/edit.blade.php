@extends('layout.menu')
@section('konten')
<div style="margin-top: 30px">
<table class="table">
<div class="card">
    <div class="card-header">
        <b>Edit Data Pesanan</b>
    </div>
    <div class="card-body">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('pesanan.update', $pesanan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="id_pelanggan">Pembeli</label>
                <select name="id_pelanggan" class="form-control" required>
                    @foreach($pembeli as $p)
                    <option value="{{ $p->id_pembeli }}" {{ $pesanan->id_pelanggan == $p->id_pembeli ? 'selected' : '' }}>
                        {{ $p->nama }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="id_barang">Barang</label>
                <select name="id_barang" class="form-control" required>
                    @foreach($barang as $b)
                    <option value="{{ $b->id_barang }}" {{ $pesanan->id_barang == $b->id_barang ? 'selected' : '' }}>
                        {{ $b->nama }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="varian">Varian</label>
                <input type="text" class="form-control" id="varian" name="varian" value="{{ $pesanan->barang->varian ?? '-' }}" readonly>
            </div>

            <div class="form-group mb-3">
                <label for="qty">Jumlah</label>
                <input type="number" name="qty" class="form-control" value="{{ $pesanan->qty }}" required min="1">
            </div>

            <div class="form-group mb-3">
                <label for="tgl_pesan">Tanggal Pesan</label>
                <input type="date" name="tgl_pesan" class="form-control" value="{{ $pesanan->tgl_pesan }}" required>
            </div>

            <button type="submit" style="border-radius: 8px;" class="btn btn-primary btn-sm mt-2">Update</button>
            <a href="{{ route('pesanan.index') }}" style="border-radius: 8px;" class="btn btn-secondary btn-sm mt-2">Batal</a>
        </form>
    </div>
</div>
@endsection
