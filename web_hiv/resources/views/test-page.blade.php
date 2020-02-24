<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HIV Test System</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('concept/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{asset('concept/assets/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('concept/assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('concept/assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/selectFX/css/cs-skin-elastic.css')}}">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
         <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
         <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="#">HIV Test System</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
      <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider" style="color: #fff;">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active " href="#" style="color: #fff;" ><i class="fa fa-fw fa-user-circle" style="color: #fff;"></i>Take A Test</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('result')}}" style="color: #fff;"><i class="fas fa-fw fa-chart-pie" style="color: #fff;"></i>Result</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('verification')}}" style="color: #fff;" ><i class="fab fa-fw fa-wpforms" style="color: #fff;"></i>Verification</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" style="color: #fff;"><i class="fa fa-fw fa-rocket" style="color: #fff;"></i>Log Out</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card-body border-bottom">
                            <form >
                                <div class=" border-top" style="padding: 0 px;">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-block" style="background-color: #000; border-color: #000;">Get Your Test !</button>
                                    </div>
                                </div>
                            </form>
                            <div class="border-bottom">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary btn-block" onclick="resetFunction()" style="background-color: #000; border-color: #000; height:38px;" name="Reset" id="Reset">Reset</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="list-gejala" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-form-label">Tambah Eksternal</label>
                                    <div class="input-group mb-3">
                                        <select name="select" id="selectEksternal" onchange="pilihEksternal()" class="form-control">
                                            <option selected disabled>Pilih Eksternal</option>
                                            @foreach ($listEksternal as $l)
                                            <option value="{{$l->namaEksternal}}">{{$l->namaEksternal}}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-primary" onclick="myFunction2()" style="background-color: #000; border-color: #000; height:38px;" name="tambah" id="tambah">Tambah!</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form id="list-gejala" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-form-label">Tambah Gejala</label>
                                    <div class="input-group mb-3">
                                        <select name="select" id="selectGejala" onchange="pilihGejala()" class="form-control">
                                            <option selected disabled>Pilih gejala</option>
                                            @foreach ($list as $l)
                                            <option value="{{$l->namaGejala}}">{{$l->namaGejala}}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-primary" onclick="myFunction()" style="background-color: #000; border-color: #000; height:38px;" name="tambah" id="tambah">Tambah!</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div id="container2"></div>
                                <div class="form-group" id="hasilSelect1"  >
                                    <div class="add-row" id="hasilSelect">
                                    <!--
                                    <input type="text" name="tambahGejala" class="alert alert-secondary" readonly style="width: 100%;"> -->
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <!--
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        -->
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="{{asset('concept/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('concept/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('concept/assets/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('concept/assets/libs/js/main-js.js')}}"></script>
    <script type="text/javascript">
        //list gejala
        var hasil;
        function pilihGejala(){
            hasil = document.getElementById('selectGejala').value;
        }

        function myFunction() {
            if (hasil != null ) {
                const div = document.createElement('div');
                div.className = "add-row";
                div.innerHTML = '<input type="text" name="tambahGejala" class="alert alert-secondary hapusData" readonly style="width: 100%;"" id = "inputGejala" value="'+hasil+'" >'; 
                document.getElementById("hasilSelect").appendChild(div);
            }
        }
        
        function resetFunction(){
            $('.hapusData').remove();
        }

        //list eksternal
        var hasil2
        function pilihEksternal(){
            hasil2 = document.getElementById('selectEksternal').value;
        }

        function myFunction2(){
            if (hasil2 != null ) {
                const div = document.createElement('div');
                div.className = "add-row";
                div.innerHTML = '<input type="text" name="tambahGejala" class="alert alert-secondary hapusData" readonly style="width: 100%;"" id = "inputGejala" value="'+hasil2+'" >'; 
                document.getElementById("hasilSelect").appendChild(div);
            }
        }

    </script>
</body>
 
</html>