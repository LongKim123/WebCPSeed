<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use PHPUnit\Exception;
use Illuminate\Support\Facades\Log;
use DB;
class AdminUserController extends Controller
{
	private $user;
	private $role;
	public function __construct(User $user ,Role $role){
		$this->role= $role;
		$this->user=$user;
	}
    public function index(){
    	$users =$this->user->paginate(4);
    	return view('admin.user.index',compact('users'));
    }
    public function create(){
    	$roles=$this->role->all();
    	return view('admin.user.add',compact('roles'));
    }
    public function store(Request $request){
    	try {

            DB::beginTransaction();

            $user = $this->user->create([

                'name' => $request->name,

                'email' => $request->email,

                'password' => Hash::make($request->password)

            ]);

            $user->roles()->attach($request->role_id);

            DB::commit();

            return redirect()->route('users.index');

        } catch (Exception $exception) {

            DB::rollBack();

            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());

 

        }

    }
    public function edit($id){
    	$roles =$this->role->all();
    	$users= $this->user->find($id);
    	$roleUser= $users->roles;
    	
    	return view('admin.user.edit',compact('roles','users','roleUser'));
    }
    public function update(Request $request,$id){
    	try {

            DB::beginTransaction();

            $this->user->find($id)->update([

                'name' => $request->name,

                'email' => $request->email,

                'password' => Hash::make($request->password)

            ]);
            $user=$this->user->find($id);

            $user->roles()->sync($request->role_id);

            DB::commit();

            return redirect()->route('users.index');

        } catch (Exception $exception) {

            DB::rollBack();

            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());

 

        }

    }
    public function delete($id){
    	try{
            $this->user->find($id)->delete();
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
