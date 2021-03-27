<?php

namespace App\Exports;

use App\SliderExcel;
use Maatwebsite\Excel\Concerns\FromCollection;

class Exports implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SliderExcel::all();
    }
}
