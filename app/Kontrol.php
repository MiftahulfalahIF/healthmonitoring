<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontrol extends Model
{
	protected $table='kontrol';

     public function monitoring()
    {
        return $this->belongsTo('App\Monitoring', 'monitoring_id');
    }
}
