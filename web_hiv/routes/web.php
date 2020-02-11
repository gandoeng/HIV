<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/test-page','testController@listGejala');

Route::get('/result',function(){
	return view('result');
});

Route::get('/verification',function(){
	return view('verification');
});

Route::get('/admin',function(){
	return view('admin');
});

