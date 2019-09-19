<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKunjunganmuridTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kunjungan_murid', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama', 50);
            $table->bigInteger('id_kelas')->unsigned();
                $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('alamat', 200);
            $table->string('no_tlp', 20);
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
        Schema::dropIfExists('kunjungan_murid');
    }
}
