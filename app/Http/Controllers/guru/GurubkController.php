<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GurubkController extends Controller
{
   public function index()
   {
    return view('guru.guru_konsultasi');
   }

   
}
