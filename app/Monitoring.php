<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
     protected $table='monitoring';

     public function dokter_konsultan()
    {
        return $this->belongsTo('App\Dokter', 'dokterkonsultan_id');
    }

     public function pasien()
    {
        return $this->belongsTo('App\Pasien', 'pasien_id');
    }
}
