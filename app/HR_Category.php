<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HR_Category extends Model
{
     // protected $guarded =[];
     protected $fillable=['name','parent_id','description'];
}
