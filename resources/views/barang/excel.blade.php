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
    <h3>Data Barang</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Id Barang</th>
                <th>Nama Barang</th>
                <th>Varian</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barang as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->id_barang }}</td>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->varian }}</td>
                <td>{{ $d->harga_beli }}</td>
                <td>{{ $d->harga_jual }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>