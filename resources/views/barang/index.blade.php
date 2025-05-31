@extends('layout.menu')
@section('konten')
<div style="margin-top: 30px;">
    <h1>Data Barang</h1>
</div>

<div style="margin-top: 30px">
    <table class="table">
        <a href="{{ route('barang.create') }}" style="border-radius: 8px;" class="btn btn-primary btn-sm">Tambah Data</a>
        <a href="{{ route('barang.cetak') }}" target="_blank" style="border-radius: 8px; margin-left: 3px;" class="btn btn-secondary btn-sm">Cetak</a>
        <a href="{{ Route('barang.excel') }}" style="border-radius: 8px; margin-left: 3px;" class="btn btn-success btn-sm">Export Ke Excel</a>
        <div style="margin-top:3px"></div>
        <thead>
            <tr>
                <td>No</td>
                <td>Id Barang</td>
                <td>Nama Barang</td>
                <td>Varian</td>
                <td>Harga Beli</td>
                <td>Harga Jual</td>
                <td>Gambar</td>
                <td>Aksi</td>
            </tr>
        </thead>
</div>
    <tbody>
        @foreach($barang as $d)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $d->id_barang }}</td>
            <td>{{ $d->nama }}</td>
            <td>{{ $d->varian }}</td>
            <td>{{ $d->harga_beli }}</td>
            <td>{{ $d->harga_jual }}</td>
            <td>
                @if($d->foto)
                    <a href="{{ asset('uploads/foto_barang/' . $d->foto) }}" target=_blank>
                        <img src="{{ asset('uploads/foto_barang/' . $d->foto) }}"
                        style="width: 100px; height: auto; border-radius: 8px" />
                    </a>
                @else
                    No Foto
                @endif
            </td>
            <td>
                <a href="{{ route('barang.edit', $d->id) }}" style="border-radius: 8px;" class="btn btn-success btn-sm">Ubah</a>
                <form action="{{ route('barang.destroy', $d->id) }}" method="POST" style="display: inline;" 
                    onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="border-radius: 8px;" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
