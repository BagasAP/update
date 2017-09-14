<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbMSubKejuruan extends Model
{
    //
    protected $table = 'tb_m_sub_kejuruans';
    protected $fillable =  ['kd_sub_kejuruan','kd_kejuruan','nama_sub_kejuruan','keterangan'];
    public $timestamps = true;
        

    public function tbmkejuruan() {
    	return $this->belongsTo('App\TbMKejuruan');
    }

    public function program()
	{
		return $this->hasMany('App\TbMProgram');
	}
}
