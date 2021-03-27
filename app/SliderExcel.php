<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SliderExcel extends Model
{
	protected $table='sliders';
    protected $fillable=['name','description','image_path','image_name','page_id'];
    

}
