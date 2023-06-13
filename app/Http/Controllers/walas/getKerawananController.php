<?php

namespace App\Http\Controllers\walas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kerawanan;

class getKerawananController extends Controller
{
    public function index($userId)
   {

      $kerawanandetail = Kerawanan::where('murid_id', $userId)->get()
         ->groupBy('kerawanan_id')
         ->map(function ($item) {
            return $item->first();
         })
         ->unique('kerawanan_id')
         ->values();



      return view('walas.walas_detail_kerawanan', compact('kerawanandetail'));
   }
}
