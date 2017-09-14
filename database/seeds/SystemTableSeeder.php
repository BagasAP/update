<?php

use Illuminate\Database\Seeder;
use App\SystemMaster;

class SystemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	SystemMaster::truncate();
			
		SystemMaster::create(
			array( // row #0
				'system_type' => 'USERGROUP',
				'system_code' => '0',
				'system_value_txt' => 'ADMIN',
				'system_value_num' => NULL,
				'created_by' => 'system',
				'updated_by' => 'system',
			)
		);
		
		SystemMaster::create(
			array( // row #1
				'system_type' => 'config_others',
				'system_code' => 'room_types',
				'system_value_txt' => 'Raflesia;Boungvield;Tulip;Lavender;Rose',
				'system_value_num' => NULL,
				'created_by' => 'system',
				'updated_by' => 'system',
			)
		);

		SystemMaster::create(
			array(

				'system_type'		=> 'config_others',
				'system_code'		=> 'doc_type',
				'system_value_txt'	=> 'ISO;APQP',
				'system_value_num'	=> null,
				'created_by'		=> 'system'
			)
		);

    }
}
