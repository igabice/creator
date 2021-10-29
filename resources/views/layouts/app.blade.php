<!DOCTYPE html>
<html lang="en">
    <head>
        <title>7DC </title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/logo-sm1.png')}}">
        {{-- <link href="{{ asset('assets/libs/chartist/chartist.min.css') }}" rel="stylesheet"> --}}
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/main-style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/jquery.fancybox.min.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('css/jquery.dataTables.yadcf.css') }}" rel="stylesheet" type="text/css" />


        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
   	 	<link href="{{ asset('assets/css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
{{--        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />--}}
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
{{--        <link href="/static/vendor/icofont/icofont.min.css" rel="stylesheet">--}}
        <link href="{{asset('plugins/toastr/dist/build/toastr.min.css')}}" rel="stylesheet">
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        {{--<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>--}}
        @yield('css')
        @yield('other_css')
        <style>

            /* Style all font awesome icons */


            /* Add a hover effect if you want */
            .fa:hover {
                color: gold;
            }

            /* Set a specific color for each brand */

            /* Facebook */
            .fa-facebook {
                background: black;
                color: white;
                padding:10px;
                font-size: 20px;
                width: 30px;
                text-align: center;
                text-decoration: none;
            }
            .fa-twitter {
                background: black;
                color: white;
                padding:10px;
                font-size: 20px;
                width: 30px;
                text-align: center;
                text-decoration: none;
            }
            .fa-instagram {
                background: black;
                color: white;
                padding:10px;
                font-size: 20px;
                width: 30px;
                text-align: center;
                text-decoration: none;
            }
            .fa-tumblr {
                background: black;
                color: white;
                padding:10px;
                font-size: 20px;
                width: 30px;
                text-align: center;
                text-decoration: none;
            }
            .fa-linkedin-in {
                background: black;
                color: white;
                padding:10px;
                font-size: 20px;
                width: 30px;
                text-align: center;
                text-decoration: none;
            }


        </style>
    </head>

    <body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

   <div class="topbar">

        @include('inc.navbar')

    </div>

    @include('inc.sidebar')

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            @if($errors->all())
                                @foreach ($errors->all() as $error)
                                    <p class="text text-center text-danger"> {{$error}} </p>
                                @endforeach
                            @endif

                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <strong>{{session('success')}}</strong>
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <strong>{{session('error')}}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>



        <footer class="footer">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <span class="d-sm-inline-block" style="color: white"> Copyright (c) {{date('Y')}}  The 7D Affiliates Limited (7D Group)

                            <a href="https://www.twitter.com/affiliatedng" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="https://www.facebook.com/affiliatedng" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/affiliatedng" class="instagram"><i class="fa fa-instagram"></i></a>
                <a href="https://www.linkedin.com/affiliatedng" class="google-plus"><i class="fa fa-linkedin-in"></i></a>
                <a href="https://www.tiktok.com/affiliatedng" class="google-plus"><i class="fa fa-tumblr"></i></a>
                        </span>
                    </div>
                </div>
            </div>
        </footer>

        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->

        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('assets/assets/libs/moment/min/moment.min.js') }}"></script>
        <!-- PLUGINS-->
         <script src="{{ asset('assets/js/bootstrap-datetimepicker.js') }}"></script>
        <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
        <script src="{{ asset('js/jquery.dataTables.yadcf.js') }}"></script>

        <script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
        {{-- <script src="{{asset('plugins/toastr/dist/build/toastr.min.js')}}"></script> --}}

        <!-- Peity chart-->
        <script src="{{ asset('assets/libs/peity/jquery.peity.min.js') }}"></script>

        <script src="{{ asset('assets/js/app.js') }}"></script>

        <script src="{{ asset('assets/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('js/clipboard.min.js') }}"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
{{--        <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js" type="text/javascript"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>--}}
        <script>
            $(".select2").select2();
           // $(".dataTable").select2();

            $('.date').datepicker({
                format: "dd-mm-yyyy",
                // viewMode: "months",
                // minViewMode: "months",
                toggleActive: true,
                autoclose:!0,
                todayHighlight:!0
            });
            $('#time').datetimepicker({
                format: 'hh:mm'
            });

            new ClipboardJS('.btnn');

            $('.btnn').click(function () {
                Toastify({
                    text: "text copied.",
                    duration: 3000,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "left", // `left`, `center` or `right`
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    onClick: function(){} // Callback after click
                }).showToast();
            });



            // $('.referId').click(function () {
            //     Toastify({
            //         text: "text copied",
            //         duration: 1000,
            //         close: true,
            //         gravity: "top", // `top` or `bottom`
            //         position: "center", // `left`, `center` or `right`
            //         backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
            //         stopOnFocus: true, // Prevents dismissing of toast on hover
            //         onClick: function(){
            //            new ClipboardJS('.referId');
            //         } // Callback after click
            //     }).showToast();
            // });
        </script>
        @yield('script')
        @yield('other_script')
    </div>
</body>

</html>
