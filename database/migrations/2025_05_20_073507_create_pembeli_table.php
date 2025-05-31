<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembeliTable extends Migration
{
    public function up()
    {
        Schema::create('pembeli', function (Blueprint $table) {
            $table->id(); // Primary key: id (bigint, auto increment)
            $table->string('id_pembeli', 15)->unique(); // tambahkan ini
            $table->string('nama', 100);
            $table->enum('jns_kelamin', ['Laki-laki', 'Perempuan']);
            $table->text('alamat');
            $table->string('kode_pos', 10)->nullable();
            $table->string('kota', 50)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembeli');
    }
}