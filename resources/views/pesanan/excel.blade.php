<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Export Ke Excel</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #333; padding: 6px; text-align: left; }
        img { width: 80px; height: auto; border-radius: 8px; }
    </style>
</head>
<body>
    <h3>Data Pembelian</h3>
    <table>
        <thead>
            <tr>
                <td>ID Pesanan</td>
                <td>Nama Pembeli</td>
                <td>Nama Barang</td>
                <td>Varian</td>
                <td>Qty</td>
                <td>Tanggal Pesanan</td>
            </tr>
        </thead>
        
        <tbody>
            @foreach($data as $d)
            <tr>
                <td>{{ $d->id_pesanan }}</td>
                <td>{{ $d->pembeli->id_pembeli ?? '-' }}</td>
                <td>{{ $d->barang->id_barang ?? '-' }}</td>
                <td>{{ $d->barang->varian ?? '-' }}</td>
                <td>{{ $d->qty }}</td>
                <td>{{ dateID($d->tgl_pesan) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>