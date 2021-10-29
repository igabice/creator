<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top" id="navber">
    <div class="container">
{{--        <a class="navbar-brand" href="/">7DC<span>.</span></a>--}}
        <img src="{{asset('asset/images/logo/7dcplain.png')}}" style="max-height: 100px" />
        <div class="menu-main" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto menu-item">

                <li class="nav-item">
                    <a class="nav-link nl-m-top account-icon" href="/"><i>Home</i></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nl-m-top account-icon" href="/courses"><i>Courses</i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nl-m-top account-icon" href="/"><i>Coaches</i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nl-m-top account-icon" href="/blog"><i>Blog</i></a>
                </li>

                @if(auth()->user() != null)
                <li class="nav-item">
                    <a class="nav-link nl-m-top account-icon" href="/account"><i>Account</i></a>
                </li>
                    {{--
                    <li class="nav-item">
                        <a class="nav-link nl-m-top account-icon" href="/cart"><i>Cart</i></a>
                    </li>
                    --}}

                @else
                    <li class="nav-item">
                        <a class="nav-link nl-m-top account-icon" href="/login"><i>Login</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nl-m-top account-icon" href="/register"><i>SignUp</i></a>
                    </li>

                @endif

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link nl-m-top abc mobile-content-hide"><i class="fa fa-search" aria-hidden="true"></i></a>--}}
{{--                    <div class="search top-search">--}}
{{--                        <button type="button" class="close fix-close">×</button>--}}
{{--                        <form>--}}
{{--                            <input type="search" value="" placeholder="Search Here" />--}}
{{--                            <button type="submit" class="btn btn-primary">Search</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </li>

                <li class="nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <input type="submit" style="color: goldenrod; margin-left: 10px; background-color: black" class="nav-link nl-m-top btn-outline-warning btn-sm" href="/logout" value="Logout">
                    </form>
                </li>
                --}}
                <li class="nav-item">
                    <a class="nav-link menu-icon"><i class="fa fa-bars" aria-hidden="true"></i> </a>
                </li>


            </ul>
        </div>
    </div>





            <div class="custom-menubar">
                <ul class="nav-link-block">

                    <li >
                        <a class="menu-link" href="/"><i>Home</i></a>
                    </li>

                    <li >
                        <a class="menu-link" href="/courses"><i>Courses</i></a>
                    </li>
                    <li >
                        <a class="menu-link" href="/"><i>Coaches</i></a>
                    </li>
                    <li >
                        <a class="menu-link" href="/blog"><i>Blog</i></a>
                    </li>

                    @if(auth()->user() != null)
                        <li >
                            <a class="menu-link" href="/account"><i>Account</i></a>
                        </li>
                       {{--
                        <li >
                            <a class="menu-link" href="/cart"><i>Cart</i></a>
                        </li>
                        --}}

                    @else
                        <li >
                            <a class="menu-link" href="/login"><i>Login</i></a>
                        </li>
                        <li >
                            <a class="menu-link" href="/register"><i>SignUp</i></a>
                        </li>

                    @endif

                    @if(auth()->user() != null)
                    @if(auth()->user()->role == 'A')
                    <li>
                        <a href="/users" class="menu-link">Manage Users</a>
                    </li>
                    <li>
                        <a href="/courses" class="menu-link">Manage Courses</a>
                    </li>
                    <li>
                        <a class="menu-link" href="/all-payouts" >Manage Payouts</a>
                        {{--                data-target="#contact-model-large"--}}
                    </li>

                        @endif
                    @endif
                    @if(auth()->user() != null)
                        <li >
                            <form action="/logout" method="post">
                                @csrf
                                <input type="submit" style="color: goldenrod; margin-left: 10px; background-color: black" class="nav-link nl-m-top btn-outline-warning btn-sm" href="/logout" value="Logout">
                            </form>
                        </li>
                    @endif
                </ul>


                <ul class="responsive-nav">
                    @if(auth()->user() != null)
                        <li >
                            <form action="/logout" method="post">
                                @csrf
                                <input type="submit" style="color: goldenrod; margin-left: 10px; background-color: black" class="nav-link nl-m-top btn-outline-warning btn-sm" href="/logout" value="Logout">
                            </form>
                        </li>
                        @endif
                </ul>
{{--                    <li>--}}
{{--                        <a class="nav-link nl-m-top abc"><i class="fa fa-search" aria-hidden="true"></i></a>--}}
{{--                        <div class="search top-search">--}}
{{--                            <button type="button" class="close fix-close">×</button>--}}
{{--                            <form>--}}
{{--                                <input type="search" value="" placeholder="Search Here" />--}}
{{--                                <button type="submit" class="btn btn-primary">Search</button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a class="nav-link cart nl-m-top" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-shopping-bag" aria-hidden="true"></i><span>2</span></a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a class="nav-link nl-m-top" href="/login"><i class="fa fa-user" aria-hidden="true"></i></a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a class="nav-link nl-m-top" href="/register"><i class="fa fa-user" aria-hidden="true"></i></a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
                <div class="menu-close">
                    <a class="hide-menu-btn"><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>
            </div>


</nav>

