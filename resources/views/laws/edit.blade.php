@extends('layouts.app')

@section('content')

    <!-- Content area -->
    <div class="row align-items-center">
        <div class="col-12">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Update <b> Law</b></h2>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"> Law</a></li>
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
                    <form class="form-horizontal" method="POST" action="{{ url('/laws-update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input value="{{$data->id}}" name="id" type="hidden"/>

                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input value="{{$data->title}}" id="title" type="text" class="form-control @if($errors->has('title')) is-invalid @endif" name="title" maxlength="50" required autocomplete="title" autofocus>

                                                    @if($errors->has('title'))
                                                        <span class="text-danger">
                                                        <strong>{{ $errors->first('title') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="other_names">Long Title</label>
                                                    <input value="{{$data->long_title}}" id="long_title" type="text" class="form-control @if($errors->has('long_title')) is-invalid @endif" name="long_title" required autocomplete="long_title" autofocus>

                                                    @if($errors->has('long_title'))
                                                        <span class="text-danger">
                                                        <strong>{{ $errors->first('long_title') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="other_names">Title</label>
                                                    <input value="{{$data->title}}" id="title" type="text" class="form-control @if($errors->has('title')) is-invalid @endif" name="title" required autocomplete="title" >

                                                    @if($errors->has('title'))
                                                        <span class="text-danger">
                                                        <strong>{{ $errors->first('title') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="other_names">Description</label>
                                                    <input value="{{$data->description}}" id="description" type="text" class="form-control @if($errors->has('description')) is-invalid @endif" name="description"  autocomplete="description" >

                                                    @if($errors->has('description'))
                                                        <span class="text-danger">
                                                        <strong>{{ $errors->first('description') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Downloadable?</label>
                                                    <select name="status" id="status" required class="form-control  select2">
                                                        <option value="no" @if($data->status == 'no') selected @endif>No</option>
                                                        <option value="free" @if($data->status == 'free') selected @endif>Yes (Free)</option>
                                                        <option value="paid" @if($data->status == 'paid') selected @endif>Yes (Not-Free)</option>
                                                    </select>
                                                    @if($errors->has('status'))
                                                        <span class="text-danger">
                                                <strong>{{ $errors->first('status') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="other_names">Price</label>
                                                    <input value="{{$data->price}}" id="price" type="text" class="form-control @if($errors->has('price')) is-invalid @endif" name="price" required autocomplete="price" >

                                                    @if($errors->has('price'))
                                                        <span class="text-danger">
                                                        <strong>{{ $errors->first('price') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="form-group label-floating  ">
                                                    <label class="control-label">WORD Doc. </label>
                                                    <input class="form-control" name="word" id="word"  type="file" />
                                                    @if(!empty($data->word))
                                                        <a href="{{url('/').$data->word}}" >view</a>
                                                    @endif
                                                </div>
                                                <div class="form-group label-floating  ">
                                                    <label class="control-label">PDF format </label>
                                                    <input class="form-control" name="pdf" id="pdf"  type="file" />
                                                    @if(!empty($data->pdf))
                                                        <a href="{{url('/').$data->pdf}}" >view</a>
                                                    @endif
                                                </div>
                                                <div class="form-group label-floating  ">
                                                    <label class="control-label">JSON Format </label>
                                                    <input class="form-control" name="json" id="json"  type="file" />
                                                    @if(!empty($data->json))
                                                        <a href="{{url('/').$data->json}}" >view</a>
                                                    @endif
                                                </div>
                                                <div class="form-group label-floating  ">
                                                    <label class="control-label">Short WORD </label>
                                                    <input class="form-control" name="short_word" id="short_word"  type="file" />
                                                    @if(!empty($data->short_word))
                                                        <a href="{{url('/').$data->short_word}}" >view</a>
                                                    @endif
                                                </div>

{{--                                                <div class="form-group">--}}
{{--                                                    <label for="enactment">Enactment</label>--}}
{{--                                                    <input value="{{$data->enactment}}" id="enactment" type="text" class="form-control @if($errors->has('enactment')) is-invalid @endif" name="enactment"  autocomplete="enactment" >--}}

{{--                                                    @if($errors->has('enactment'))--}}
{{--                                                        <span class="text-danger">--}}
{{--                                                            <strong>{{ $errors->first('enactment') }}</strong>--}}
{{--                                                        </span>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
                                                <div class="form-group">
                                                    <label for="date_published">Date Published</label>
                                                    <input value="{{$data->date_published}}" id="date_published" type="text" class="form-control @if($errors->has('date_published')) is-invalid @endif" name="date_published"  autocomplete="date_published" >

                                                    @if($errors->has('date_published'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('date_published') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
{{--                                                <div class="form-group">--}}
{{--                                                    <label for="citation">Citation</label>--}}
{{--                                                    <input value="{{$data->citation}}" id="citation" type="text" class="form-control @if($errors->has('citation')) is-invalid @endif" name="citation" required autocomplete="citation" >--}}

{{--                                                    @if($errors->has('citation'))--}}
{{--                                                        <span class="text-danger">--}}
{{--                                                        <strong>{{ $errors->first('citation') }}</strong>--}}
{{--                                                    </span>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}

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

    <script>
        $(".select2").select2();
        // $('select[name="role_level"]').on('change', function(){
        //     $('select[name="store_id"]').html('');
        //     var level=$(this).val();
        //     if(level=="")return;
        //     $.LoadingOverlay("show");
        //     $.ajax({
        //         type: "GET",
        //         url: "/getstores/"+level
        //     }).done(function(data){
        //
        //         if(data.length<1){
        //             alert("There is no unit in the selected location");
        //             $('select[name="store_id"]').html('');
        //             var ss="<option value=''></option>";
        //             $('select[name="store_id"]').append(ss);
        //
        //             $.LoadingOverlay("hide");
        //             return;
        //         }
        //
        //         var ss="<option value=''></option>";
        //         $('select[name="store_id"]').append(ss);
        //         $.each(data, function(i, item){
        //             var ss="<option value='"+item.id+"'>"+item.name+"</option>";
        //             $('select[name="store_id"]').append(ss);
        //         });
        //
        //         $.LoadingOverlay("hide");
        //
        //     });
        // });

    </script>

    <!-- /content area -->
@endsection
