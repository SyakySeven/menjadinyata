@extends('layout.menu')
@section('konten')

<div style="margin-top: 30px;">
<h1>Dashboard</h1>
</div>

<div style="margin-top: 30px">
    <table class="table">
        <thead>
            <tr>
                <td>Jumlah Barang</td>
                <td>Jumlah Pembeli</td>
                <td>Jumlah Suplier</td>
                <td>Jumlah Pesanan</td>
                <td>Jumlah Pembelian</td>
            </tr>
        </thead>
        
</div>

<tbody>
    <tr>
        <td>{{$jumlah_barang}}</td>
        <td>{{$jumlah_pembeli}}</td>
        <td>{{$jumlah_suplier}}</td>
        <td>{{$jumlah_pesanan}}</td>
        <td>{{$jumlah_pembelian}}</td>
    </tr>   
</tbody>
    
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

</table>
@endsection