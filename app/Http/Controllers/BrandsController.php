<?php

namespace App\Http\Controllers;
use App\Brand;
use Illuminate\Support\Str;
use Storage;
use Illuminate\Http\Request;
use App\Traits\StorageImageTrait;
class BrandsController extends Controller
{
	use StorageImageTrait;
	private $brand;
	public function __construct(Brand $brand){
		$this->brand=$brand;
	}

    public function index(){
    	$brands=$this->brand->get();
    	return view('admin.brand.index',compact('brands'));
    }
    public function create(){
    	return view('admin.brand.add');
    }
    public function store(Request $request){
    	$dataBrandCreate=[
    		'name'=>$request->name,
    		'address'=>$request->address,
    		'description'=>$request->contents,
    		];

    		$dataImageBrands=$this->storageTraitUpload($request,'image','brand');
    		if(!empty($dataImageBrands)){
    			$dataBrandCreate['image']=$dataImageBrands['file_path'];
    		}

    		$this->brand->create($dataBrandCreate);
    		return redirect()->route('brands.index');
    }
    public function delete($id){
        try{
            $this->brand->find($id)->delete();
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
    	$brands=$this->brand->find($id);
    	return view('admin.brand.edit',compact('brands'));
    }
    public function update(Request $request,$id){
    	$dataBrandUpdate=[
    		'name'=>$request->name,
    		'address'=>$request->address,
    		'description'=>$request->contents,
    		];

    		$dataImageBrands=$this->storageTraitUpload($request,'image','brand');
    		if(!empty($dataImageBrands)){
    			$dataBrandUpdate['image']=$dataImageBrands['file_path'];
    		}
    	$this->brand->find($id)->update($dataBrandUpdate);
            return redirect()->route('brands.index');
    }
}
