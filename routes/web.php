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
    	'uses'=>'CategoryController@create',
      ]);
     Route::get('/',[	
    	'as'=>'categories.index',
    	'uses'=>'CategoryController@index',
      'middleware'=>'can:category-list']);
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
      Route::post('/store',[	
    	'as'=>'product.store',
    	'uses'=>'ProductController@store']);
      Route::get('/edit/{id}',[ 
        'as'=>'product.edit',
        'uses'=>'ProductController@edit']);
       Route::post('/update/{id}',[ 
        'as'=>'product.update',
        'uses'=>'ProductController@update']);
       Route::get('/delete/{id}',[ 
        'as'=>'product.delete',
        'uses'=>'ProductController@delete']);
      
});
Route::prefix('slider')->group(function () {
    
     Route::get('/',[   
        'as'=>'slider.index',
        'uses'=>'AdminSliderController@index']);
       Route::get('/create',[   
        'as'=>'slider.create',
        'uses'=>'AdminSliderController@create']);
        Route::post('/store',[   
        'as'=>'slider.store',
        'uses'=>'AdminSliderController@store']);
        Route::get('/edit/{id}',[   
        'as'=>'slider.edit',
        'uses'=>'AdminSliderController@edit']);
      Route::post('/update/{id}',[   
        'as'=>'slider.update',
        'uses'=>'AdminSliderController@update']);
       Route::get('/delete/{id}',[ 
        'as'=>'slider.delete',
        'uses'=>'AdminSliderController@delete']);
      
});
Route::prefix('settings')->group(function () {
    
     Route::get('/',[   
        'as'=>'settings.index',
        'uses'=>'AdminSettingController@index']);
      Route::get('/create',[   
        'as'=>'settings.create',
        'uses'=>'AdminSettingController@create']);
       Route::post('/store',[   
        'as'=>'settings.store',
        'uses'=>'AdminSettingController@store']);
       Route::get('/edit/{id}',[   
        'as'=>'settings.edit',
        'uses'=>'AdminSettingController@edit']);
      Route::post('/update/{id}',[   
        'as'=>'settings.update',
        'uses'=>'AdminSettingController@update']);
      Route::get('/delete/{id}',[   
        'as'=>'settings.delete',
        'uses'=>'AdminSettingController@delete']);
      
});
Route::prefix('users')->group(function () {
    
     Route::get('/',[   
        'as'=>'users.index',
        'uses'=>'AdminUserController@index']);
      Route::get('/create',[   
        'as'=>'users.create',
        'uses'=>'AdminUserController@create']);
       Route::post('/store',[   
        'as'=>'users.store',
        'uses'=>'AdminUserController@store']);
         Route::get('/edit/{id}',[   
        'as'=>'users.edit',
        'uses'=>'AdminUserController@edit']);
        Route::post('/update/{id}',[   
        'as'=>'users.update',
        'uses'=>'AdminUserController@update']);
         Route::get('/delete/{id}',[   
        'as'=>'users.delete',
        'uses'=>'AdminUserController@delete']);
});

Route::prefix('roles')->group(function () {
    
     Route::get('/',[   
        'as'=>'roles.index',
        'uses'=>'AdminRoleController@index']);
     Route::get('/create',[   
        'as'=>'roles.create',
        'uses'=>'AdminRoleController@create']);
     Route::post('/store',[   
        'as'=>'roles.store',
        'uses'=>'AdminRoleController@store']);
     Route::get('/edit/{id}',[   
        'as'=>'roles.edit',
        'uses'=>'AdminRoleController@edit']);
     Route::post('/update/{id}',[   
        'as'=>'roles.update',
        'uses'=>'AdminRoleController@update']);
     Route::get('/delete/{id}',[   
        'as'=>'roles.delete',
        'uses'=>'AdminRoleController@delete']);
     
});
 Route::prefix('permissions')->group(function () {
    
     
     Route::get('/create',[   
        'as'=>'permissions.create',
        'uses'=>'AdminPermissionController@createPermissions']);
      Route::post('/store',[   
        'as'=>'permissions.store',
        'uses'=>'AdminPermissionController@store']);
     
     
});
      


   
});