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
                <td>Id Pembeli</td>
                <td>Nama Pembeli</td>
                <td>Jenis Kelamin</td>
                <td>Alamat</td>
                <td>Kode Pos</td>
                <td>Tanggal Lahir</td>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>