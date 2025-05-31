<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mpembelian extends Model
{
    use HasFactory;
    protected $table = 'pembelian';
    protected $fillable = [
        'id_pembelian',
        'id_barang',
        'id_suplier',
        'qty',
        'tgl',
    ];

    public function barang()
    {
        return $this->belongsTo(Mbarang::class, 'id_barang', 'id_barang');
    }

    public function suplier()
    {
        return $this->belongsTo(Msuplier::class, 'id_suplier', 'id_suplier');
    }
}
