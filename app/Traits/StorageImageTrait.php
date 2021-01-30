<?php
namespace App\Traits;
use Storage;
use Illuminate\Support\Str;
trait StorageImageTrait{
	 public function storageTraitUpload($request,$fieldName,$foderName){

	 	if($request->hasFile($fieldName)){
	 	$file=$request->$fieldName;
    	$filenameOrigin=$file->getClientOriginalName();
    	$fileNameHash=Str::random(20).'.'.$file->getClientOriginalExtension();
    	 $filePath = $request->file($fieldName)->storeAs('public/'.$foderName.'/'.auth()->id(),$fileNameHash);
    	 $path1='app/';
    	 
    	 $dataUploadTrait=[
    	 	'file_name'=>$filenameOrigin,
    	 	'file_path'=>Storage::url($path1. "" .$filePath)];
    	 	return $dataUploadTrait;
	 	}
	 	return null;
	 	

	 }
     public function storageTraitUploadMultiple($file,$foderName){

       
        
        $filenameOrigin=$file->getClientOriginalName();
        $fileNameHash=Str::random(20).'.'.$file->getClientOriginalExtension();
         $filePath = $file->storeAs('public/'.$foderName.'/'.auth()->id(),$fileNameHash);
         $path1='app/';
         
         $dataUploadTrait=[
            'file_name'=>$filenameOrigin,
            'file_path'=>Storage::url($path1. "" .$filePath)];
            return $dataUploadTrait;
        
       
        

     }
}