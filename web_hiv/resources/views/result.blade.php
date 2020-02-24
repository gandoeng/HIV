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
                                <a class="nav-link " href="{{url('test-page')}}" style="color: #fff;"><i class="fa fa-fw fa-user-circle" style="color: #fff;"></i>Take A Test</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#" style="color: #fff;"><i class="fas fa-fw fa-chart-pie" style="color: #fff;"></i>Result</a>
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
                        <h1 style="text-align: center; font-size: 30pt; padding-top: 2rem;"><b> RESULT </b></h1>
                        <div class="card-body" style="border: 2px solid #71748d; margin-top: 3rem;">
                            <table>
                                <tr>
                                    <td><h4>Jenis Penyakit</h4></td>
                                    <td><h4>:</h4></td>
                                </tr>
                                <tr>
                                    <td><h4>Persentase terjangkit penyakit</h4></td>
                                    <td><h4>:</h4></td>
                                </tr>
                                <tr>
                                    <td><h4>Persentase terjangkit virus HIV</h4></td>
                                    <td><h4>:</h4></td>
                                </tr>
                                <tr>
                                    <td><h4>Keterangan/saran</h4></td>
                                    <td><h4>:</h4></td>
                                </tr>
                            </table>
                        </div>
                        <form>
                            <button type="button" class="btn btn-primary" style="background-color: #000; border-color: #000; height:38px; margin-top: 2rem; float: right;">download</button>
                        </form>
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
</body>
 
</html>