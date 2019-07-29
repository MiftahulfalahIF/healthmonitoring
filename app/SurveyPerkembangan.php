<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyPerkembangan extends Model
{
    protected $table='survey_perkembangan';

    public function pasien()
    {
        return $this->belongsTo('App\Pasien', 'pasien_id');
    }

    public function kontrol()
    {
        return $this->belongsTo('App\Kontrol', 'kontrol_id');
    }
}
