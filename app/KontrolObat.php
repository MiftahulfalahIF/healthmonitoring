<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KontrolObat extends Model
{
    protected $table='kontrol_obat';

    public function kontrol()
    {
        return $this->belongsTo('App\Kontrol', 'kontrol_id');
    }

    public function obat()
    {
        return $this->belongsTo('App\Obat', 'obat_id');
    }

    public function jadwalKonsumsi()
    {
        return $this->hasMany('App\JadwalKonsumsi', 'kontrol_obat_id');
    }
}
