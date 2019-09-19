<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKunjungananggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kunjungan_anggota', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_anggota')->unsigned();
                $table->foreign('id_anggota')->references('id')->on('anggota')->onDelete('cascade')->onUpdate('cascade');
            $table->dateTime('waktu_kunjungan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kunjungan_anggota');
    }
}
