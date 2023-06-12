<?php

namespace App\Exports;

use App\Models\Walas;
use Maatwebsite\Excel\Concerns\FromCollection;

class WalasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Walas::all();
    }
}
