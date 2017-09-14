<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMKejuruansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_m_kejuruans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kd_kejuruan')->unique();
            $table->string('nama_kejuruan');
            $table->string('keterangan');
            $table->string('create_by')->nullable();
            $table->string('update_by')->nullable();
            $table->datetime('create_dt')->nullable();
            $table->datetime('update_dt')->nullable();
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
        Schema::dropIfExists('tb_m_kejuruans');
    }
}
