<?php

namespace App\Http\Controllers\DokterKonsultan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MonitoringController extends Controller
{
    public function index()
    {
        return view('dokter_konsultan.monitoring.index');

        
    }


  
}

