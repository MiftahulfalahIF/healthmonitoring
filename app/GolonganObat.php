<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GolonganObat extends Model
{
    protected $table='golongan_obat';

    public function obats()
    {
        return $this->hasMany('App\Obat');
    }
}
