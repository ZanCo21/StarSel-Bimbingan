<?php

namespace App\Exports;

use App\Models\Walas;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class WalasExport implements FromView {
    use Exportable;

   public function view(): View
   {
    $walas = walas::all();
    return view('admin.excel.walas', compact('walas'));
   }
}
