<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIPBS-SMK Madani Depok</title>
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')}}"></script>
      <![endif]-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="https://penilaian-smk.madanidepok.sch.id/vendor/img/icon/logo1.png" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/files/assets/pages/chart/radial/css/radial.css')}}" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/bower_components/bootstrap/css/bootstrap.min.css')}}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/icon/feather/css/feather.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/icon/icofont/css/icofont.css')}}">
    <!-- Select 2 css -->
    <link rel="stylesheet" href="{{ asset('/files/bower_components/select2/css/select2.min.css')}}">
    <!-- Multi Select css -->
    <link rel=" stylesheet" type="text/css" href="{{ asset('/files/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/bower_components/multiselect/css/multi-select.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" href="{{asset('/files/bower_components/chartist/css/chartist.css')}}" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/css/jquery.mCustomScrollbar.css')}}">
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/assets/pages/data-table/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">
</head>

<body class="fix-menu">
    <section class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center">
                        <img src="{{ asset('/files/assets/images/logo.png')}}" alt="logo.png">
                    </div>
                    {{-- notifikasi sukses --}}
                    @if ($sukses = Session::get('sukses'))
                    <div class="alert alert-success background-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <strong>{{$sukses}}</strong>
                    </div>
                    @elseif($gagal = Session::get('gagal'))
                    <div class="alert alert-danger background-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <strong>{{$gagal}}</strong>
                    </div>
                    @endif
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center">Sign In</h3>
                                </div>
                            </div>
                            <form action="{{route('Login.Post')}}" class="md-float-material form-material" enctype="multipart/form-data" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="number" name="nip" class="form-control" required="" oninvalid="this.setCustomValidity('Input No Induk Pegawai')" oninput="setCustomValidity('')" placeholder="No Induk Pegawai">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" required="" oninvalid="this.setCustomValidity('Input Password')" oninput="setCustomValidity('')" placeholder="Password">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign
                                            in</button>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">SMK Madani Depok</p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script type="text/javascript" src="{{asset('/files/bower_components/jquery/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/files/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/files/bower_components/popper.js/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/files/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{asset('/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{asset('/files/bower_components/modernizr/js/modernizr.js')}}"></script>
    <!-- Chart js -->
    <!-- amchart js -->
    <script src="{{asset('/files/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/files/assets/js/SmoothScroll.js')}}"></script>
    <script src="{{asset('/files/assets/js/pcoded.min.js')}}"></script>
    <!-- custom js -->
    <script src="{{asset('/files/assets/js/vartical-layout.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/files/assets/js/script.min.js')}}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
        $(document).ready(function() {
            // show the alert
            setTimeout(function() {
                $(".alert").alert('close');
            }, 5000);
        });
    </script>
</body>

</html>