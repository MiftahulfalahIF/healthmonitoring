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

    public function kontrolObat()
    {
        return $this->hasMany('App\KontrolObat', 'kontrol_id');
    }

    public function dokter()
    {
        return $this->belongsTo('App\Dokter', 'dokter_id');
    }
    public function perawat()
    {
        return $this->belongsTo('App\Perawat', 'perawat_id');
    }

    public function pasien()
    {
        return $this->belongsTo('App\Pasien', 'pasien_id');
    }
}
