@extends('layout.menu')
@section('konten')
<div class="card">
    <div style="margin-top: 30px;" class="card-header">
        <b>Tambah Data Pembelian</b>
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

        <form action="{{ route('pembelian.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>ID Pembelian</label>
                <input type="text" name="id_pembelian" class="form-control" required value="{{ $kode_pembelian }}">
            </div>

            <div class="form-group">
                <label>Barang</label>
                <select name="id_barang" class="form-control" id="select-barang" required>
                    <option value="">-- Pilih Barang --</option>
                    @foreach($barang as $b)
                    <option value="{{ $b->id_barang }}" data-foto="{{ $b->foto ? asset('uploads/foto_barang/' . $b->foto) : '' }}">
                        {{ $b->nama }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Preview Foto Barang</label><br>
                <img id="preview-foto-barang" src="" style="width:100px; height:auto; border-radius:8px; display:none;">
            </div>

            <div class="form-group">
                <label>Suplier</label>
                <select name="id_suplier" class="form-control" required>
                    <option value="">-- Pilih Suplier --</option>
                    @foreach($suplier as $s)
                    <option value="{{ $s->id_suplier }}">{{ $s->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" name="qty" class="form-control" required min="1">
            </div>

            <div class="form-group">
                <label>Tanggal Pesan</label>
                <input type="date" name="tgl" class="form-control" required>
            </div>

            <button type="submit" style="border-radius: 8px;" class="btn btn-primary btn-sm mt-2">Simpan</button>
            <a href="{{ route('pembelian.index') }}" style="border-radius: 8px;" class="btn btn-secondary btn-sm mt-2">
                Kembali
            </a>
        </form>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectBarang = document.getElementById('select-barang');
            const imgPreview = document.getElementById('preview-foto-barang');
            
            function updatePreview() {
                const selected = selectBarang.options[selectBarang.selectedIndex];
                const foto = selected.getAttribute('data-foto');
                if(foto) {
                    imgPreview.src = foto;
                    imgPreview.style.display = 'inline';
                } else {
                    imgPreview.src = '';
                    imgPreview.style.display = 'none';
                }
            }

            selectBarang.addEventListener('change', updatePreview);
            updatePreview();
        });
        </script>
        
    </div>
</div>
@endsection
