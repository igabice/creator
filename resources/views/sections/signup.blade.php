@extends('backpack::layout_guest')

@section('header')
    {{--<section class="content-header">--}}
        {{--<h1>--}}
            {{--User<small> Create</small>--}}
        {{--</h1>--}}
    {{--</section>--}}
@endsection


@section('content')
    <div class="row">
        <div class="col-md-8 col-sm-6 col-md-offset-2 col-sm-offset-3">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h2>Sign Up</h2>
                </div>
                <div class="box-body ">
                    @if (count($errors) > 0)

                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form enctype="multipart/form-data" action={{url('/driver/')}} method="POST">
                        {{csrf_field()}}

                        <div class="form-group  ">
                            <label for="firstname">Firstname</label>
                            <input type="text" name="firstname" id="firstname" class="form-control">
                        </div>
                        <div class="form-group  ">
                            <label for="lastname">Lastname</label>
                            <input type="text" name="lastname" id="name" class="form-control">
                        </div>

                        <div class="form-group label-floating  ">
                            <label class="control-label">Phone No</label>
                            <input class="form-control" name="phone" id="phone" type="text" required/>
                        </div>
                        <div class="form-group label-floating  ">
                            <label class="control-label">Email</label>
                            <input class="form-control" name="email" id="email" type="text" required/>
                        </div>
                        <div class="form-group">
                            <label for="body">Address</label>
                            <input  name="address" id="address" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="body">Password</label>
                            <input  name="password" id="password" type="password" required class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="body">Confirm Password</label>
                            <input  name="password1" id="password1" type="password" required class="form-control" />
                        </div>
                        <div  class=" ">
                            <button type="submit " class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('after_styles')
    @stack('crud_list_styles')
@endsection

@section('after_scripts')

    <script type="text/javascript">
        $(document).ready(function() {

        });


    </script>
    <!-- CRUD LIST CONTENT - crud_list_scripts stack -->
    {{--@stack('crud_list_scripts')--}}
@endsection
