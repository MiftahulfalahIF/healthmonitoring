<?php

namespace App\Http\Controllers\Perawat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EfekSamping;

class EfekSampingController extends Controller
{
    public function index()
    {
        
        return view('dokter_konsultan.efeksamping.index');
    }






}
