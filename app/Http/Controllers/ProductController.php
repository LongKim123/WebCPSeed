<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductAddRequest;
use App\Category;
use App\Products;
use App\Tag;

use App\ProductTag;
use App\ProductImage;
use App\Components\Recusive;
use Illuminate\Support\Str;
use Storage;
use App\Traits\StorageImageTrait;
use App\Brand;
use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;

class ProductController extends Controller
{	
	use StorageImageTrait;
	private $category;
	private $product;
	private $productImage;
	private $tag;
	private $productTag;
    private $brand;
	public function __construct(Brand $brand,Category $category,Products $product,ProductImage $productImage,
		Tag $tag,ProductTag $productTag){
		$this->category=$category;
		$this->product=$product;
		$this->productImage=$productImage;
		$this->tag=$tag;
		$this->productTag=$productTag;
        $this->brand=$brand;

	}
    public function index(){
    	$productList=$this->product->get();
    	return view('admin.product.index',compact('productList'));
    }
    public function create(){
        $brands=$this->brand->get();
    	$htmlOption=$this->getCate($parentId='');
    	return view('admin.product.add',compact('htmlOption','brands'));
    }
    public function getCate($parentId){
    	$data= $this->category->all();
    	$recusive=new Recusive($data);
    	
    	$htmlOption= $recusive->categoryRecusive($parentId);
    	return $htmlOption;
    }
    public function store(ProductAddRequest $request){
    	try{
    		DB::beginTransaction();
    		$dataProductCreate=[
    		'name'=>$request->name,
    		'price'=>$request->price,
    		'content'=>$request->contents,
    		'user_id'=>auth()->id(),
    		'category_id'=>$request->category_id,
            'brand_id'=>$request->brand_id,
            'slug'=>Str::slug($request->name,'-')];
    	$dataUploadFeatureImage=$this->storageTraitUpload($request,'feature_image_path','product');
    	
    	if(!empty($dataUploadFeatureImage)){
    		$dataProductCreate['feature_image_name']=$dataUploadFeatureImage['file_name'];
    		$dataProductCreate['feature_image_path']=$dataUploadFeatureImage['file_path'];
    	 	
    	}
    	$product=$this->product->create($dataProductCreate);
    	if($request->hasFile('image_path')){
    		foreach($request->image_path as $fileItem){
    			$dataProductImageDetail=$this->storageTraitUploadMultiple($fileItem,'product');
    			$product->images()->create([
    				'image_path'=>$dataProductImageDetail['file_path'],
    				'image_name'=>$dataProductImageDetail['file_name']]);
    			
    			

    		}

    	 
   		 }
   		 //insert tags cho product
   		 if(!empty($request->tags)){
   		 	foreach($request->tags as $tagItem) {
   		 	$tagInstanse=$this->tag->firstOrCreate(['name'=>$tagItem]);
   		 	$tagIds[]=$tagInstanse->id;
   		 	
   		 	}
   		 }
   		 
   		 $product->tags()->attach($tagIds);
   		 DB::commit();
 		return redirect()->route('product.index');


    	}catch(Exception $exception){
    		DB::rollBack();
    		Log::error('Message'.$exception->getMessage().'Line'.$exception->getLine());

    	}
    	

   		
    }
    public function edit($id){
        $brands=$this->brand->get();
    	$product=$this->product->find($id);
        $brand1=$this->brand->find($product->brand_id);
    	$htmlOption=$this->getCate($product->category_id);
    	return view('admin.product.edit',compact('product','htmlOption','brands','brand1'));
    }
    public function update(Request $request,$id){
    	try{
    		DB::beginTransaction();
    		$dataProductUpdate=[
    		'name'=>$request->name,
    		'price'=>$request->price,
    		'content'=>$request->contents,
    		'user_id'=>auth()->id(),
    		'category_id'=>$request->category_id,
            'brand_id'=>$request->brand_id,
             'slug'=>Str::slug($request->name,'-')
            ];
    	$dataUploadFeatureImage=$this->storageTraitUpload($request,'feature_image_path','product');
    	
    	if(!empty($dataUploadFeatureImage)){
    		$dataProductUpdate['feature_image_name']=$dataUploadFeatureImage['file_name'];
    		$dataProductUpdate['feature_image_path']=$dataUploadFeatureImage['file_path'];
    	 	
    	}
    	$this->product->find($id)->update($dataProductUpdate);
    	$product=$this->product->find($id);
    	if($request->hasFile('image_path')){
    		$this->productImage->where('product_id',$id)->delete();
    		foreach($request->image_path as $fileItem){
    			$dataProductImageDetail=$this->storageTraitUploadMultiple($fileItem,'product');
    			$product->images()->create([
    				'image_path'=>$dataProductImageDetail['file_path'],
    				'image_name'=>$dataProductImageDetail['file_name']]);
    			
    			

    		}

    	 
   		 }
   		 //insert tags cho product
   		 if(!empty($request->tags)){
   		 	foreach($request->tags as $tagItem) {
   		 	$tagInstanse=$this->tag->firstOrCreate(['name'=>$tagItem]);
   		 	$tagIds[]=$tagInstanse->id;
   		 	
   		 	}
   		 }
   		 
   		 $product->tags()->sync($tagIds);
   		 DB::commit();
 		return redirect()->route('product.index');


    	}catch(Exception $exception){
    		DB::rollBack();
    		Log::error('Message'.$exception->getMessage().'Line'.$exception->getLine());

    	}
    	


    }
    public function delete($id){
    	try{
    		$this->product->find($id)->delete();
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
