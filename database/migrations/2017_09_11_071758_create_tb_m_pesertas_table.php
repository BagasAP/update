<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMPesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_m_pesertas', function (Blueprint $table) {
            $table->increments('no_daftar')->unique();
            $table->datetime('tgl_daftar');
            $table->string('kd_program');
            $table->string('kd_kejuruan');
            $table->string('kd_sub_kejuruan');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->integer('tinggi_badan');
            $table->integer('berat_badan');
            $table->string('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('provinsi');
            $table->string('kab');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('telp');
            $table->string('agama');
            $table->string('pendidikan_terakhir');
            $table->string('pelatihan');
            $table->string('kewarganegaraan');
            $table->integer('anak_ke');
            $table->string('status');
            $table->string('nama_pasangan');
            $table->string('nama_anak');
            $table->string('pengalaman_kerja');
            $table->string('nama_ortuwali');
            $table->string('alamat_ortuwali');
            $table->string('telp_ortuwali');
            $table->string('foto')->nullable();
            $table->string('create_by')->nullable();
            $table->string('update_by')->nullable();
            $table->datetime('created_dt')->nullable();
            $table->datetime('update_dt')->nullable();
            $table->timestamps();
            $table->foreign('kd_program')->references('kd_program')->on('tb_m_programs')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kd_kejuruan')->references('kd_kejuruan')->on('tb_m_kejuruans')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kd_sub_kejuruan')->references('kd_sub_kejuruan')->on('tb_m_sub_kejuruans')
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
        Schema::dropIfExists('tb_m_pesertas');
    }
}
