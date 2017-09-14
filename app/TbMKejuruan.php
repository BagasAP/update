<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbMKejuruan extends Model
{
    //
         protected $table = 'tb_m_kejuruans';
    protected $fillable =  ['id','kd_kejuruan','nama_kejuruan','keterangan'];
    public $timestamps = true;
   
     
    
    public function tbmsubkejuruan()
	{
		return $this->hasMany('App\TbMSubKejuruan');
	}

	public function tbmprogram()
	{
		return $this->hasMany('App\TbMProgram');
	}
}
