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
Route::post('/login', 'AdminController@postloginAdmin');
Route::get('/logout', 'AdminController@logout');
        
Route::get('home', function () {
    return view('home');
});
				


Route::prefix('admin')->group(function () {
	Route::prefix('categories')->group(function () {
    Route::get('/create',[	
    	'as'=>'categories.create',
    	'uses'=>'CategoryController@create',
      'middleware'=>'can:category-add'
      ]);
     Route::get('/',[	
    	'as'=>'categories.index',
    	'uses'=>'CategoryController@index',
      'middleware'=>'can:category-list']);
      Route::post('/store',[	
    	'as'=>'categories.store',
    	'uses'=>'CategoryController@store'
      ]);
       Route::get('/edit/{id}',[	
    	'as'=>'categories.edit',
    	'uses'=>'CategoryController@edit',
      'middleware'=>'can:category-edit'
    ]);
        Route::get('/delete/{id}',[	
    	'as'=>'categories.delete',
    	'uses'=>'CategoryController@delete',
      'middleware'=>'can:category-delete']);
    	Route::post('/update/{id}',[	
    	'as'=>'categories.update',
    	'uses'=>'CategoryController@update'
      ]);
});


  Route::prefix('categories_hr')->group(function () {
    Route::get('/create',[  
      'as'=>'categories_hr.create',
      'uses'=>'CategoryHrControlller@create',
        'middleware'=>'can:category_hr-add'
      
      ]);
    Route::get('/',[  
      'as'=>'categories_hr.index',
      'uses'=>'CategoryHrControlller@index',
      'middleware'=>'can:category_hr-list'
      ]);
    Route::post('/store',[  
      'as'=>'categories_hr.store',
      'uses'=>'CategoryHrControlller@store'
      ]);
     Route::get('/delete/{id}',[  
      'as'=>'categories_hr.delete',
      'uses'=>'CategoryHrControlller@delete',
      'middleware'=>'can:category_hr-delete'
      ]);
      Route::get('/edit/{id}',[ 
      'as'=>'categories_hr.edit',
      'uses'=>'CategoryHrControlller@edit',
      'middleware'=>'can:category_hr-edit'
      
    ]);
    Route::post('/update/{id}',[  
      'as'=>'categories_hr.update',
      'uses'=>'CategoryHrControlller@update',
     ]);
      
     
});
Route::prefix('menus')->group(function () {
    Route::get('/',[	
    	'as'=>'menus.index',
    	'uses'=>'MenuController@index',
      'middleware'=>'can:menu-list']);
     Route::get('/create',[	
    	'as'=>'menus.create',
    	'uses'=>'MenuController@create',
      'middleware'=>'can:menu-add']);
      Route::post('/store',[	
    	'as'=>'menus.store',
    	'uses'=>'MenuController@store']);
      Route::get('/edit/{id}',[	
    	'as'=>'menus.edit',
    	'uses'=>'MenuController@edit',
      'middleware'=>'can:menu-edit']);
        Route::get('/delete/{id}',[	
    	'as'=>'menus.delete',
    	'uses'=>'MenuController@delete',
       'middleware'=>'can:menu-delete']);
    	Route::post('/update/{id}',[	
    	'as'=>'menus.update',
    	'uses'=>'MenuController@update',
     ]);
    
});
Route::prefix('orders')->group(function () {
    Route::get('/',[  
      'as'=>'orders.index',
      'uses'=>'OrderController@index'
     ]);
     Route::get('/details/{id}',[ 
      'as'=>'order.details',
      'uses'=>'OrderController@detail'
     ]);
     
    
});

Route::prefix('brands')->group(function () {
    Route::get('/',[  
      'as'=>'brands.index',
      'uses'=>'BrandsController@index']);
     Route::get('/create',[ 
      'as'=>'brands.create',
      'uses'=>'BrandsController@create']);
      Route::post('/store',[  
      'as'=>'brands.store',
      'uses'=>'BrandsController@store']);
      Route::get('/edit/{id}',[ 
      'as'=>'brands.edit',
      'uses'=>'BrandsController@edit'
      ]);
        Route::get('/delete/{id}',[ 
      'as'=>'brands.delete',
      'uses'=>'BrandsController@delete']);
      Route::post('/update/{id}',[  
      'as'=>'brands.update',
      'uses'=>'BrandsController@update',
     ]);
    
});
Route::prefix('customers')->group(function () {
    Route::get('/',[  
      'as'=>'customers.index',
      'uses'=>'CustomerController@index']);
     
    
});

Route::prefix('hr')->group(function () {
    
     Route::get('/',[ 
      'as'=>'hr.index',
      'uses'=>'HRController@index',
      'middleware'=>'can:hr-list']);
      Route::get('/create',[  
      'as'=>'hr.create',
      'uses'=>'HRController@create',
      'middleware'=>'can:hr-add']);
      Route::post('/store',[  
      'as'=>'hr.store',
      'uses'=>'HRController@store']);
      Route::get('/edit/{id}',[ 
        'as'=>'hr.edit',
        'uses'=>'HRController@edit',
        'middleware'=>'can:hr-edit'
        ]);
       Route::post('/update/{id}',[ 
        'as'=>'hr.update',
        'uses'=>'HRController@update']);
       Route::get('/delete/{id}',[ 
        'as'=>'hr.delete',
        'uses'=>'HRController@delete',
        'middleware'=>'can:hr-delete'
        ]);
      
});


Route::prefix('product')->group(function () {
    
     Route::get('/',[	
    	'as'=>'product.index',
    	'uses'=>'ProductController@index',
      'middleware'=>'can:product-list']);
      Route::get('/create',[	
    	'as'=>'product.create',
    	'uses'=>'ProductController@create',
      'middleware'=>'can:product-add']);
      Route::post('/store',[	
    	'as'=>'product.store',
    	'uses'=>'ProductController@store']);
      Route::get('/edit/{id}',[ 
        'as'=>'product.edit',
        'uses'=>'ProductController@edit',
        'middleware'=>'can:product-edit']);
       Route::post('/update/{id}',[ 
        'as'=>'product.update',
        'uses'=>'ProductController@update']);
       Route::get('/delete/{id}',[ 
        'as'=>'product.delete',
        'uses'=>'ProductController@delete',
        'middleware'=>'can:product-delete']);
      
});
Route::prefix('slider')->group(function () {
    
     Route::get('/',[   
        'as'=>'slider.index',
        'uses'=>'AdminSliderController@index',
        'middleware'=>'can:slider-list']);
       Route::get('/create',[   
        'as'=>'slider.create',
        'uses'=>'AdminSliderController@create',
        'middleware'=>'can:slider-add']);
        Route::post('/store',[   
        'as'=>'slider.store',
        'uses'=>'AdminSliderController@store']);
        Route::get('/edit/{id}',[   
        'as'=>'slider.edit',
        'uses'=>'AdminSliderController@edit',
        'middleware'=>'can:slider-edit']);
      Route::post('/update/{id}',[   
        'as'=>'slider.update',
        'uses'=>'AdminSliderController@update']);
       Route::get('/delete/{id}',[ 
        'as'=>'slider.delete',
        'uses'=>'AdminSliderController@delete',
        'middleware'=>'can:slider-delete']);
      
});
Route::prefix('settings')->group(function () {
    
     Route::get('/',[   
        'as'=>'settings.index',
        'uses'=>'AdminSettingController@index',
        'middleware'=>'can:setting-list']);
      Route::get('/create',[   
        'as'=>'settings.create',
        'uses'=>'AdminSettingController@create',
        'middleware'=>'can:setting-add']);
       Route::post('/store',[   
        'as'=>'settings.store',
        'uses'=>'AdminSettingController@store']);
       Route::get('/edit/{id}',[   
        'as'=>'settings.edit',
        'uses'=>'AdminSettingController@edit',
        'middleware'=>'can:setting-edit']);
      Route::post('/update/{id}',[   
        'as'=>'settings.update',
        'uses'=>'AdminSettingController@update']);
      Route::get('/delete/{id}',[   
        'as'=>'settings.delete',
        'uses'=>'AdminSettingController@delete',
        'middleware'=>'can:setting-delete']);
      
});
Route::prefix('users')->group(function () {
    
     Route::get('/',[   
        'as'=>'users.index',
        'uses'=>'AdminUserController@index',
        'middleware'=>'can:user-list']);
      Route::get('/create',[   
        'as'=>'users.create',
        'uses'=>'AdminUserController@create',
        'middleware'=>'can:user-add']);
       Route::post('/store',[   
        'as'=>'users.store',
        'uses'=>'AdminUserController@store']);
         Route::get('/edit/{id}',[   
        'as'=>'users.edit',
        'uses'=>'AdminUserController@edit',
        'middleware'=>'can:user-edit']);
        Route::post('/update/{id}',[   
        'as'=>'users.update',
        'uses'=>'AdminUserController@update']);
         Route::get('/delete/{id}',[   
        'as'=>'users.delete',
        'uses'=>'AdminUserController@delete',
        'middleware'=>'can:user-delete']);
});

Route::prefix('roles')->group(function () {
    
     Route::get('/',[   
        'as'=>'roles.index',
        'uses'=>'AdminRoleController@index',
         'middleware'=>'can:role-list']);
     Route::get('/create',[   
        'as'=>'roles.create',
        'uses'=>'AdminRoleController@create',
         'middleware'=>'can:role-add']);
     Route::post('/store',[   
        'as'=>'roles.store',
        'uses'=>'AdminRoleController@store']);
     Route::get('/edit/{id}',[   
        'as'=>'roles.edit',
        'uses'=>'AdminRoleController@edit',
         'middleware'=>'can:role-edit']);
     Route::post('/update/{id}',[   
        'as'=>'roles.update',
        'uses'=>'AdminRoleController@update']);
     Route::get('/delete/{id}',[   
        'as'=>'roles.delete',
        'uses'=>'AdminRoleController@delete',
        'middleware'=>'can:role-delete']);
     
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