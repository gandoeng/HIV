<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Alert;

class adminController extends Controller
{
    //membuka halaman web
    public function openWeb(Request $request){

    	$cekLogin = $request->session()->get('login');

        if($cekLogin == 'masuk'){

            $idPasien = $request->session()->get('pasien');

    		$hasil = DB::table('hasil')->join('pasien','pasien.idPasien','=','hasil.idPasien')->join('penyakit','penyakit.idPenyakit','=','hasil.idPenyakit')->where('ketStatus','!=','NULL')->where('verifikasi','=','tidak')->get();
    		return view('admin')->with('hasil',$hasil);

        } else {

            return redirect('/');

        }

    }

    public function verifikasi($id){

    	DB::table('hasil')->where('idHasil','=',$id)->update(['verifikasi'=>'ya']);

    	$seks = DB::table('hasil')->where('verifikasi','=','ya')->where('ketStatus','=','positive')->where('idEksternal','=','EK001')->get();
    	$darah = DB::table('hasil')->where('verifikasi','=','ya')->where('ketStatus','=','positive')->where('idEksternal','=','EK002')->get();
    	$keturunan = DB::table('hasil')->where('verifikasi','=','ya')->where('ketStatus','=','positive')->where('idEksternal','=','EK003')->get();
    	$jarum = DB::table('hasil')->where('verifikasi','=','ya')->where('ketStatus','=','positive')->where('idEksternal','=','EK004')->get();
    	$data = DB::table('hasil')->where('verifikasi','=','ya')->get();

    	$jumlahSeks = count($seks);
    	$jumlahDarah = count($darah);
		$jumlahKeturunan = count($keturunan);
		$jumlahJarum = count($jarum);
		$jumlahData = count($data);

		$persenSeks = $jumlahSeks/$jumlahData*100;
		$persenDarah = $jumlahDarah/$jumlahData*100;
		$persenKeturunan = $jumlahKeturunan/$jumlahData*100;
		$persenJarum = $jumlahJarum/$jumlahData*100;

		DB::table('dataHIV')->where('idData','=','DA001')->update(['persen' => $persenSeks]);
		DB::table('dataHIV')->where('idData','=','DA003')->update(['persen' => $persenDarah]);
		DB::table('dataHIV')->where('idData','=','DA005')->update(['persen' => $persenKeturunan]);
		DB::table('dataHIV')->where('idData','=','DA007')->update(['persen' => $persenJarum]);

    	return redirect('admin');
    }

}
