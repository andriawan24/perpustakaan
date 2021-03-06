<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama', 50);
            $table->bigInteger('id_kelas')->unsigned();
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
            $table->text('alamat');
            $table->string('no_tlp', 20);
            $table->string('tlp_ortu', 20);
            $table->string('email', 50);
            $table->string('password');
            $table->integer("jumlah_kunjungan")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota');
    }
}
