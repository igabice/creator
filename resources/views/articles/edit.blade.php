@extends('layouts.app')

@section('content')

    <!-- Content area -->
    <div class="row align-items-center">
        <div class="col-12">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Update <b> Articles</b></h2>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"> Articles</a></li>
                            <li class="breadcrumb-item active">edit</li>
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
                    <form class="form-horizontal" method="POST" action="{{ url('/articles-update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-8">
                                                <input name="id" type="hidden" value="{{$data->id}}">
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input value="{{$data->title}}" id="title" type="text" class="form-control @if($errors->has('title')) is-invalid @endif" name="title"  autocomplete="title" >
                                                    @if($errors->has('title'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('title') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                
                                                <div class="form-group">
                                                    <label for="other_names">Description</label>
                                                    <textarea name="description" class="form-control">{{$data->description}}</textarea>

                                                    @if($errors->has('description'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group row m-t-20">
                                            <div class="col-sm-4">

                                            </div>
                                            <div class="col-sm-6 text-right">
                                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">SUBMIT</button>
                                            </div>
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
    <script src="/js/tinymce/tinymce.min.js"></script>
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

    <!-- /title area -->
@endsection
