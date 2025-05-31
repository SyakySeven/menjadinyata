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
                <td>ID Pembelian</td>
                <td>Barang</td>
                <td>Suplier</td>
                <td>Qty</td>
                <td>Tanggal Pesanan</td>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>