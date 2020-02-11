<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class verificationController extends Controller
{
    //membuka halaman web
    public function openWeb(){
    	return view('verification');
    }

}
