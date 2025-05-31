<!DOCTYPE html>
<html>
    <link rel="stylesheet" 
href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<style>
    @media print {
        @page {
            size: A4 Landscape;
            margin-top: 20mm;
            margin-bottom: 20mm;
            margin-left: 20mm;
            margin-right: 20mm;
        }

        body {
            margin: 0;
            -webkit-print-color-adjust: exact;
        }
    }
</style>

<body onload="window.print(); window.onafterprint = closeWindow;">
    <h1>Data Pembeli</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID Pembeli</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Kode Pos</th>
                <th>Tanggal Lahir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembeli as $item)
            <tr>
                <td>{{ $item->id_pembeli }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jns_kelamin }}</td>
                <td>{!! nl2br($item->alamat) !!}</td>
                <td>{{ $item->kode_pos }}</td>
                <td>{{ $item->tgl_lahir }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function closeWindow() {
            window.close();
        }
    </script>
</body>
</html>
