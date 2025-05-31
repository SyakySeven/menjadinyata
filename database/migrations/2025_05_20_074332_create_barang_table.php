<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id(); // Primary key dengan auto-increment
            $table->string('id_barang', 20)->unique(); // Kolom id_barang unik
            $table->string('nama', 100); // Nama barang
            $table->string('varian', 50)->nullable(); // Varian barang (opsional)
            $table->bigInteger('harga_beli'); // Harga beli barang
            $table->bigInteger('harga_jual'); // Harga jual barang
            $table->string('foto')->nullable(); // Foto barang (opsional)
            $table->timestamps(); // Menambahkan created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('barang'); // Menghapus tabel jika rollback
    }
}