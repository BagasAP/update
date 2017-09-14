<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_m_peserta extends Model
{
    //
    protected $table = 'tb_m_pesertas';

    public $timestamps = true;
    
    public function program()
	{
		return $this->belongsTo('App\tb_m_program','no_daftar');
	}
}
