<?php

namespace App\Exports;

use App\Models\Walas;
use App\Models\kelas;
use App\Models\murid;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class MuridExport implements FromView {
    use Exportable;

   public function view(): View
   {
    $murid = murid::all();
    return view('admin.excel.murid', compact('murid'));
   }
}
