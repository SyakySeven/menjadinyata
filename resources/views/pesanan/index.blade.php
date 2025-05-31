@extends('layout.menu')
@section('konten')
<div style="margin-top: 30px;">
    <h1>Data Pesanan</h1>
</div>

<div style="margin-top: 30px">
    <a href="{{ route('pesanan.create') }}" style="border-radius: 8px;" class="btn btn-primary btn-sm">Tambah Data</a>
    <a href="{{ route('pesanan.cetak') }}" target="_blank" style="border-radius: 8px; margin-left: 3px;" class="btn btn-secondary btn-sm">Cetak</a>
    <a href="{{ route('pesanan.excel') }}" style="border-radius: 8px; margin-left: 3px;" class="btn btn-success btn-sm">Export Ke Excel</a>
    
    <form method="GET" action="{{ route('pesanan.index') }}" class="mb-3" style="margin-top: 10px;">
        Dari :
        <input type="date" name="dari" value="{{ request('dari') }}">
        Sampai :
        <input type="date" name="sampai" value="{{ request('sampai') }}">
        <button type="submit" style="border-radius: 8px; margin-left: 3px;" class="btn btn-light">Filter</button>
    </form>

    <button style="border-radius: 8px; margin-left: 3px;" class="btn btn-success btn-sm mb-3" data-toggle="modal" data-target="#filterModal">
        <i class="fa fa-print"></i>&nbsp;Cetak Data
	</button>
    {{-- Modal --}}
    <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" 
	aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel">Pilih Tanggal untuk Cetak</h5>
                <button style="margin-left: 7px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="GET" action="{{ route('pesanan.cetak') }}" target=_blank>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="dari">Dari:</label>
                        <input type="date" class="form-control" id="dari" name="dari" required>
                    </div>
                    <div class="form-group">
                        <label for="sampai">Sampai:</label>
                        <input type="date" class="form-control" id="sampai" name="sampai" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" style="border-radius: 8px;" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" style="border-radius: 8px;" class="btn btn-success">Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <div style="margin-top: 3px"></div>
    <table class="table">
        <thead>
            <tr>
                <td>ID Pesanan</td>
                <td>Nama Pembeli</td>
                <td>Nama Barang</td>
                <td>Varian</td>
                <td>Qty</td>
                <td>Tanggal Pesanan</td>
                <td>Gambar</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach($pesanan as $d)
            <tr>
                <td>{{ $d->id_pesanan }}</td>
                <td>{{ $d->pembeli->id_pembeli ?? '-' }}</td>
                <td>{{ $d->barang->id_barang ?? '-' }}</td>
                <td>{{ $d->barang->varian ?? '-' }}</td>
                <td>{{ $d->qty }}</td>
                <td>{{ dateID($d->tgl_pesan) }}</td>
                <td>
                    @if($d->barang && $d->barang->foto)
                        <img src="{{ asset('uploads/foto_barang/' . $d->barang->foto) }}"
                        style="width: 100px; height: auto; border-radius: 8px;" />
                    @else
                        No Foto
                    @endif
                </td>
                <td>
                    <a href="{{ route('pesanan.edit', $d->id) }}" style="border-radius: 8px;" class="btn btn-success btn-sm">Ubah</a>
                    <form action="{{ route('pesanan.destroy', $d->id_pesanan) }}" method="POST" style="display: inline;" 
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
</div>
@endsection