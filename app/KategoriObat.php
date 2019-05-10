<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriObat extends Model
{
    protected $table='kategori_obat';
    
    public function obats()
    {
        return $this->hasMany('App\Obat');
    }
}
