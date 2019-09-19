<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeminjamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjam_kelas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('tanggal');
            $table->bigInteger('id_kelas')->unsigned();
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
            $table->bigInteger('id_buku')->unsigned();
            $table->foreign('id_buku')->references('id')->on('buku')->onDelete('cascade');
            $table->string('ruang');
            $table->string('jam_pelajaran');
            $table->integer('jumlah');
            $table->enum('status', ['pinjam', 'kembali']);
            $table->string('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjam');
    }
}
