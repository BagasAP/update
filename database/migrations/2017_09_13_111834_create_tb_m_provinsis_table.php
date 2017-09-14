<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMProvinsisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_m_provinsis', function (Blueprint $table) {
            $table->increments('lokasi_id');
            $table->string('lokasi_kode');
            $table->string('lokasi_nama');
            $table->integer('lokasi_propinsi');
            $table->integer('lokasi_kabupatenkota');
            $table->integer('lokasi_kecamatan');
            $table->integer('lokasi_kelurahan');
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
        Schema::dropIfExists('tb_m_provinsis');
    }
}
