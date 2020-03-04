<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;


class testController extends Controller
{	
    //list gejala
    public function listGejala (Request $request){

        $cekLogin = $request->session()->get('login');

        if($cekLogin == 'masuk'){

            $idPasien = $request->session()->get('pasien');
            $cekTest = DB::table('pasien')->where('idPasien','=',$idPasien)->value('sudahTest');

            if($cekTest == 'B'){

                $list = DB::table('gejala')->select('idGejala','namaGejala')->get();
                $listEksternal = DB::table('eksternal')->select('idEksternal','namaEksternal')->get();
 
                return view('test-page2')->with('list',$list);

            } else{

                return redirect('result');

            }

        } else {

            return redirect('/');

        }

    }

    //list eksternal
    public function listEksternal (Request $request){

        $cekLogin = $request->session()->get('login');

        

        if($cekLogin == 'masuk'){

            //cek apakah sudah test
            $idPasien = $request->session()->get('pasien');
            $cekTest = DB::table('pasien')->select('sudahTest')->where('idPasien','=',$idPasien)->value('sudahTest');
                        
            if($cekTest == 'B'){

                $listEksternal = DB::table('eksternal')->select('idEksternal','namaEksternal')->get();

                return view('test-page')->with('listEksternal', $listEksternal);


            } else {

                return redirect('result');

            }  

        } else {
            return redirect('/');
        } 

    }

    //pindah halaman dari faktor luar - keluhan
    public function nextPage (Request $request){

        $cekLogin = $request->session()->get('login');

        if($cekLogin == 'masuk'){

            $eksternal = $request->input('eksternal');

            if($eksternal == NULL){
                return redirect('/test-page');
            } else {

                $request->session()->put('eksternal',$eksternal);

                return redirect('/test-page2');
            }

            //cek apakah sudah test
            return redirect('/test-page2');

        } else {

            return redirect('/');

        }

    }


