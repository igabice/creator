@extends('layouts.app')

@section('content')

    <!-- Content area -->
    <div class="row align-items-center">
        <div class="col-12">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>NEW <b> Notification </b></h2>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Notification </a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form class="form-horizontal" method="POST" action="{{ url('/posts') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">

                                                <div class="form-group">
                                                    <label for="other_names">Title</label>
                                                    <input value="{{old('title')}}" id="title" type="text" class="form-control @if($errors->has('title')) is-invalid @endif" name="title" required autocomplete="title" autofocus>

                                                    @if($errors->has('title'))
                                                        <span class="text-danger">
                                                        <strong>{{ $errors->first('title') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                                <input type="hidden" name="created_by" value="{{Auth::user()->id}}">
                                                <div class="form-group">
                                                    <label for="content">Description</label>
                                                    <textarea name="content" class="form-control">{{old('content')}}</textarea>
                                                    @if($errors->has('content'))
                                                        <span class="text-danger">
                                                        <strong>{{ $errors->first('content') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group row m-t-20">
                                        <div class="col-sm-6">

                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">SUBMIT</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/tinymce/tinymce.min.js"></script>
    {{--<script src="{{ asset('js/ .min.js') }}"></script>--}}


    <script>
        // $(".select2").select2();

        tinymce.init({
            selector : "textarea",
            height : "480",
            plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
            toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
        });

    </script>

    <!-- /content area -->
@endsection
