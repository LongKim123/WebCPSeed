<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HR extends Model
{
    protected $guarded=[];
    public function hr_category(){
    	return $this->belongsTo(HR_Category::class,'category_hr_id');

    }
}
