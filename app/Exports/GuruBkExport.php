<?php

namespace App\Exports;

use App\Models\Gurubk;
use Maatwebsite\Excel\Concerns\FromCollection;

class GuruBkExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Gurubk::all();
    }
}
