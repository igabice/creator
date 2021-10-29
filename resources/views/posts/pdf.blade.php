<!DOCTYPE html>
<html lang="en">
<head>
    <title>LEGOOL </title>
    <!-- CSRF Token -->
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
{{--    <!-- App favicon -->--}}
{{--    <link type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">--}}
{{--    <link rel="shortcut icon" href="{{ asset('assets/images/logo-sm.png') }}">--}}
{{-- <link href="{{ asset('assets/libs/chartist/chartist.min.css') }}" rel="stylesheet"> --}}
{{--<!-- Icons Css -->--}}
{{--    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />--}}
{{--    <!-- App Css-->--}}
{{--    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />--}}
{{--    <link href="{{ asset('assets/css/main-style.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />--}}
{{--    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />--}}
{{--    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />--}}
{{--    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>--}}
    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body data-sidebar="dark">

<!-- Begin page -->
<div id="layout-wrapper">




    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <br><br>
                        <center><h3>{{$data->getState()}} State</h3></center>
                        <center><h1 style="color: steelblue">{{$data->long_title}} </h1></center>
                        <center><h5 >{{$data->long_title}} was published on {{$data->date_published}} </h5></center>

                    </div>

                    <div class="col-md-12">
                        <br><br>
                        <center><h3>Citation</h3></center>
                        <p style="text-align: justify">{{$data->citation}}</p>
                    </div>
                    <div class="col-md-12">
                        <br><br>
                        <center><h3>Enactment</h3></center>
                        <p style="text-align: justify">{{$data->enactment}}</p>
                    </div>

                    <div class="col-md-12">
                        <br><br>
                        <center><h3>Sections</h3></center>
                        <table class="table table-striped" style="border: 0px">
                            @foreach($data->sections as $section)
                                <tr>
                                    <td style="border: 0px" colspan="3"> <h5>Section {{$loop->iteration}}.</h5></td>
                                </tr>
                                <tr>
                                    <td style="border: 0px" colspan="3">{{$section->caption}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="border: 0px">{{$section->content}}</td>
                                </tr><br>
                                @foreach($section->sub_sections as $sub)
                                    <tr>
                                        <td width="20px" style="border: 0px"></td>
                                        <th  style="border: 0px; font-weight: bold" colspan="2"><b>Sub-section {{$loop->iteration}}.</b></th>
                                    </tr>
                                    <tr>
                                        <td width="20px" style="border: 0px"></td>
                                        <td style="border: 0px" colspan="2">{{$sub->caption}}</td>
                                    </tr>
                                    <tr>
                                        <td width="20px" style="border: 0px"></td>
                                        <td colspan="2" style="border: 0px">{{$sub->content}}</td>
                                    </tr><br>
                                    @foreach($sub->paragraphs as $sub)
                                        <tr>
                                            <td style="border: 0px"></td>
                                            <th width="100px" style="border: 0px; font-weight: bold"><b> Paragraph {{$loop->iteration}}.</b></th>
                                            <td style="border: 0px">{{$sub->caption}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2" style="border: 0px">{{$sub->content}}</td>
                                        </tr><br>
                                    @endforeach

                                @endforeach
                                <hr><br>
{{--                                <tr>--}}
{{--                                    <td>{{$loop->iteration}}</td>--}}
{{--                                    <td>{{$section->caption}}</td>--}}
{{--                                    <td>{{$section->content}}</td>--}}
{{--                                </tr>--}}
                            @endforeach
                        </table>

                    </div>
                </div>

                <table>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
{{--            {{$data}}--}}
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
<center>
    <span class="d-sm-inline-block"> Copyright (c) {{date('Y')}} Legool</span>

</center>
                </div>
            </div>
        </div>
    </footer>

    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->

{{--    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/assets/libs/moment/min/moment.min.js') }}"></script>--}}
    <!-- PLUGINS-->
{{-- <script>--}}
{{--        $(".select2").select2();--}}
{{--        // $(".dataTable").select2();--}}

{{--        $('.date').datepicker({--}}
{{--            format: "dd-mm-yyyy",--}}
{{--            // viewMode: "months",--}}
{{--            // minViewMode: "months",--}}
{{--            toggleActive: true,--}}
{{--            autoclose:!0,--}}
{{--            todayHighlight:!0--}}
{{--        });--}}

{{--    </script>--}}

</div>
</body>

</html>
