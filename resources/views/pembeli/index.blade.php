@extends('layout.menu')
@section('konten')
<div style="margin-top: 30px;">
      <h1>Data Pembeli</h1>
</div>

<div style="margin-top: 30px">
      <table class="table">
            <a href="{{ route('pembeli.create') }}" style="border-radius: 8px;" class="btn btn-primary btn-sm">Tambah Data</a>
            <a href="{{ route('pembeli.cetak') }}" target="_blank" style="border-radius: 8px; margin-left: 3px;" class="btn btn-secondary btn-sm">Cetak</a>     
            <a href="{{ route('pembeli.excel') }}" style="border-radius: 8px; margin-left: 3px;" class="btn btn-success btn-sm">Export Ke Excel</a>
            <div style="margin-top:3px"></div>
            <thead>
                  <tr>
                        <td>No</td>
                        <td>Id Pembeli</td>
                        <td>Nama Pembeli</td>
                        <td>Jenis Kelamin</td>
                        <td>Alamat</td>
                        <td>Kode Pos</td>
                        <td>Tanggal Lahir</td>
                        <td>Aksi</td></tr>
                  </thead>
                  <tbody>
                        @foreach($pembeli as $d)
                        <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $d->id_pembeli }}</td>
                              <td>{{ $d->nama }}</td>
                              <td>{{ $d->jns_kelamin }}</td>
                              <td>{!! nl2br($d->alamat) !!}</td>
                              <td>{{ $d->kode_pos }}</td>
                              <td>{{ dateID($d->tgl_lahir) }}</td>
                              <td>
                                    <a href="{{ route('pembeli.edit', $d->id) }}" style="border-radius: 8px;" class="btn btn-success btn-sm">Ubah</a>
                                    <form action="{{ route('pembeli.destroy', $d->id) }}" method="POST" style="display: inline;" 
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