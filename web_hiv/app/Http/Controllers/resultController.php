<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class resultController extends Controller
{
    //membuka halaman web
    public function openWeb(){
    	return view('result');
    }
}
