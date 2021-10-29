@extends('backpack::layout')
@section('title')

@stop
@section('header')
    <section class="content-header">
        <h1>
            Meter Model<small> Edit </small>
        </h1>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-sm-6 col-md-offset-2 col-sm-offset-3">
            <div class="box box-default">
                <div class="box-header with-border">
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
                    <form action="/meter-model/update/" method="POST">
                        <input type="text" name="id" id="id" value="{{$data->id}}" hidden class="form-control hidden">
                        {{csrf_field()}}
                        <div class="form-group  ">
                            <label for="title">Name</label>
                            <input type="text" name="name" id="name" value="{{$data->name}}" class="form-control">
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

            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

            demo.initVectorMap();

        });

        $('select[name="urolelevel"]').on('change', function(){
            $('select[name="ustoreid"]').html('');
            var level=$(this).val();
            if(level=="")return;
            $.ajax({
                type: "GET",
                url: "/getstores/loc/"+level
            }).done(function(data){
                $(".selectpicker").selectpicker();
                if(data.length<1){
                    eModal.alert("There is no service unit in the selected location");
                    $('select[name="ustoreid"]').html('');
                    var ss="<option disabled value=''>Select service unit</option>";
                    $('select[name="ustoreid"]').append(ss);
                    $(".selectpicker").selectpicker('refresh');
                    return;
                }
                eModal.alert("service units loaded");
                var ss="<option disabled value=''>Select service unit</option>";
                $('select[name="ustoreid"]').append(ss);
                $.each(data, function(i, item){
                    var ss="<option value='"+item.id+"'>"+item.name+", "+item.location+"</option>";
                    $('select[name="ustoreid"]').append(ss);
                });
                $(".selectpicker").selectpicker('refresh');
            });
        });

    </script>
    <!-- CRUD LIST CONTENT - crud_list_scripts stack -->
    {{--@stack('crud_list_scripts')--}}
@endsection
