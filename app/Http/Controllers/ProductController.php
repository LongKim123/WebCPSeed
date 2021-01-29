<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Components\Recusive;

class ProductController extends Controller
{
	private $category;
	public function __construct(Category $category){
		$this->category=$category;


	}
    public function index(){
    	return view('admin.product.index');
    }
    public function create(){
    	$htmlOption=$this->getCate($parentId='');
    	return view('admin.product.add',compact('htmlOption'));
    }
    public function getCate($parentId){
    	$data= $this->category->all();
    	$recusive=new Recusive($data);
    	
    	$htmlOption= $recusive->categoryRecusive($parentId);
    	return $htmlOption;
    }
}
