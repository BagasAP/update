<?php

use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $program= [
        ['kd_program'=>'JRS001','nama_program'=>'Pengecoran Logam','kd_sub_kejuruan'=>'JRS001','kd_kejuruan'=>'JR001','jumlah_paket'=>'5','lama_pelatihan'=>'3','asrama'=>'ya'],
        ['kd_program'=>'JRS002','nama_program'=>'Balancing','kd_sub_kejuruan'=>'JRS002','kd_kejuruan'=>'JR002','jumlah_paket'=>'2','lama_pelatihan'=>'1','asrama'=>'ya'],
        ['kd_program'=>'JRS003','nama_program'=>'Teknik kend','kd_sub_kejuruan'=>'JRS002','kd_kejuruan'=>'JR002','jumlah_paket'=>'12','lama_pelatihan'=>'1.5','asrama'=>'tidak'],
        ];
        DB::table('tb_m_programs')->insert($program);
    }
}
