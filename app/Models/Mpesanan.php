<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mpesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanan';
    protected $fillable = [
        'id_pesanan',
        'id_barang',
        'id_pelanggan',

        'qty',
        'tgl_pesan',
    ];

    public function pembeli()
    {
        return $this->belongsTo(Mpembeli::class, 'id_pelanggan', 'id_pembeli');
    }

    public function barang()
    {
        return $this->belongsTo(Mbarang::class, 'id_barang', 'id_barang');
    }
}
