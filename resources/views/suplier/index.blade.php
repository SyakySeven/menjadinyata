@extends('layout.menu')
@section('konten')
<div style="margin-top: 30px;">
    <h1>Data Suplier</h1>
</div>

<div style="margin-top: 30px">
    <table class="table">
        <a href="{{ route('suplier.create') }}" style="border-radius: 8px;" class = "btn btn-primary btn-sm">Tambah Data</a>
        <a href="{{ route('suplier.cetak') }}" target="_blank" style="border-radius: 8px; margin-left: 3px;" class="btn btn-secondary btn-sm">Cetak</a>
        <a href="{{ route('suplier.excel') }}" style="border-radius: 8px; margin-left: 3px;" class="btn btn-success btn-sm">Export Ke Excel</a>
        <div style="margin-top:3px"></div>
                <thead>
                    <tr>
                        <td>No</td>
                        <td>ID Suplier</td>
                        <td>Nama Suplier</td>
                        <td>Alamat Suplier</td>
                        <td>Kode Pos</td>
                        <td>Kota</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
        </div>
        <tbody>
            @foreach($suplier as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->id_suplier }}</td>
                <td>{{ $d->nama }}</td>
                <td>{!! nl2br($d->alamat) !!}</td>
                <td>{{ $d->kode_pos }}</td>
                <td>{{ $d->kota }}</td>
                <td>
                    <a href="{{ route('suplier.edit', $d->id_suplier) }}" style="border-radius: 8px;" class="btn btn-success btn-sm">Ubah</a>
                    <form action="{{ route('suplier.destroy', $d->id_suplier) }}" method="POST" style="display: inline;" 
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