<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\Recusive;
use App\HR_Category;
class CategoryHrControlller extends Controller
{
	private $hr_category;
	
	public function __construct(HR_Category $hr_category){
		
		$this->hr_category=$hr_category;
	}
	public function index(){
		$categories_hr=$this->hr_category->paginate(4);
    	return view('admin.category_hr.index',compact('categories_hr'));
    }
    public function create(){
    	$htmlOption=$this->getCate($parentId='');
    	return view('admin.category_hr.add',compact('htmlOption'));
    }
    public function store(Request $request){
    	$this->hr_category->create([
    		'name'=>$request->name,
    		'parent_id'=>$request->parent_id,
    		'description'=>$request->contents
    	]);
    	return redirect()->route('categories_hr.index');
    }
    public function getCate($parentId){
        $data= $this->hr_category->all();
        $recusive=new Recusive($data);
        
        $htmlOption= $recusive->categoryRecusive($parentId);
        return $htmlOption;

    }
    public function delete($id){
    	  try{
            $this->hr_category->find($id)->delete();
            return response()->json([
                'code'=>200,
                'message'=>'success'],200);
        }
        catch(Exception $exception){
            Log::error('Message'.$exception->getMessage().'Line'.$exception->getLine());
            return response()->json([
                'code'=>500,
                'message'=>'fail'],500);
        }
    }
     public function edit($id){
        $categories_hr=$this->hr_category->find($id);
      $htmlOption=$this->getCate($categories_hr->parent_id);
        return view('admin.category_hr.edit',compact('categories_hr','htmlOption'));
    }

     public function update($id ,Request $request){
        $this->hr_category->find($id)->update([
           'name'=>$request->name,
            'parent_id'=>$request->parent_id,
    		'description'=>$request->contents
        ]);
        return redirect()->route('categories_hr.index');

    }
}
