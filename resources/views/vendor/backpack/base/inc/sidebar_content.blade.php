<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
{{--<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>--}}
<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->

{{--<li class="treeview">--}}
    {{--<a href="#">--}}
        {{--<i class="fa fa-pie-chart"></i>--}}
        {{--<span>Company</span>--}}
        {{--<span class="pull-right-container">--}}
              {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
    {{--</a>--}}
    {{--<ul class="treeview-menu">--}}

    {{--</ul>--}}
{{--</li>--}}
<li><a href="{{ URL('driver') }}"><i class="fa fa-users"></i> Drivers</a></li>
@if (Auth::user()->user_type == "contractor")
    {{--backpack_auth()->user()->name  fa-circle-o --}}

@endif