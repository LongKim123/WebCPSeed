<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Components\MenuRecusive;
use App\Menu;
use Illuminate\Support\Str;

class MenuController extends Controller
{
	private $menuRecusive;
	private $menu;
	public function __construct(MenuRecusive $menuRecusive,Menu $menu){
		$this->menuRecusive=$menuRecusive;
		$this->menu=$menu;

	}
    public function index(){
        $menus=$this->menu->paginate(4);
    	return view('admin.menus.index',compact('menus'));
    }
    public function create(){
    	$optionSelect=$this->menuRecusive->menuRecusiveAdd($menuIdEdit='');
    	
    	return view('admin.menus.add',compact('optionSelect'));
    }
    public function store(Request $request){
    	$this->menu->create([
    		'name'=>$request->name,
    		'parent_id'=>$request->parent_id,
            'slug'=>Str::slug($request->name,'-')

    	]);
    	return redirect()->route('menus.index');

    }
    public function edit($id){
        $menuIdEdit=$this->menu->find($id);
        $optionSelect=$this->menuRecusive->menuRecusiveAdd($menuIdEdit->parent_id);
        return view('admin.menus.edit',compact('menuIdEdit','optionSelect'));
    }
    public function update($id ,Request $request){
        $this->menu->find($id)->update([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id,
            'slug'=>Str::slug($request->name,'-')
        ]);
        return redirect()->route('menus.index');

    }
    public function delete($id){
       
        
        try{
            $this->menu->find($id)->delete();
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
