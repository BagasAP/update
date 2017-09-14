<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemMaster extends Model
{
    public function scopeSystem($query, $type)
    {
    	return $query->select('system_code as id', 'system_value_txt as text')
    				->where('system_type', $type)
    				->get();
    }

    public function scopeConfig($query, $type, $code)
    {

    	$config = $query->select('system_value_txt')
    					->where('system_type', $type)
    					->where('system_code', $code)
    					->first();


        if (!empty($config)) {

            $data_result = [];

            $data_config = explode(';', $config->system_value_txt);

            

            foreach ($data_config as $data) {

                $data_result[] = ['id' => $data, 'text' => $data];

            }

        }

        else {

            $data_result = [['id' => '', 'text' => '']];

        }

    	return $data_result;

    }

    public function scopeConfigPeriodic($query, $periodic)
    {
        $config = $query->select('system_value_txt')
                        ->where('system_code', $periodic)
                        ->where('system_type', 'config_periodic')
                        ->first();

        $array = explode(';', $config->system_value_txt);
        $array_3 = [];

        foreach ($array as $data_array) {
            $array_2 = explode(',', $data_array);
            $array_3[] = ['id' => $array_2[0], 'text' => $array_2[1]];
        }

        return $array_3;

    }

}
