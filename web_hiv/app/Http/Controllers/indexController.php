<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Alert;

class indexController extends Controller
{
    //membuka halaman web
    public function openWeb(Request $request){
        $cekLogin = $request->session()->get('login');

        if($cekLogin == 'masuk'){

            $idPasien = $request->session()->get('pasien');
            $cekTest = DB::table('pasien')->where('idPasien','=',$idPasien)->value('sudahTest');

            if($cekTest == 'B' ){
                return redirect('/test-page');
            } if ($cekTest == 'S' ){
                return redirect('result');
            } else {
                return redirect('/');
            }

        } else {

            return view('index');

        }

    }

    //simpan registrasi
    public function simpanRegister (Request $request){
    	$namaPasien = $request->input('namaPasien');
    	$umur = $request->input('umur');
    	$gender = $request->input('gender');
    	$sandi = $request->input('sandi');
    	$level = 1;
    	$sudahTest = 'B';

    	DB::table('pasien')->insert(
    		['namaPasien'=>$namaPasien, 'umur'=>$umur,'sandi'=>$sandi, 'kelamin'=>$gender,'level'=>$level, 'sudahTest'=>$sudahTest]
    	);


    	return redirect('test-page');
    }

    //login
    public function login (Request $request){
    	$namaPasien = $request->input('namaPasien');
    	$sandi = $request->input('sandi');

    	$cek = DB::table('pasien')->select('sandi')->where('namaPasien','=',$namaPasien)->where('sandi','=',$sandi)->value('sandi');
        
    	if ($cek == NULL){

    		Alert::warning('Login gagal', 'LOGIN');
       		return redirect('/');

    	} else if( $sandi == $cek ){

            $request->session()->put('login','masuk');
            $cekTest = DB::table('pasien')->select('sudahTest')->where('namaPasien','=',$namaPasien)->value('sudahTest');

            //menyimpan id user dalam session
            $idPasien = DB::table('pasien')->where('namaPasien','=',$namaPasien)->where('sandi','=',$sandi)->value('idPasien');
            $request->session()->put('pasien',$idPasien);

            
            if($cekTest == 'B'){

                return redirect('test-page')->with('success', 'Task Created Successfully!');

            } else {

                return redirect('result');

            }

    	} else {

    		Alert::warning('Login gagal', 'LOGIN');
    		return redirect('/');

    	}
    }

    //logout
    public function logout (Request $request){
        $request->session()->put('login','keluar');
        $request->session()->forget('idPasien');

        return redirect('/');
    }
}
