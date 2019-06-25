<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalKonsumsi extends Model
{
    protected $table='jadwal_konsumsi';

    public function kontrolObat()
    {
        return $this->belongsTo('App\KontrolObat', 'kontrol_obat_id');
    }
}
