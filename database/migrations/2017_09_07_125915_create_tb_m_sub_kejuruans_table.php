<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMSubKejuruansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_m_sub_kejuruans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kd_sub_kejuruan')->unique();
            $table->string('nama_sub_kejuruan');
            $table->string('kd_kejuruan');
            $table->string('keterangan');
            $table->string('create_by')->nullable();
            $table->string('update_by')->nullable();
            $table->datetime('created_dt')->nullable();
            $table->datetime('update_dt')->nullable();
            $table->timestamps();
            $table->foreign('kd_kejuruan')->references('kd_kejuruan')->on('tb_m_kejuruans')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_m_sub_kejuruans');
    }
}
