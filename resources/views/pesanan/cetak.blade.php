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
    <h1>Data Pembelian</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID Pesanan</th>
                <th>Pembeli</th>
                <th>Barang</th>
                <th>Varian</th>
                <th>Qty</th>
                <th>Tanggal Pesanan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanan as $item)
            <tr>
                <td>{{ $item->id_pesanan }}</td>
                <td>{{ $item->id_pembeli }}</td>
                <td>{{ $item->id_barang }}</td>
                <td>{{ $item->barang->varian ?? '-' }}</td>
                <td>{{ $item->qty }}</td>
                <td>{{ dateID($item->tgl_pesan) }}</td>
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
