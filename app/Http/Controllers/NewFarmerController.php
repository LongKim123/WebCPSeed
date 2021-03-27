<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Storage;
use App\NewsFarmer;
use App\Menu;
use App\Components\Recusive;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Log;
use App\Traits\StorageImageTrait;

class NewFarmerController extends Controller
{
	use StorageImageTrait;
	private $menu;
	private $news;
	
	public function __construct(NewsFarmer $news,Menu $menu){
		$this->news=$news;
		$this->menu=$menu;
	}
    public function create(){
    	$htmlOption=$this->getCate($parentId='');
    	return view('admin.news_farmer.add',compact('htmlOption'));
    }
     public function index(){
     	$news= $this->news->latest()->paginate(3);
    	return view('admin.news_farmer.index',compact('news'));
    }
    public function store(Request $request){
    	$dataNewCreate=[
    		
    		'tittle'=>$request->tittle,
    		'description'=>$request->description,
    		'content'=>$request->content,
    		'name'=>Str::slug($request->tittle,'-'),
    		'id_category'=>$request->category_id];

    		$dataImageNews=$this->storageTraitUpload($request,'image','news_farmer');
    		if(!empty($dataImageNews)){
    			$dataNewCreate['image']=$dataImageNews['file_path'];
    		}

    		$this->news->create($dataNewCreate);
    		return redirect()->route('news_farmer.index');

    }

      public function getCate($parentId){
        $data= $this->menu->all();
        $recusive=new Recusive($data);
        
        $htmlOption= $recusive->categoryRecusive($parentId);
        return $htmlOption;

    }
    public function edit($id){
    	$news=$this->news->find($id);
    	$htmlOption=$this->getCate($parentId='');
    	return view('admin.news_farmer.edit',compact('htmlOption','news'));
    }
     public function update(Request $request,$id){
       	$dataNewCreate=[
    		'tittle'=>$request->tittle,
    		'description'=>$request->description,
    		'content'=>$request->content,
    		'name'=>Str::slug($request->tittle,'-'),
    		'id_category'=>$request->category_id];

    		$dataImageNews=$this->storageTraitUpload($request,'image','news_farmer');
    		if(!empty($dataImageNews)){
    			$dataNewCreate['image']=$dataImageNews['file_path'];
    		}
            $this->news->find($id)->update($dataNewCreate);
            return redirect()->route('news_farmer.index');
    }
     public function delete($id){
        try{
            $this->news->find($id)->delete();
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
