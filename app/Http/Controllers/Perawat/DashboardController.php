<?php

namespace App\Http\Controllers\Perawat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
      return view('perawat.index');
    }

    
}
