@extends('layout.menu')
@section('konten')
<div class="card">
    <div style="margin-top: 30px;" class="card-header">
        <b>Edit Data Pembelian</b>
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

        <form action="{{ route('pembelian.update', $pembelian->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="id_barang">Barang</label>
                <select name="id_barang" class="form-control" required>
                    @foreach($barang as $b)
                    <option value="{{ $b->id_barang }}" {{ $pembelian->id_barang == $b->id_barang ? 'selected' : '' }}>
                        {{ $b->nama }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="id_suplier">Suplier</label>
                <select name="id_suplier" class="form-control" required>
                    @foreach($suplier as $s)
                    <option value="{{ $s->id_suplier }}" {{ $pembelian->id_suplier == $s->id_suplier ? 'selected' : '' }}>
                        {{ $s->nama }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="qty">Jumlah</label>
                <input type="number" name="qty" class="form-control" value="{{ $pembelian->qty }}" required min="1">
            </div>

            <div class="form-group mb-3">
                <label for="tgl_pesan">Tanggal Pesan</label>
                <input type="date" name="tgl" class="form-control" value="{{ $pembelian->tgl }}" required>
            </div>

            <button type="submit" style="border-radius: 8px;"class="btn btn-primary btn-sm mt-2">Update</button>
            <a href="{{ route('pembelian.index') }}" style="border-radius: 8px;"class="btn btn-secondary btn-sm mt-2">Batal</a>
        </form>
    </div>
</div>
@endsection
