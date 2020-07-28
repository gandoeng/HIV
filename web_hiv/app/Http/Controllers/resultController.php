<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Alert;

class resultController extends Controller
{
    //membuka halaman web
    public function openWeb(Request $request){

    	$cekLogin = $request->session()->get('login');

        if($cekLogin == 'masuk'){

            $idPasien = $request->session()->get('pasien');
    		$jenisPenyakit = DB::table('hasil')->join('penyakit','penyakit.idPenyakit','=','hasil.idPenyakit')->where('idPasien','=',$idPasien)->get();

            $BFS = DB::table('dataBFS')->join('penyakit','penyakit.idPenyakit','=','dataBFS.idPenyakit')->where('idPasien','=',$idPasien)->get();

       		return view('result')->with('jenisPenyakit',$jenisPenyakit)->with('BFS',$BFS);

        } else {

            return redirect('/');

        }
   	}
}
