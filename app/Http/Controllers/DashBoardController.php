<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;
class DashBoardController extends Controller
{
    public function index(){
    	$data=Analytics::fetchMostVisitePages(Period::days(7));
    	dd($data);

    	return view('admin.dashboard.index');
    }
}
