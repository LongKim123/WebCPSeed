<?php

namespace App\Imports;

use App\SliderExcel;
use Maatwebsite\Excel\Concerns\ToModel;

class Imports implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SliderExcel([
            'name'=>$row[0]
            ,'description'=>$row[1]
            ,'image_path'=>$row[2]
            ,'image_name'=>$row[3]
            ,'page_id'=>$row[4]
        ]);
    }
}
