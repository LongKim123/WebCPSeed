<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsFarmer extends Model
{
    protected $table='newsfamer';
    protected $fillable=['name','tittle','description','id_category','image','content'];
    public function hr_category(){
    	return $this->belongsTo(Menu::class,'id_category');

    }
}
