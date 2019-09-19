<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeminjamAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjam_anggota', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_anggota')->unsigned();
            $table->foreign('id_anggota')->references('id')->on('anggota')->onDelete('cascade');
            $table->bigInteger('id_buku')->unsigned();
            $table->foreign('id_buku')->references('id')->on('buku')->onDelete('cascade');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->integer('jumlah');
            $table->enum('status', ['pinjam', 'kembali']);
            $table->date('dikembalikan_pada')->nullable();
            $table->integer('denda')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjam_anggota');
    }
}
