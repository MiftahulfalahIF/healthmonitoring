<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
     protected $table='monitoring';

     public function dokter_konsultan()
    {
        return $this->belongsTo('App\Dokter', '');
    }
}
