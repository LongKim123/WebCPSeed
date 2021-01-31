<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\SliderAddRequest;
use App\Traits\StorageImageTrait;
class AdminSliderController extends Controller
{
	use StorageImageTrait;
	private $slider;
	public function __construct(Slider $slider){
		$this->slider=$slider;
	}
    public function index(){
    	$slider= $this->slider->latest()->paginate(3);
    	return view('admin.slider.index',compact('slider'));
    }
    public function edit($id){
    	$slider=$this->slider->find($id);
    	return view('admin.slider.edit',compact('slider'));
    }
     public function create(){
    	return view('admin.slider.add');
    }
    public function update(Request $request, $id){
    	try{
    		$dataSliderUpdate=[
    		'name'=>$request->name,
    		'description'=>$request->description];
    		$dataImageSlider=$this->storageTraitUpload($request,'image_path','slider');
    		if(!empty($dataImageSlider)){
    			$dataSliderUpdate['image_name']=$dataImageSlider['file_name'];
    			$dataSliderUpdate['image_path']=$dataImageSlider['file_path'];
    		}
    		$this->slider->find($id)->update($dataSliderUpdate);
    		return redirect()->route('slider.index');

    	}catch(Exception $exception){
    		DB::rollBack();
    		Log::error('Loi'.$exception->getMessage().'Line'.$exception->getLine());

    	}
    }
    public function store(SliderAddRequest $request){
    	try{
    		$dataSlider=[
    		'name'=>$request->name,
    		'description'=>$request->description];
    		$dataImageSlider=$this->storageTraitUpload($request,'image_path','slider');
    		if(!empty($dataImageSlider)){
    			$dataSlider['image_name']=$dataImageSlider['file_name'];
    			$dataSlider['image_path']=$dataImageSlider['file_path'];
    		}
    		$this->slider->create($dataSlider);
    		return redirect()->route('slider.index');

    	}catch(Exception $exception){
    		DB::rollBack();
    		Log::error('Loi'.$exception->getMessage().'Line'.$exception->getLine());

    	}
    	
    }
    public function delete($id){
    	 try{
            $this->slider->find($id)->delete();
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
