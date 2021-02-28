<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function index(){
    	$customers=Customer::latest()->paginate(10);
    	return view('admin.customer.index',compact('customers'));
    }
}
