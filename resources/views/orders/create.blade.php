@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            Order<small> Create</small>
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
                    <form enctype="multipart/form-data" action={{url('/orders')}} method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Product: {{$product->name}}</label>
                        </div>
                        <div class="form-group">
                            <label>Price: {{$product->price}}</label>
                        </div>
                        <div class="form-group">
                            <label>Available Quantity: {{$product->quantity}}</label>
                        </div>
                        <div class="form-group">
                            <label>Unit: {{$product->unit}}</label>
                        </div>
                        <div class="form-group  ">
                            <label for="title">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>

                        {{-- <div  class=" ">
                            <textarea name="description" id="description"></textarea>
                        </div> --}}
                        <div  class=" ">
                            <button type="submit" class="btn btn-success">Submit</button>
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
