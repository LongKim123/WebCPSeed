<?php
namespace App\Components;
use App\HR_Category;
class Position {
	private $html;
	public function __construct(){
		$this->html='';
	}
	public function menuRecusiveAdd($parentMenuEdit,$parent_id=0,$subMark=''){
		$data=HR_Category::where('parent_id',$parent_id)->get();
		foreach($data as $dataItem){
			if($parentMenuEdit == $dataItem->id){
				$this->html	.=	"<option selected  value='". $dataItem['id']. "'>". $subMark.$dataItem->name."<option>";

			}else{
				$this->html	.=	"<option  value='". $dataItem['id']. "'>". $subMark.$dataItem->name."<option>";

			}
			
			$this->menuRecusiveAdd($parentMenuEdit,$dataItem->id,$subMark.'--');
		}
		return $this->html;
	}

}