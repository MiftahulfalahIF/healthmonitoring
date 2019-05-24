<?php

namespace App\Http\Controllers\DokterKonsultan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Obat;

class ObatController extends Controller
{
    
    public function index()
    {
        $obats = Obat::get();
        return view('dokter_konsultan.obat.index')->with('obats', $obats);
    }

    }
