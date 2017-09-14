<?php

use Illuminate\Database\Seeder;

class KejuruanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kejuruan= [
        ['kd_kejuruan'=>'JR001','nama_kejuruan'=>'Teknik Manufaktur','keterangan'=>'Keterangan Teknik Manufaktur'],
        ['kd_kejuruan'=>'JR002','nama_kejuruan'=>'Teknik Otomotif','keterangan'=>'Keterangan Teknik Otomotif'],
        ];
        DB::table('tb_m_kejuruans')->insert($kejuruan);
    }
}
