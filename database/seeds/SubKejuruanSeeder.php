<?php

use Illuminate\Database\Seeder;

class SubKejuruanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $subkejuruan= [
        ['kd_sub_kejuruan'=>'JRS001','nama_sub_kejuruan'=>'Pengecoran Logam','kd_kejuruan'=>'JR001','keterangan'=>'Keterangan Pengecoran'],
        ['kd_sub_kejuruan'=>'JRS002','nama_sub_kejuruan'=>'Balancing','kd_kejuruan'=>'JR002','keterangan'=>'Keterangan Balancing'],
        ['kd_sub_kejuruan'=>'JRS003','nama_sub_kejuruan'=>'Teknik kend','kd_kejuruan'=>'JR002','keterangan'=>'Keterangan Teknik Kend'],
        ];
        DB::table('tb_m_sub_kejuruans')->insert($subkejuruan);
    }
}
