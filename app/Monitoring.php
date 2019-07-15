<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
     protected $table='monitoring';

     
     public function pasien()
    {
        return $this->belongsTo('App\Pasien', 'pasien_id');
    }

    public function kontrols()
    {
    	return $this->hasMany('App\Kontrol');
    }
}

