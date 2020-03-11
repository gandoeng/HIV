<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Alert;


class verificationController extends Controller
{
    //membuka halaman web
    public function openWeb(Request $request){

        $cekLogin = $request->session()->get('login');

        if($cekLogin == 'masuk'){

            $idPasien = $request->session()->get('pasien');
            $hasil = DB::table('hasil')->where('idPasien','=',$idPasien)->get();
            $penyakit = DB::table('penyakit')->get();

            return view('verification')->with('hasil',$hasil)->with('penyakit',$penyakit);

        } else {

            return redirect('/');

        }
    }

    //mengelola verifikasi
    public function proses(Request $request){
    	$idPasien = $request->session()->get('pasien');
    	$jenisPenyakit = $request->input('inputJenisPenyakit');
    	$statusHIV = $request->input('statusHIV');
    	$fileBukti = $request->file('fileBukti');
    	$namaFile = $fileBukti->getClientOriginalName();

    	$fileBukti->move('fileBukti',$namaFile);

        DB::table('hasil')->where('idPasien','=',$idPasien)->update(['idPenyakit' => $jenisPenyakit,'ketStatus' => $statusHIV, 'lab'=>$namaFile]);


        return redirect('verification');
    }


}
