<?php

namespace App\Exports;

use App\Models\Gurubk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;


class GuruBkExport implements FromView
{
   use Exportable;

   public function view(): View
   {
    $guru = Gurubk::all();
    return view('admin.excel.guru_bk', compact('guru'));
   }
}