    //proses
    public function proses (Request $request){

        $gejala = $request->input('gejala');
        $idPasien = $request->session()->get('pasien');

        if ($gejala == NULL){
            return redirect('/test-page');
        } else {
            $jumlah = count($gejala);
            $eksternal = $request->session()->get('eksternal');
            $persenGejala = 0;

            if($jumlah <= 2){

                //mencari persentase gejala HIV
                for ($i = 0, $i<$jumlah, $i++){

                    if($eksternal[$i] == 'GJ007'){

                        $persenSymptomps = DB::table('Symptomps')->where('daftar','=',$eksternal[i])->value('persen');
                        $persenGejala = $persenGejala + $persenSymptomps;

                    } else if($eksternal[$i] == 'GJ047'){
                        
                        $persenSymptomps = DB::table('Symptomps')->where('daftar','=',$eksternal[i])->value('persen');
                        $persenGejala = $persenGejala + $persenSymptomps;
                        
                    } else if($eksternal[$i] == 'GJ029'){
                        
                        $persenSymptomps = DB::table('Symptomps')->where('daftar','=',$eksternal[i])->value('persen');
                        $persenGejala = $persenGejala + $persenSymptomps;
                                            
                    } else if($eksternal[$i] == 'GJ013'){

                        $persenSymptomps = DB::table('Symptomps')->where('daftar','=',$eksternal[i])->value('persen');
                        $persenGejala = $persenGejala + $persenSymptomps;
                        
                    } else if($eksternal[$i] == 'GJ012'){

                        $persenSymptomps = DB::table('Symptomps')->where('daftar','=',$eksternal[i])->value('persen');
                        $persenGejala = $persenGejala + $persenSymptomps;
                        
                    } else if($eksternal[$i] == 'GJ027'){

                        $persenSymptomps = DB::table('Symptomps')->where('daftar','=',$eksternal[i])->value('persen');
                        $persenGejala = $persenGejala + $persenSymptomps;
                        
                    } else if($eksternal[$i] == 'GJ030'){
                        
                        $persenSymptomps = DB::table('Symptomps')->where('daftar','=',$eksternal[i])->value('persen');
                        $persenGejala = $persenGejala + $persenSymptomps;
                        
                    } else if($eksternal[$i] == 'GJ048'){

                        $persenSymptomps = DB::table('Symptomps')->where('daftar','=',$eksternal[i])->value('persen');
                        $persenGejala = $persenGejala + $persenSymptomps;
                        
                    } else if($eksternal[$i] == 'GJ040'){
                       
                        $persenSymptomps = DB::table('Symptomps')->where('daftar','=',$eksternal[i])->value('persen');
                        $persenGejala = $persenGejala + $persenSymptomps;
                        
                    } else if($eksternal[$i] == 'GJ033'){

                        $persenSymptomps = DB::table('Symptomps')->where('daftar','=',$eksternal[i])->value('persen');
                        $persenGejala = $persenGejala + $persenSymptomps;
                        
                    } else if($eksternal[$i] == 'GJ031'){
                        
                        $persenSymptomps = DB::table('Symptomps')->where('daftar','=',$eksternal[i])->value('persen');
                        $persenGejala = $persenGejala + $persenSymptomps;
                        
                    } else if($eksternal[$i] == 'GJ049'){

                        $persenSymptomps = DB::table('Symptomps')->where('daftar','=',$eksternal[i])->value('persen');
                        $persenGejala = $persenGejala + $persenSymptomps;
                        
                    }

                }

                //hitung hitung
                $persenEksternal = DB::table('dataHIV')->where('idEksternal','=',$eksternal)->where('statusHIV','=','positive')->value('persen')

                $persenGejalaHasil = $persenGejala/$jumlah;

                $persenHIV = ($persenGejalaHasil + $persenEksternal)/2;

                if($persenHIV > 50){
                    $ketHasil = "Dianjurkan untuk test HIV di puskesmas atau rumah sakit terdekat";
                } else {
                    $ketHasil = "Jaga kesehatan anda dimanapun anda berada";
                }

                //masukkan kedalam tabel hasil
                DB::table('hasil')->insert([
                    ['idEksternal' => $eksternal, 'persenPenyakit' => 0, 'persenHIV' => $persenHIV, 'ketHasil' => $ketHasil, 'verifikasi' => 'tidak', 'lab' => NULL, 'idPenyakit' => 'PE012', 'idPasien' => $idPasien]
                ]);

                
            } else if($jumlah > 2 ) {

                for ($i = 0; $i<$jumlah ; $i++){
                
                    if($eksternal[$i] == 'GJ001'){
                        $GJ001 = $eksternal[$i];
                    } else if($eksternal[$i] == 'GJ002'){
                        $GJ002 = $eksternal[$i];
                    } else if($eksternal[$i] == 'GJ003'){
                        $GJ003 = $eksternal[$i];
                    } else if($eksternal[$i] == 'GJ004'){
                        $GJ004 = $eksternal[$i];
                    } else if($eksternal[$i] == 'GJ005'){
                        $GJ005 = $eksternal[$i];
                    } else if($eksternal[$i] == 'GJ006'){
                        $GJ006 = $eksternal[$i];
                    } else if($eksternal[$i] == 'GJ007'){
                        $GJ007 = $eksternal[$i];
                    } else if($eksternal[$i] == 'GJ008'){
                        $GJ008 = $eksternal[$i];
                    } else if($eksternal[$i] == 'GJ009'){
                        $GJ009 = $eksternal[$i];
                    } else if($eksternal[$i] == 'GJ010'){
                        $GJ010 = $eksternal[$i];
                    } else if($eksternal[$i] == 'GJ011'){
                        $GJ011 = $eksternal[$i];
                    } else if($eksternal[$i] == 'GJ012'){
                        $GJ012 = $eksternal[$i];
                    } else if($eksternal[$i] == 'GJ013'){
                        $GJ013 = $eksternal[$i];
                    } else if($eksternal[$i] == 'GJ014'){
                        $GJ014 = $eksternal[$i];
                    } else if($eksternal[$i] == 'GJ015'){
                        $GJ015 = $eksternal[$i];
                    } else if($eksternal[$i] == 'GJ016'){
                        $GJ016 = $eksternal[$i];
                    } else if($eksternal[$i] == 'GJ017'){
                        $GJ017 = $eksternal[$i];
                    } else if($eksternal[$i] == 'GJ018'){
                        $GJ018 = $eksternal[$i];
                    } else if($eksternal[$i] == 'GJ019'){
                        $GJ019 = $eksternal[$i];
                    } else if($eksternal[$i] == 'GJ020'){
                        $GJ020 = $eksternal[$i];
                    } else if($eksternal[$i] == 'GJ021'){
                        $GJ021 = $eksternal[$i];
                    } else if($eksternal[$i] == 'GJ022'){
                        $GJ022 = $eksternal[$i];
                    } else if($eksternal[$i] == 'GJ023'){
                        $GJ023 = $eksternal[$i];
                    } else if($eksternal[$i] == 'GJ024'){
                        $GJ024 = $eksternal[$i];
                    } else if($eksternal[$i] == 'GJ025'){
                        $GJ025 = $eksternal[$i];
                    } 

                } 

            } 


            return $jumlah;
        }

    }

}
