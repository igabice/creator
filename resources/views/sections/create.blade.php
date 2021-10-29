@extends('layouts.app')

@section('content')

<!-- Content area -->
<div class="row align-items-center">
    <div class="col-12">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    @if(isset($_GET['type']))
                        @if($_GET['type'] == 'sub-section')
                            <h2>NEW <b> Sub-Section </b></h2>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Sub-Section </a></li>
                                <li class="breadcrumb-item active">Create</li>
                            </ol>
                        @elseif($_GET['type'] == 'section')
                            <h2>NEW <b> Section </b></h2>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Section </a></li>
                                <li class="breadcrumb-item active">Create</li>
                            </ol>
                        @elseif($_GET['type'] == 'sub-paragraph')
                            <h2>NEW <b> Sub-Paragraph </b></h2>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Sub-Paragraph </a></li>
                                <li class="breadcrumb-item active">Create</li>
                            </ol>
                        @endif
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <form class="form-horizontal" method="POST" action="{{ url('/sections') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            @if(isset($_GET['law_id']))

                                            <input type="hidden" value="{{$_GET['law_id']}}" name="law_id">
                                            @endif
                                            @if(isset($_GET['section']))

                                            <input type="hidden" value="{{$_GET['section']}}" name="section">
                                            @endif


                                                @if(isset($_GET['type']))
                                                    @if($_GET['type'] == 'sub-section')
                                                        <input type="hidden" value="sub-section" name="section_type">
                                                    @elseif($_GET['type'] == 'section')
                                                        <input type="hidden" value="section" name="section_type">
                                                    @elseif($_GET['type'] == 'sub-paragraph')
                                                        <input type="hidden" value="sub-paragraph" name="section_type">
                                                    @endif
                                                @endif
                                                @if(isset($_GET['type']))
                                                    @if($_GET['type'] == 'sub-paragraph')
                                                        <div class="form-group">
                                                            <label for="content">Paragraph</label>
                                                            <input value="{{old('sub_paragraph')}}" type="text" class="form-control @if($errors->has('sub_paragraph')) is-invalid @endif" name="sub_paragraph"  autocomplete="sub_paragraph" >
                                                            @if($errors->has('sub_paragraph'))
                                                                <span class="text-danger">
                                                        <strong>{{ $errors->first('sub_paragraph') }}</strong>
                                                    </span>
                                                            @endif
                                                        </div>
                                                    @endif
                                                @endif


                                            <div class="form-group">
                                                <label for="other_names">Caption</label>
                                                <input value="{{old('caption')}}" id="caption" type="text" class="form-control @if($errors->has('caption')) is-invalid @endif" name="caption" required autocomplete="caption" autofocus>

                                                @if($errors->has('caption'))
                                                    <span class="text-danger">
                                                        <strong>{{ $errors->first('caption') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="content">Content</label>
                                                <input value="{{old('content')}}" id="content" type="text" class="form-control @if($errors->has('content')) is-invalid @endif" name="content"  autocomplete="content" >
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
