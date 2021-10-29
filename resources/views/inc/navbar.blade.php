

<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex logo-back">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{route('home')}}" class="logo logo-light">

                        <span class="logo-sm ">
                        {{-- <h3 class=" "><span style="color: #0d6e4e">AN</span></h3> --}}
                         <img src="{{ asset('images/logo-sm1.png') }}" alt="" height="35">
                    </span>
                    <span class="logo-lg">
{{--                        <h3 class=" "><span style="color: #0d6e4e">Affiliated</span>Ng</h3>--}}
                         <img src="{{ asset('images/aff.png') }}" alt="" height="60" width="200">
                    </span>
                </a>
            </div>


            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>

            {{--<li class="d-none d-sm-block">--}}
                {{--<div class="dropdown pt-3 d-inline-block">--}}
                    {{--<a class="btn btn-light" href="#">--}}
                        {{--{{ auth()->user()->email }}--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</li>--}}
        </div>

        <div class="d-flex main-side-menu">
            <!-- App Search-->
            <div class="dropdown d-inline-block d-lg-none ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                     aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <ul class="navbar-right d-flex list-inline float-right mb-0">

                <!-- language-->
                <li class="dropdown notification-list d-none d-md-block">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false" style="color: white" >
                        Welcome, {{auth()->user()->username ?? auth()->user()->name}} ({{auth()->user()->email}}) <span class="mdi mdi-chevron-down"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right language-switch">
                        <a class="dropdown-item" href="{{url('/profile') }}"><i class="mdi mdi-account-circle m-r-5"></i> Update Profile</a>
                        <a class="dropdown-item text-danger"  onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="mdi mdi-power text-danger"></i> Logout</a>
                    </div>
                </li>

            </ul>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!--<img class="rounded-circle header-profile-user" width="128px" height="128px" src="{{ auth()->user()->getProfilePicture() ?? asset('assets/images/users/user-4.jpg')}}"-->
                    <!--     alt="">-->
                    {{auth()->user()->name != null ? auth()->user()->name[0] : ''}} {{auth()->user()->last_name != null ? auth()->user()->last_name[0] : ''}}
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <!-- <a class="dropdown-item" href="{{url('/profile') }}"><i class="mdi mdi-account-circle m-r-5"></i> Update Profile</a> -->

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger"  onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="mdi mdi-power text-danger"></i> Logout</a>
                </div>
            </div>


        </div>
    </div>
</header>
