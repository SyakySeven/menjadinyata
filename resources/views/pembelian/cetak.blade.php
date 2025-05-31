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
                <th>ID Pembelian</th>
                <th>Barang</th>
                <th>Suplier</th>
                <th>Qty</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembelian as $item)
            <tr>
                <td>{{ $item->id_pembelian }}</td>
                <td>{{ $item->id_barang }}</td>
                <td>{{ $item->id_suplier }}</td>
                <td>{{ $item->qty }}</td>
                <td>
                    @if($item->barang && $item->barang->foto)
                        <img src="{{ asset('uploads/foto_barang/' . $item->barang->foto) }}"
                        style="width: 100px; height: auto; border-radius: 8px;" />
                    @else
                        No Foto
                    @endif
                </td>
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
