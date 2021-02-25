<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HR_Category;
use App\HR;
use App\Components\Recusive;
use Illuminate\Support\Str;
use Storage;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Log;
use App\Traits\StorageImageTrait;
class HRController extends Controller
{

	use StorageImageTrait;
	private $hr_category;
	private $hr;
	
	public function __construct(HR $hr,HR_Category $hr_category){
		$this->hr=$hr;
		$this->hr_category=$hr_category;
	}
    public function index(){
        $hr= $this->hr->latest()->paginate(3);
    	return view('admin.hr.index',compact('hr'));
    }
    public function create(){

    	$htmlOption=$this->getCate($parentId='');
    	return view('admin.hr.add',compact('htmlOption'));
    }
    public function store(Request$request){
    	$dataHRCreate=[
    		'name'=>$request->name,
    		'tittle'=>$request->tittle,
    		'description'=>$request->contents,
    		
    		'category_hr_id'=>$request->category_id];

    		$dataImageHR=$this->storageTraitUpload($request,'image_hr','hr');
    		if(!empty($dataImageHR)){
    			$dataHRCreate['image_hr']=$dataImageHR['file_path'];
    		}

    		$this->hr->create($dataHRCreate);
    		return redirect()->route('hr.index');
    }
    public function getCate($parentId){
        $data= $this->hr_category->all();
        $recusive=new Recusive($data);
        
        $htmlOption= $recusive->categoryRecusive($parentId);
        return $htmlOption;

    }
     public function edit($id){

        $hr=$this->hr->find($id);
        $htmlOption=$this->getCate($hr->category_hr_id);
        return view('admin.hr.edit',compact('hr','htmlOption'));
    }
    public function update(Request $request,$id){
        $dataHRUpdate=[
            'name'=>$request->name,
            'tittle'=>$request->tittle,
            'description'=>$request->contents,
            
            'category_hr_id'=>$request->category_id];

            $dataImageHR=$this->storageTraitUpload($request,'image_hr','hr');
            if(!empty($dataImageHR)){
                $dataHRUpdate['image_hr']=$dataImageHR['file_path'];
            }

            $this->hr->find($id)->update($dataHRUpdate);
            return redirect()->route('hr.index');
    }
     public function delete($id){
        try{
            $this->hr->find($id)->delete();
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
}
