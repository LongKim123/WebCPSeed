<?php

namespace App\Http\Controllers;
use App\Http\Requests\AddRequestSetting;
use Illuminate\Http\Request;
use App\Setting;
use DB;
use Illuminate\Support\Facades\Log;
class AdminSettingController extends Controller
{
	private $setting;
	public function __construct(Setting $setting){
		$this->setting =$setting;
	}
    public function index(){
    	$setting =$this->setting->latest()->paginate(3);
    	return view('admin.setting.index',compact('setting'));
    }
    public function create(){
    	return view('admin.setting.add');
    }
    public function store(AddRequestSetting $request){
    	$this->setting->create([
    		'config_key'=>$request->config_key,
    		'config_value'=>$request->config_name,
    		'type'=>$request->type]);
    	return redirect()->route('settings.index');

    }
    public function edit($id){
    	$setting= $this->setting->find($id);
    	return view('admin.setting.edit',compact('setting'));
    }
    public function update(AddRequestSetting $request,$id){
    	$this->setting->find($id)->update([
    		'config_key'=>$request->config_key,
    		'config_value'=>$request->config_name,
    	]);
    	return redirect()->route('settings.index');
    }
    public function delete($id){
    		 try{
            $this->setting->find($id)->delete();
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
