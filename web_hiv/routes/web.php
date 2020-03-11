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

//halaman test eksternal
Route::get('/test-page','testController@listEksternal');

//melanjutkan ke test selanjutnya
Route::get('test-page/next','testController@nextPage');

//halaman test keluhan
Route::get('/test-page2','testController@listGejala');

//mengolah data 
Route::post('/test-page2/proses','testController@proses');

//mengelola data verifikasi
Route::post('/verification/proses','verificationController@proses');

//Membuka halaman web
Route::get('/', 'indexController@openWeb');
Route::get('/result','resultController@openWeb');
Route::get('/verification','verificationController@openWeb');
Route::get('/admin','adminController@openWeb');

//admin verifikasi
Route::get('/admin/verifikasi/{id}','adminController@verifikasi');

//memnyimpan register
Route::get('/index/register','indexController@simpanRegister');

//login
Route::get('/index/login','indexController@login');

//logout
Route::get('/logout','indexController@logout');


