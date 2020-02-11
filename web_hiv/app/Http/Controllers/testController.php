<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;


class testController extends Controller
{
    //list gejala
    public function listGejala (Request $request){

    	$list = DB::table('gejala')->select('namaGejala')->get();
    	return view('test-page')->with('list',$list);
    }
}
