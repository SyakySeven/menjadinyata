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
    <h3>Data Pembeli</h3>
    <table>
        <thead>
            <tr>
                <td>No</td>
                <td>ID Suplier</td>
                <td>Nama Suplier</td>
                <td>Alamat Suplier</td>
                <td>Kode Pos</td>
                <td>Kota</td>
            </tr>
        </thead>
        
        <tbody>
            @foreach($suplier as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->id_suplier }}</td>
                <td>{{ $d->nama }}</td>
                <td>{!! nl2br($d->alamat) !!}</td>
                <td>{{ $d->kode_pos }}</td>
                <td>{{ $d->kota }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>