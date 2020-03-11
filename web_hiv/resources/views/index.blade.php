<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HIV Test System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="{{asset('/css/fontastic.css')}}">
    <!-- Google fonts - Open Sans-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <!-- Fancybox-->
    <link rel="stylesheet" href="{{asset('/vendor/@fancyapps/fancybox/jquery.fancybox.min.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('/css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('favicon.png')}}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  </head>
  <body>
    <header class="header">
      <!-- Main Navbar-->
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <!-- Navbar Brand -->
          <div class="navbar-header d-flex align-items-center justify-content-between">
            <!-- Navbar Brand -->
            <a href="#" class="navbar-brand">HIV TEST SYSTEM</a>
          </div>
        </div>
      </nav>
    </header>
    <!-- Hero Section-->
    <section style="background: url(img/girl.jpg); background-size: cover; background-position: center center" class="hero">
      <div class="container">
        <div class="row">
          <div class="col-lg-9" style="margin-left: auto; margin-right: auto;">
            <h1>Test Your HIV Infection Before It Too Late</h1><!--<a href="#" class="hero-link">Discover More</a>-->
          </div>
        <!--</div><a href="#" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> Scroll Down</a> -->
      </div>
    </section>
    <!-- Intro Section-->
    <section class="intro">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <h2 class="h3">I have a great news for you!</h2>
            <p class="text-big">Congratulations on passing yout test! <strong>Your HIV positive.</strong>
            Is that what are you expected ?
            Take the test better than <strong>You know nothing</strong> about yourself.</p>
          </div>
        </div>
      </div>
    </section>
    <!-- login/register section -->
    <section class="no-padding-top">
      <div class="container container-login">
        <div class="row">
          <div class="col-md-6 login-form-1">
            <h3>Login</h3>
            <form action="{{ url('index/login')}}" method="get">
              <div class="form-group">
                <input type="text" class="form-control" name="namaPasien" placeholder="Your Username" required />
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="sandi" placeholder="Your Password" required />
              </div>
              <div class="form-group">
                <input type="submit" class="btnSubmit" value="Login" />
              </div>
            </form>
          </div>
          <div class="col-md-6 login-form-2">
            <h3>Register</h3>
            <form action="{{ url('/index/register')}}" method="get">
              <div class="form-group">
                <input type="text" class="form-control" name="namaPasien" placeholder="Your Username" required />
              </div>
              <div class="form-group">
                <input type="number" class="form-control" name="umur" placeholder="Your Age" required />
              </div>
              <div class="form-group">
                <select class="form-control" name="gender" type="text" required>
                  <option selected disabled >Choose Your Sex</option>
                  <option value="L">Male</option>
                  <option value="P">Vemale</option>
                </select>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="sandi" placeholder="Your Password *" required />
              </div>
              <div class="form-group">
                <input type="submit" class="btnSubmit" value="Register" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- end section -->
    <section class="featured-posts no-padding-top">
      <div class="container">
        <!-- Post-->
        <div class="row d-flex align-items-stretch">
          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">
                  <div class="category" style="font-size: 30pt">You <strong>CAN</strong> get HIV from ...</div><a href="#">
                    <h2 class="h4">Sex Without A Condom</h2></a>
                </header>
              </div>
            </div>
          </div>
          <div class="image col-lg-5" style="min-height: 244px;"><img src="{{asset('img/love.png')}}" alt="..."></div>
        </div>
        <!-- Post        -->
        <div class="row d-flex align-items-stretch">
          <div class="image col-lg-5" style="min-height: 244px;"><img src="{{asset('img/mom.png')}}" alt="..."></div>
          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">
                  <div class="category" style="font-size: 30pt">You <strong>CAN</strong> get HIV from ...</div><a href="#">
                    <h2 class="h4">Passed From Mother To Baby</h2></a>
                </header>
              </div>
            </div>
          </div>
        </div>
        <!-- Post                            -->
        <div class="row d-flex align-items-stretch">
          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">
                  <div class="category" style="font-size: 30pt">You <strong>CAN</strong> get HIV from ...</div><a href="#">
                    <h2 class="h4">Sharing Injection Equipment</h2></a>
                </header>
              </div>
            </div>
          </div>
          <div class="image col-lg-5" style="min-height: 244px;"><img src="{{asset('img/old.png')}}" alt="..."></div>
        </div>
        <!-- Post        -->
        <div class="row d-flex align-items-stretch">
          <div class="image col-lg-5" style="min-height: 244px;"><img src="{{asset('img/blood.jpg')}}" alt="..."></div>
          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">
                  <div class="category" style="font-size: 30pt">You <strong>CAN</strong> get HIV from ...</div><a href="#">
                    <h2 class="h4">Contaminated Blood Transfusions And Organ Transplants</h2></a>
                </header>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Divider Section-->
    <section style="background: url(img/divider-bg.jpg); background-size: cover; background-position: center bottom" class="divider">
      <div class="container">
        <div class="row">
          <div class="col-md-10" style="margin-left: auto; margin-right: auto;">
            <h2>"It is bad enough that people are dying of AIDS, but no one should die of ignorance"</h2>
            <h3>-Elizabeth Taylor</h3>
          </div>
        </div>
      </div>
    </section>
    <!-- Page Footer-->
    <footer class="main-footer">
      <div class="copyrights">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <!--<p>&copy; 2017. All rights reserved. Your great site.</p>-->
            </div>
            <div class="col-md-6 text-right">
              <!--<p>Template By <a href="https://bootstrapious.com/p/bootstrap-carousel" class="text-white">Bootstrapious</a>-->
                <!-- Please do not remove the backlink to Bootstrap Temple unless you purchase an attribution-free license @ Bootstrap Temple or support us at http://bootstrapious.com/donate. It is part of the license conditions. Thanks for understanding :)                         -->
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- JavaScript files-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('vendor/@fancyapps/fancybox/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('js/front.js')}}"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    @include('sweetalert::alert')

  </body>
</html>