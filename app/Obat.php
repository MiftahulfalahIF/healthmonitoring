<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
     protected $table='obat';

    public function golongan()
    {
        return $this->belongsTo('App\GolonganObat');
    }

    public function kategori()
    {
        return $this->belongsTo('App\KategoriObat');
    }
}
