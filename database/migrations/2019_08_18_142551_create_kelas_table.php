<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama', 50);
            $table->bigInteger('id_walikelas')->unsigned();
            $table->foreign('id_walikelas')->references('id')->on('wali_kelas')->onDelete('cascade');
            $table->bigInteger('id_ketuamurid')->unsigned();
            $table->foreign('id_ketuamurid')->references('id')->on('ketua_murid')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas');
    }
}
