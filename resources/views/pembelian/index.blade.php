@extends('layout.menu')
@section('konten')
<div style="margin-top: 30px;">
    <h1>Data Pembelian</h1>
</div>

<div style="margin-top: 30px">
    <table class="table">
    <a href = "{{ route('pembelian.create') }}" style="border-radius: 8px;" class="btn btn-primary btn-sm">Tambah Data</a>
    <a href = "{{ route('pembelian.cetak') }}" target="_blank" style="border-radius: 8px; margin-left: 3px;" class="btn btn-secondary btn-sm">Cetak</a>
    <a href = "{{ route('pembelian.excel') }}" style="border-radius: 8px; margin-left: 3px;" class="btn btn-success btn-sm">Export Ke Excel</a>
    <div style="margin-top: 3px"></div>
    <thead>
        <tr>
            <td>ID Pembelian</td>
            <td>Barang</td>
            <td>Suplier</td>
            <td>Qty</td>
            <td>Tanggal Pesanan</td>
            <td>Gambar</td>
            <td>Aksi</td>
        </tr>
    </thead>

    <tbody>
        @foreach($data as $d)
        <tr>
            <td>{{ $d->id_pembelian }}</td>
            <td>{{ $d->barang->id_barang ?? '-' }}   </td>
            <td>{{ $d->suplier->id_suplier ?? '-' }}</td>
            <td>{{ $d->qty }}</td>
            <td>{{ dateID($d->tgl) }}</td>
            
            <td>
                @if($d->barang && $d->barang->foto)
                    <img src="{{ asset('uploads/foto_barang/' . $d->barang->foto) }}"
                    style="width: 100px; height: auto; border-radius: 8px;" />
                @else
                    No Foto
                @endif
            </td>

            <td>
                <a href="{{ route('pembelian.edit', $d->id) }}" style="border-radius: 8px;" class="btn btn-success btn-sm">Ubah</a>
                <form id="delete-form-{{ $d->id }}" action="{{ route('pembelian.destroy', $d->id_pembelian) }}" method="POST" style="display: inline;" 
                    onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="button" style="border-radius: 8px;" class="btn btn-danger btn-sm" onclick="confirmDelete ( {{ $d->id }} )">Hapus</button>
                </form>

                <script>
                    function confirmDelete(id) {
                        Swal.fire({
                            title: 'Yakin hapus data?', 
                            text: "Data yang dihapus tidak dapat dikembalikan!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6', 
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, hapus!', 
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('delete-form-' + id).submit();
                            }
                        });
                    }
                </script>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection