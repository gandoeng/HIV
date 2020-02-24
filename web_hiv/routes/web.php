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

Route::get('/test-page/','testController@listGejala');

//Membuka halaman web
Route::get('/', 'indexController@openWeb');
Route::get('/result','resultController@openWeb');
Route::get('/verification','verificationController@openWeb');
Route::get('/admin','adminController@openWeb');


