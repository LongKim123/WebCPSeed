<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great<!--[if lte IE 8]><script>(function(){var e="abbr,article,aside,audio,canvas,datalist,details,figure,footer,header,hgroup,mark,menu,meter,nav,output,progress,section,time,video".split(','),i=e.length;while(i--){document.createElement(e[i]);}}());</script><![endif]--> xxaaaaaaaa
|
*/
Route::get('/', 'AdminController@loginAdmin');
Route::post('/', 'AdminController@postloginAdmin');
					
Route::get('/home', function () {
    return view('home');
});
				


Route::prefix('admin')->group(function () {
	Route::prefix('categories')->group(function () {
    Route::get('/create',[	
    	'as'=>'categories.create',
    	'uses'=>'CategoryController@create']);
     Route::get('/',[	
    	'as'=>'categories.index',
    	'uses'=>'CategoryController@index']);
      Route::post('/store',[	
    	'as'=>'categories.store',
    	'uses'=>'CategoryController@store']);
       Route::get('/edit/{id}',[	
    	'as'=>'categories.edit',
    	'uses'=>'CategoryController@edit']);
        Route::get('/delete/{id}',[	
    	'as'=>'categories.delete',
    	'uses'=>'CategoryController@delete']);
    	Route::post('/update/{id}',[	
    	'as'=>'categories.update',
    	'uses'=>'CategoryController@update']);
});

Route::prefix('menus')->group(function () {
    Route::get('/',[	
    	'as'=>'menus.index',
    	'uses'=>'MenuController@index']);
     Route::get('/create',[	
    	'as'=>'menus.create',
    	'uses'=>'MenuController@create']);
      Route::post('/store',[	
    	'as'=>'menus.store',
    	'uses'=>'MenuController@store']);
      Route::get('/edit/{id}',[	
    	'as'=>'menus.edit',
    	'uses'=>'MenuController@edit']);
        Route::get('/delete/{id}',[	
    	'as'=>'menus.delete',
    	'uses'=>'MenuController@delete']);
    	Route::post('/update/{id}',[	
    	'as'=>'menus.update',
    	'uses'=>'MenuController@update']);
    
});
Route::prefix('product')->group(function () {
    
     Route::get('/',[	
    	'as'=>'product.index',
    	'uses'=>'ProductController@index']);
      Route::get('/create',[	
    	'as'=>'product.create',
    	'uses'=>'ProductController@create']);
      
});
 
      


   
});