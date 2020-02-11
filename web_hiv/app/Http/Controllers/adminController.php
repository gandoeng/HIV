<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    //membuka halaman web
    public function openWeb(){
    	return view('index');
    }

}
