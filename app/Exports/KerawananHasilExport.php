<?php

namespace App\Exports;

use App\Models\Kerawanan;
use App\Models\Konseling;
use App\Models\Walas;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;


class KerawananHasilExport implements FromView
{
   use Exportable;

   public function view(): View
   {
   
      // $addkesimpulan = Kerawanan::where('murid_id', $murid_id)->update(['kesimpulan' => $request->kesimpulan]);
      // $getkonsul = Kerawanan::select('murid_id', 'walas_id','gurubk_id','kesimpulan')->distinct('murid_id')->get();
   //  $getkonsul = Kerawanan::all();
   $loggedInUserId = Auth::id();

   // $getkonsul = Konseling::where('guru_id', $loggedInUserId)->get();
   $getkerawanan = Kerawanan::where('gurubk_id', $loggedInUserId)->get();

   //  dd('getkonsul');
    return view('guru.excel.kerawanan', compact('getkerawanan'));
    
   }
}
