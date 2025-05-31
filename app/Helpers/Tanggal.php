<?php
function dateID($tanggal = null)
{
    $tanggal = $tanggal ?? date('Y-m-d');
    if(empty($tanggal) || $tanggal == '0000-00-00') {
        return '-';
    }

    $bulan = array(
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    $pecahkan = explode('-', $tanggal);
    if (count($pecahkan) == 3) {
        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }
    return $tanggal;
}

?>