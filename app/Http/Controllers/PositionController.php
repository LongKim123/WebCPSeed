<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;
class PositionController extends Controller
{
    private $position;
	public function __construct(Position $position){
		$this->position=$position;
	}
	public function index(){
		$positions=$this->position->paginate(4);
    	return view('admin.position.index',compact('positions'));
    }
    public function create(){

    	return view('admin.position.add');
    }
    public function store(Request $request)
    {
    	  $this->positions->create([
    		'name'=>$request->name,
    		'description'=>$request->contents
    	]);
    	return redirect()->route('positions.index');

    }
  
}
