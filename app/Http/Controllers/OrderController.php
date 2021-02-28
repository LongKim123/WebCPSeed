<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Customer;
use App\OrderDetail;


class OrderController extends Controller
{
	private $order;
	private $order_detail;
	private $customer;
	public function __construct(Order $order,Customer $customer,OrderDetail $order_detail){
		$this->order=$order;
		$this->order_detail=$order_detail;
		$this->customer=$customer;
	}
    public function index(){
    	$orders1=$this->order->latest()->paginate(20);
    	return view('admin.order.index',compact('orders1'));

    }
    public function detail($id){
    	$order_detail =$this->order_detail->where('order_id',$id)->get();
    	$order_id=$this->order->find($id);
    	
    	return view('admin.order.detail_orders',compact('order_detail','order_id'));

    }

}
