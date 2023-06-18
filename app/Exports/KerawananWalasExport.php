<?php

namespace App\Exports;

use App\Models\JenisKerawanan;
use App\Models\Kerawanan;
use App\Models\Walas;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;


class KerawananWalasExport implements FromView
{
   use Exportable;

   public function view(): View
   {
      $subquery = Kerawanan::where('walas_id', Auth::id())
                ->selectRaw('MIN(id) as id')
                ->groupBy('murid_id');
            
            $data = Kerawanan::whereIn('id', $subquery)
                ->orderBy('id', 'desc')
                ->get();
   $getjenis = JenisKerawanan::all();
   $getkerawanan = Kerawanan::select('murid_id', 'walas_id','gurubk_id','kesimpulan', 'kerawanan_id')->get();

    return view('walas.excel.kerawanan', compact('getjenis','getkerawanan','data','subquery'));
   }
}
