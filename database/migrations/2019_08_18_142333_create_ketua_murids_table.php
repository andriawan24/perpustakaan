<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKetuaMuridsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ketua_murid', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nis', 30);
            $table->string('nama');
            $table->text('alamat');
            $table->string('no_tlp');
            $table->string('tlp_ortu');
            $table->string('email');
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
        Schema::dropIfExists('ketua_murids');
    }
}
