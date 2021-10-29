<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content=" affiliated, Landing, Page, SEO" />
    <meta name="description" content="affiliated " />
    <title>7DC </title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--font-awesome icons link-->
    <link rel="stylesheet" href="{{ asset('asset/css/font-awesome.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('asset/css/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('asset/css/venobox.css')}}">
    <link rel="stylesheet" href="{{ asset('asset/css/lightbox.min.css')}}">
    <!--main style file-->
    <link rel="stylesheet" href="{{ asset('asset/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('asset/css/responsive.css')}}">

    <link rel="shortcut icon" href="{{ asset('asset/images/logo/7dcplain.png')}}">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">



    @yield('css')
    @yield('other_css')
</head>

<body id="darkmode" >
    <!-- Preloader -->
    <!-- <div class="loader_screen preloader" id="preloader">
        <div class="loader loader-box">
            <svg viewBox="0 0 80 80">
                <rect x="8" y="8" width="64" height="64"></rect>
            </svg>
        </div>
    </div> -->
    <!-- Preloader -->

    <!-- Modal -->
{{--    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title">Cart <b>.</b></h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <div class="row cart-item">--}}
{{--                        <div class="col-sm-4 col-lg-4 cart-img">--}}
{{--                            <img src="asset/images/product1.png" alt="product" class="img-fluid">--}}
{{--                            <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-8 col-lg-8">--}}
{{--                            <h3>Ober Headset</h3>--}}
{{--                            <span>1 x $135</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row cart-item">--}}
{{--                        <div class="col-sm-4 col-lg-4 cart-img">--}}
{{--                            <img src="asset/images/product3.png" alt="product" class="img-fluid">--}}
{{--                            <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-8 col-lg-8">--}}
{{--                            <h3>Wired Earphone</h3>--}}
{{--                            <span>2 x $99</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <a href="cart.html" class="main-btn model-btn">Checkout $320</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="modal fade" id="contact-model-large" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title">Contact <b>.</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row contact-box">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Full Name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email Address">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="7" placeholder="Your Message"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="main-btn model-btn">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <!-- HEADER AREA START -->
    @include('inc.header')

    <!-- HEADER AREA END -->

    @yield('content')


    <section id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 footer-logo">
                    <a href="/">
                        <img src="{{asset('asset/images/logo/7dcplain.png')}}" style="max-height: 100px" /></a>
{{--                    <p>The 7D Affiliates Limited (7D Group)</p>--}}
                    <div class="footer-social">
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 footer-menu">
                    <h3>Site Menu</h3>
                    <a href="/">Home</a>
                    <a href="/courses">Courses</a>
                    <a href="#">Contact Us</a>
                </div>
                <div class="col-lg-2 col-sm-4 footer-menu">
                    <h3>Useful Links</h3>
                    <a href="#">Career Opportunities</a>
                    <a href="#">Investor Relations</a>
                    <a href="#">Terms of Engagement</a>
                </div>
                <div class="col-lg-2 col-sm-4 footer-menu">
                    <h3>Information</h3>
                    <a href="#">Copyright</a>
                    <a href="/about">Corporate Information</a>
                    <a href="/privacy">Privacy Policy</a>
                </div>
            </div>
        </div>
    </section>
    <!-- FOOTER AREA END -->

    <!-- COPY_RIGHT AREA START -->
    <section id="copy_right">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 col-sm-7 copy-right-txt">
                            <p><i class="fa fa-copyright" aria-hidden="true"></i> 2021 <a href="../../../../../external.html?link=#">  The 7D Affiliates Limited (7D Group)</a></p>
                        </div>
                        <div class="col-lg-6 col-sm-5 text-right copy-right-txt">
                            <p>All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- COPY_RIGHT AREA END -->

    <!-- JavaScript -->
    <!-- <script src="js/jquery-3.3.1.min.js"></script> -->
    <script src="{{ asset('asset/js/jquery-3.3.1.min.js') }}"></script>
{{--    <script src="{{ asset('asset/js/jquery.min.js') }}"></script>--}}
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/js/slick.min.js') }}"></script>
    <script src="{{ asset('asset/js/venobox.min.js') }}"></script>
    <script src="{{ asset('asset/js/lightbox.min.js') }}"></script> -->
    <script src="{{ asset('asset/js/counterup.min.js') }}"></script>
    <script src="{{ asset('asset/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.dataTables.yadcf.js') }}"></script>
    <script src="{{ asset('asset/js/clipboard.min.js') }}"></script>
    <script src="{{ asset('asset/js/custom.js') }}"></script>


    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
      //  $(".select2").select2();


        // $('.date').datepicker({
        //     format: "dd-mm-yyyy",
        //     // viewMode: "months",
        //     // minViewMode: "months",
        //     toggleActive: true,
        //     autoclose:!0,
        //     todayHighlight:!0
        // });
        // $('#time').datetimepicker({
        //     format: 'hh:mm'
        // });

        new ClipboardJS('.btnn');

        $('.btnn').click(function () {
            // alert('clicked 1');

            //toastr.success('Text copied!', 'success');

            Toastify({
                text: "text copied.",
                duration: 3000,
               // close: true,
                gravity: "top", // `top` or `bottom`
                position: "left", // `left`, `center` or `right`
                backgroundStyle: "linear-gradient(to right, #00b09b, #96c93d)",
                stopOnFocus: true, // Prevents dismissing of toast on hover
                onClick: function(){
                    alert('clicked');
                } // Callback after click
            }).showToast();
        });



    </script>

    @yield('script')
    @yield('other_script')
</body>


<!-- Mirrored from epiktheme.com/demos/html/Gamix-Preview/demos/index.html by HTTrack Website Copier/3.x [XR&CO'2017], Fri, 15 Oct 2021 11:06:07 GMT -->
</html>
