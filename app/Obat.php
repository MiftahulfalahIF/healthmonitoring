<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table='obat';

    public function kontrolObat()
    {
        return $this->belongsTo('App\KontrolObat');
    }
}
