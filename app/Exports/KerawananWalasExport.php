<?php

namespace App\Exports;

use App\Models\Kerawanan;
use App\Models\Walas;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;


class KerawananWalasExport implements FromView
{
   use Exportable;

   public function view(): View
   {
   $getkerawanan = Kerawanan::select('murid_id', 'walas_id','gurubk_id','kesimpulan', 'kerawanan_id')->get();

    return view('walas.excel.kerawanan', compact('getkerawanan'));
   }
}
