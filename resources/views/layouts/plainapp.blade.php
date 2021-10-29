<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>TVPMS</title>
        <link rel="shortcut icon" href="{{ asset('assets/images/logo-sm.png') }}">
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('plugins/toastr/dist/build/toastr.min.css')}}" rel="stylesheet">
		<link href="{{asset('css/jquery.fancybox.min.css')}}" rel="stylesheet">
		
        @yield('css')
        @yield('other_css')
    </head>
<body>
    <div id="wrapper">
   
    <div class="content-page">  
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @if($errors->all())
                        @foreach ($errors->all() as $error)
                            <p class="text text-center text-danger"> {{$error}} </p>
                        @endforeach   
                    @endif
            
                    @if(session('success'))
                        <p class="col-md-12 text-center text text-success"><strong>{{session('success')}}</strong></p>
                    @endif
            
                    @if(session('error'))
                        <p class="col-md-12 text-center text text-danger"><strong>{{session('error')}}</strong></p>
                    @endif
                </div>
                @yield('content')
            </div> 
        </div> 
    </div> 
    <footer class="footer">
        ©  2019 <span class="d-none d-sm-inline-block">Boca Konsult Global Services</span>.
    </footer>  
    
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/waves.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>

    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('plugins/toastr/dist/build/toastr.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js" type="text/javascript"></script>

    @yield('script')
    @yield('other_script')

    
    </div> 
</body>

</html>