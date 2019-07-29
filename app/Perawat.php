<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Perawat extends Authenticatable
{
    use Notifiable;
    
	protected $table='perawat'; 


	 public function monitoring()
   	 	{
        return $this->hasMany('App\Monitoring');
    }
		

    public function kontrols()
    {
        return $this->hasMany('App\Kontrol');
    }
}
