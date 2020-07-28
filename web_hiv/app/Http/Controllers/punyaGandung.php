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

                $jumlah = count($eksternal);

                for($i=0; $i<$jumlah; $i++){
                    if($eksternal[$i] == 'EK001'){
                        $persenEksternal1 = DB::table('dataHIV')->where('idEksternal','=',$eksternal[$i])->where('statusHIV','=','positive')->value('persen');

                        $arrayEksternal["EK001"] = $persenEksternal1; 
                    }
                    if($eksternal[$i] == 'EK002'){
                        $persenEksternal2 = DB::table('dataHIV')->where('idEksternal','=',$eksternal[$i])->where('statusHIV','=','positive')->value('persen');
                        $arrayEksternal["EK002"] = $persenEksternal2;
                    }
                    if($eksternal[$i] == 'EK003'){
                        $persenEksternal3 = DB::table('dataHIV')->where('idEksternal','=',$eksternal[$i])->where('statusHIV','=','positive')->value('persen');
                        $arrayEksternal["EK003"] = $persenEksternal3;
                    }
                    if($eksternal[$i] == 'EK004'){
                        $persenEksternal4 = DB::table('dataHIV')->where('idEksternal','=',$eksternal[$i])->where('statusHIV','=','positive')->value('persen');
                        $arrayEksternal["EK004"] = $persenEksternal4;
                    }
                }

                arsort($arrayEksternal);

                $idEksternal = array_key_first($arrayEksternal);
                $hasilEksternal = $arrayEksternal[$idEksternal];

                $request->session()->put('eksternal',$idEksternal);

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
        $persenGejalaHasil = 0;
        $persenEksternal = 0;
        $persenHIV = 0;
        $i=0;
        $jumlahPenyakit = 0;
        $arrayPenyakit = array();
        $arrayPersenPenyakit = array();

        if ($gejala == NULL){
            return redirect('/test-page');
        } else {
            $jumlah = count($gejala);
            $eksternal = $request->session()->get('eksternal');
            $persenGejala = 0;
            
            if($jumlah <= 2){
                $penyakit = 'PE012';
                //mencari persentase gejala HIV
                for ($i = 0; $i<$jumlah; $i++){

                    if($gejala[$i] == 'GJ007'){

                        $persenSymptomps = DB::table('Symptomps')->where('daftar','=',$gejala[$i])->value('persen');
                        $persenGejala = $persenGejala + $persenSymptomps;

                    } else if($gejala[$i] == 'GJ047'){
                        
                        $persenSymptomps = DB::table('Symptomps')->where('daftar','=',$gejala[$i])->value('persen');
                        $persenGejala = $persenGejala + $persenSymptomps;
                        
                    } else if($gejala[$i] == 'GJ029'){
                        
                        $persenSymptomps = DB::table('Symptomps')->where('daftar','=',$gejala[$i])->value('persen');
                        $persenGejala = $persenGejala + $persenSymptomps;
                                            
                    } else if($gejala[$i] == 'GJ013'){

                        $persenSymptomps = DB::table('Symptomps')->where('daftar','=',$gejala[$i])->value('persen');
                        $persenGejala = $persenGejala + $persenSymptomps;
                        
                    } else if($gejala[$i] == 'GJ012'){

                        $persenSymptomps = DB::table('Symptomps')->where('daftar','=',$gejala[$i])->value('persen');
                        $persenGejala = $persenGejala + $persenSymptomps;
                        
                    } else if($gejala[$i] == 'GJ027'){

                        $persenSymptomps = DB::table('Symptomps')->where('daftar','=',$gejala[$i])->value('persen');
                        $persenGejala = $persenGejala + $persenSymptomps;
                        
                    } else if($gejala[$i] == 'GJ030'){
                        
                        $persenSymptomps = DB::table('Symptomps')->where('daftar','=',$gejala[$i])->value('persen');
                        $persenGejala = $persenGejala + $persenSymptomps;
                        
                    } else if($gejala[$i] == 'GJ048'){

                        $persenSymptomps = DB::table('Symptomps')->where('daftar','=',$gejala[$i])->value('persen');
                        $persenGejala = $persenGejala + $persenSymptomps;
                        
                    } else if($gejala[$i] == 'GJ040'){
                       
                        $persenSymptomps = DB::table('Symptomps')->where('daftar','=',$gejala[$i])->value('persen');
                        $persenGejala = $persenGejala + $persenSymptomps;
                        
                    } else if($gejala[$i] == 'GJ033'){

                        $persenSymptomps = DB::table('Symptomps')->where('daftar','=',$gejala[$i])->value('persen');
                        $persenGejala = $persenGejala + $persenSymptomps;
                        
                    } else if($gejala[$i] == 'GJ031'){
                        
                        $persenSymptomps = DB::table('Symptomps')->where('daftar','=',$gejala[$i])->value('persen');
                        $persenGejala = $persenGejala + $persenSymptomps;
                        
                    } else if($gejala[$i] == 'GJ049'){

                        $persenSymptomps = DB::table('Symptomps')->where('daftar','=',$gejala[$i])->value('persen');
                        $persenGejala = $persenGejala + $persenSymptomps;
                        
                    }

                }

                //hitung hitung
                $persenEksternal = DB::table('dataHIV')->where('idEksternal','=',$eksternal)->where('statusHIV','=','positive')->value('persen');

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
            
                $hitungTBC = 0;
                $hitungSyphilis = 0;
                $hitungGonorea = 0;
                $hitungChlamydia = 0;
                $hitungTrichomoniasis = 0;
                $hitungHepatitis = 0;
                $hitungTinea = 0;
                $hitungHerpes = 0;
                $hitungJringan = 0;
                $hitungJberat = 0;
                $hitungMeningitis = 0;

                for ($i = 0; $i<$jumlah; $i++){

                    //cek rules
                    $cekTBC = DB::table('gejalaPenyakit')->where('idPenyakit','=','PE001')->where('idGejala','=',$gejala[$i])->value('idPenyakit');
                    $cekSyphilis = DB::table('gejalaPenyakit')->where('idPenyakit','=','PE002')->where('idGejala','=',$gejala[$i])->value('idPenyakit');
                    $cekGonorea = DB::table('gejalaPenyakit')->where('idPenyakit','=','PE003')->where('idGejala','=',$gejala[$i])->value('idPenyakit');
                    $cekChlamydia = DB::table('gejalaPenyakit')->where('idPenyakit','=','PE004')->where('idGejala','=',$gejala[$i])->value('idPenyakit');
                    $cekTrichomoniasis = DB::table('gejalaPenyakit')->where('idPenyakit','=','PE005')->where('idGejala','=',$gejala[$i])->value('idPenyakit');
                    $cekHepatitis = DB::table('gejalaPenyakit')->where('idPenyakit','=','PE006')->where('idGejala','=',$gejala[$i])->value('idPenyakit');
                    $cekTinea = DB::table('gejalaPenyakit')->where('idPenyakit','=','PE007')->where('idGejala','=',$gejala[$i])->value('idPenyakit');
                    $cekHerpes = DB::table('gejalaPenyakit')->where('idPenyakit','=','PE008')->where('idGejala','=',$gejala[$i])->value('idPenyakit');
                    $cekJringan = DB::table('gejalaPenyakit')->where('idPenyakit','=','PE009')->where('idGejala','=',$gejala[$i])->value('idPenyakit');
                    $cekJberat = DB::table('gejalaPenyakit')->where('idPenyakit','=','PE010')->where('idGejala','=',$gejala[$i])->value('idPenyakit');
                    $cekMeningitis = DB::table('gejalaPenyakit')->where('idPenyakit','=','PE011')->where('idGejala','=',$gejala[$i])->value('idPenyakit');


                    if($cekTBC == 'PE001'){
                        $hitungTBC++;
                    }

                    if($cekSyphilis == 'PE002'){
                        $hitungSyphilis++;
                    }

                    if($cekGonorea == 'PE003'){
                        $hitungGonorea++;
                    }

                    if($cekChlamydia == 'PE004'){
                        $hitungChlamydia++;
                    }

                    if($cekTrichomoniasis == 'PE005'){
                        $hitungTrichomoniasis++;
                    }

                    if($cekHepatitis == 'PE006'){
                        $hitungHepatitis++;
                    }

                    if($cekTinea == 'PE007'){
                        $hitungTinea++;
                    }

                    if($cekHerpes == 'PE008'){
                        $hitungHerpes++;
                    }

                    if($cekJringan == 'PE009'){
                        $hitungJringan++;
                    }

                    if($cekJberat == 'PE010'){
                        $hitungJberat++;
                    }

                    if($cekMeningitis == 'PE011'){
                        $hitungMeningitis++;
                    } 
                } 

                $countArrayPenyakit = 0;

                if($hitungTBC != 0){
                    $persenTBC = $hitungTBC/9*100;

                    $arrayPenyakit["PE001"] = $persenTBC;

                    $countArrayPenyakit++;
                }

                if($hitungSyphilis != 0){
                    $persenSyphilis = $hitungSyphilis/8*100;
                     
                    $arrayPenyakit["PE002"] = $persenSyphilis;


                    $countArrayPenyakit++;
                }

                if($hitungGonorea != 0){
                    $persenGonorea = $hitungGonorea/7*100;

                    $arrayPenyakit["PE003"] = $persenGonorea;

                    $countArrayPenyakit++;
                }

                if($hitungChlamydia != 0){
                    $persenChlamydia = $hitungChlamydia/6*100;

                    $arrayPenyakit["PE004"] = $persenChlamydia;

                    $countArrayPenyakit++;
                }

                if($hitungTrichomoniasis != 0){
                    $persenTrichomoniasis = $hitungTrichomoniasis/4*100;

                    $arrayPenyakit["PE005"] = $persenTrichomoniasis;

                    $countArrayPenyakit++;
                }

                if($hitungHepatitis != 0){
                    $persenHepatitis = $hitungHepatitis/12*100;

                    $arrayPenyakit["PE006"] = $persenHepatitis;

                    $countArrayPenyakit++;
                }

                if($hitungTinea != 0){
                    $persenTinea = $hitungTinea/4*100;

                    $arrayPenyakit["PE007"] = $persenTinea;

                    $countArrayPenyakit++;
                }

                if($hitungHerpes != 0){
                    $persenHerpes = $hitungHerpes/6*100;

                    $arrayPenyakit["PE008"] = $persenHerpes;

                    $countArrayPenyakit++;
                }

                if($hitungJringan != 0){
                    $persenJringan = $hitungJringan/3*100;

                    $arrayPenyakit["PE009"] = $persenJringan;

                    $countArrayPenyakit++;
                }

                if($hitungJberat != 0){
                    $persenJberat = $hitungJberat/9*100;

                    $arrayPenyakit["PE010"] = $persenJberat;

                    $countArrayPenyakit++;
                }

                if($hitungMeningitis != 0){
                    $persenMeningitis = $hitungMeningitis/8*100;

                    $arrayPenyakit["PE011"] = $persenMeningitis;
    
                    $countArrayPenyakit++;
                }
                arsort($arrayPenyakit);


                //hasil penyakit
                $namaPenyakit = array_key_first($arrayPenyakit);
                $persenPenyakit = $arrayPenyakit[$namaPenyakit];

                //HIV
                $persenGejalaHasil = 84;
                $persenEksternal = DB::table('dataHIV')->where('idEksternal','=',$eksternal)->where('statusHIV','=','positive')->value('persen');

                $persenHIV = ($persenGejalaHasil + $persenEksternal)/2;

                if($persenHIV > 50){
                    $ketHasil = "Dianjurkan untuk test HIV di puskesmas atau rumah sakit terdekat";
                } else {
                    $ketHasil = "Jaga kesehatan anda dimanapun anda berada";
                }

                 //masukkan kedalam tabel hasil
                DB::table('hasil')->insert([
                    ['idEksternal' => $eksternal, 'persenPenyakit' => $persenPenyakit, 'persenHIV' => $persenHIV, 'ketHasil' => $ketHasil, 'verifikasi' => 'tidak', 'idPenyakit' => $namaPenyakit, 'idPasien' => $idPasien]
                ]);

            } 

            //update data pasien test
            DB::table('pasien')->where('idPasien','=',$idPasien)->update(['sudahTest' => 'S']);
            return redirect('/result');
        
        }

    }

    public function listGejalaBFS (Request $request){

        $cekLogin = $request->session()->get('login');

        if($cekLogin == 'masuk'){

            $idPasien = $request->session()->get('pasien');


            $list = DB::table('gejala')->select('idGejala','namaGejala')->get();
            $listEksternal = DB::table('eksternal')->select('idEksternal','namaEksternal')->get();
 
                return view('test-page3')->with('list',$list);

        } else {

            return redirect('/');

        }

    }

    public function prosesBFS (Request $request){

        $gejala = $request->input('gejala');
        $idPasien = $request->session()->get('pasien');
        $batas = 0;

        $jumlah = count($gejala);

        if($jumlah == 0){
            return redirect('result');
        } else {

            $cekTBC = DB::table('gejalaPenyakit')->where('idPenyakit','=','PE001')->where('idGejala','=',$gejala[0])->value('idPenyakit');
            $cekSyphilis = DB::table('gejalaPenyakit')->where('idPenyakit','=','PE002')->where('idGejala','=',$gejala[0])->value('idPenyakit');
            $cekGonorea = DB::table('gejalaPenyakit')->where('idPenyakit','=','PE003')->where('idGejala','=',$gejala[0])->value('idPenyakit');
            $cekChlamydia = DB::table('gejalaPenyakit')->where('idPenyakit','=','PE004')->where('idGejala','=',$gejala[0])->value('idPenyakit');
            $cekTrichomoniasis = DB::table('gejalaPenyakit')->where('idPenyakit','=','PE005')->where('idGejala','=',$gejala[0])->value('idPenyakit');
            $cekHepatitis = DB::table('gejalaPenyakit')->where('idPenyakit','=','PE006')->where('idGejala','=',$gejala[0])->value('idPenyakit');
            $cekTinea = DB::table('gejalaPenyakit')->where('idPenyakit','=','PE007')->where('idGejala','=',$gejala[0])->value('idPenyakit');
            $cekHerpes = DB::table('gejalaPenyakit')->where('idPenyakit','=','PE008')->where('idGejala','=',$gejala[0])->value('idPenyakit');
            $cekJringan = DB::table('gejalaPenyakit')->where('idPenyakit','=','PE009')->where('idGejala','=',$gejala[0])->value('idPenyakit');
            $cekJberat = DB::table('gejalaPenyakit')->where('idPenyakit','=','PE010')->where('idGejala','=',$gejala[0])->value('idPenyakit');
            $cekMeningitis = DB::table('gejalaPenyakit')->where('idPenyakit','=','PE011')->where('idGejala','=',$gejala[0])->value('idPenyakit');

            
            if($cekTBC == 'PE001'){
                $listPenyakit[$batas] = 'PE001';
                $batas++;            
            }

            if($cekSyphilis == 'PE002'){
                $listPenyakit[$batas] = 'PE002';
                $batas++;
            }

            if($cekGonorea == 'PE003'){
                $listPenyakit[$batas] = 'PE003';
                $batas++;
            }

            if($cekChlamydia == 'PE004'){
                $listPenyakit[$batas] = 'PE004';
                $batas++;            
            }

            if($cekTrichomoniasis == 'PE005'){
                $listPenyakit[$batas] = 'PE005';
                $batas++;
            }

            if($cekHepatitis == 'PE006'){
                $listPenyakit[$batas] = 'PE006';
                $batas++;
            }

            if($cekTinea == 'PE007'){
                $listPenyakit[$batas] = 'PE007';
                $batas++;
            }

            if($cekHerpes == 'PE008'){
                $listPenyakit[$batas] = 'PE008';
                $batas++;
            }

            if($cekJringan == 'PE009'){
                $listPenyakit[$batas] = 'PE009';
                $batas++;
            }

            if($cekJberat == 'PE010'){
                $listPenyakit[$batas] = 'PE010';
                $batas++;
            }

            if($cekMeningitis == 'PE011'){
                $listPenyakit[$batas] = 'PE011';
                $batas++;
            }            

            if($batas > 1){
                
                for($i=1; $i<$jumlah; $i++){
                    $index = 0;
                    for($j=0; $j<$batas; $j++){
                        $cek = DB::table('gejalaPenyakit')->where('idPenyakit','=',$listPenyakit[$j])->where('idGejala','=',$gejala[$i])->value('idPenyakit');

                        if($cek == $listPenyakit[$j]){
                            $listPenyakit2[$index] = $cek;
                            $index++;
                        }
                    }

                    $listPenyakit = $listPenyakit2;
                    $batas = count($listPenyakit);
                    $listPenyakit2 = array();
            
                }

                
                $jumlahPenyakit = count($listPenyakit);

                for($i=0; $i<$jumlahPenyakit; $i++){
                    DB::table('dataBFS')->where('idPasien','=',$idPasien)->insert(['idPasien' => $idPasien,'idPenyakit'=>$listPenyakit[$i]]);
                }

                return redirect('/result');

            } else {
                DB::table('dataBFS')->where('idPasien','=',$idPasien)->insert(['idPasien' => $idPasien,'idPenyakit'=>$listPenyakit[0]]);
                return redirect('/result');
            } 
                        
        }

    }
}
