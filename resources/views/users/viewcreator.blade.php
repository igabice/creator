@extends('layouts.app')

@section('content')

    <!-- Content area -->
    <div class="row align-items-center">
        <div class="col-12">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>{{$user->name  }} {{$user->middle_name  }} {{$user->last_name  }} <small> ({{$user->getRole()  }}) </small></h2>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">User </a></li>
                            <li class="breadcrumb-item active">Detail</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <table class="table table-bordered" width="100%">

                                            <tr>
                                                <td>Image:</td>
                                                <td>
                                                    @if($user->image != null)
                                                        <a href="{{$user->image}}" data-fancybox="gallery">
                                                            view image
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ID Card:</td>
                                                <th> @if(auth()->user()->id_card)
                                                        <a href="{{ auth()->user()->id_card}}" ><h4>click to view document</h4></a>
                                                    @endif
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>Email:</td><th> {{$user->email  }}</th>
                                            </tr>
                                            <tr>
                                                <td>Phone:</td><th> {{$user->phone  }}</th>
                                            </tr>
                                            <tr>
                                                <td>Address:</td><th> {{$user->address  }}</th>
                                            </tr>
                                            <tr>
                                                <td>Wallet Balance:</td><th> {{$user->getWallet()  }}</th>
                                            </tr>
                                            <tr>
                                                <td>Bank:</td><th> {{$user->bank  }}</th>
                                            </tr>
                                            <tr>
                                                <td>Account Name:</td><th> {{$user->account_name  }}</th>
                                            </tr>
                                            <tr>
                                                <td>Account Number:</td><th> {{$user->account_number  }}</th>
                                            </tr>

                                            @if(!is_null($user->date_created))
                                                <tr>
                                                    <td>Created Date:</td><th> {{$user->date_created  }}</th>
                                                </tr>
                                            @endif
                                        </table>
                </div>

            <div class="col-md-7">
                <div class="col">
                    <h4>Products</h4>
                    <div class="col-sm-6">
                      </div>
{{--                    <div class="col-sm-6">--}}
{{--                        <a href="/create-product" class="btn btn-primary waves-effect waves-light">--}}
{{--                            <i class="fas fa-user-plus mr-2"></i> Add Products--}}
{{--                        </a>--}}
{{--                    </div>--}}
                    <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            {{--                <th>Image</th>--}}
                            <th>Name</th>
                            <th>Price</th>
                            <th>Commission</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $object)
                            <tr>
                                {{--                    <td>{{ $object->image}} </td>--}}
                                <td>{{ $object->name}} </td>
                                <td>{{ $object->price}} </td>
                                <td>{{ $object->commission}} </td>
                                <td>
                                    <a class="btn btn-outline-warning btn-sm" data-index="{{$loop->iteration -1}}"  data-toggle="modal" data-target="#make-campaign"> add campaign  </a>
                                @if(Auth::user()->role == 'M')
                                        @endif

                                    @if(Auth::user()->id == $user->id)
                                            <form  action='/products/{{$object->id}}' method="POST">
                                                @method('DELETE')
                                                {{csrf_field()}}
                                                {{--<button type="submit" class="btn btn-danger"> X </button>--}}
                                            </form>
                                            <a class="btn btn-outline-primary btn-sm" href="make-campaign {{ route('products.edit', $object->id) }}"> Edit  </a>
                                            <a class="btn btn-outline-success btn-sm" href="{{ route('products.show', $object->id) }}"> View</a>
                                        @endif

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
            </div>

    </div>

        <div id="make-campaign" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{url('/campaign')}}" method="post">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myModalLabel">Create campaign for this product?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body" id="main-content">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                        </div>
                    </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
        </div>
    </div>

    <script>
       // $(".select2").select2();

       // $(document).ready(function() {

            var app = @json($data);

            $('#make-campaign').on('shown.bs.modal', function (e) {
                var i = $(e.relatedTarget).data('index');
                console.log(i);
                $("#main-content")
                    .html('<table class="table table-bordered table-striped"><tr><td>Name:</td><th>'+ app[i].name  +'</th></tr>'+
                        '<tr><td>Price:</td><th>'+ app[i].price  +'</th></tr>\n' +
                        '<tr><td>Commission:</td><th>'+ app[i].commission +'</th></tr>\n' +
                        '<input type="hidden" name="product_id" value="'+ app[i].id +'">' +
                        '<input type="hidden" name="user_id" value="{{Auth::user()->id}}">' +
                        '\n' +
                        '                            </table>');
                    //.html('<div class="box3">' + app[i].name + '<br>' + '</div>');
            });

       // })


        // function func(data) {
        //     $('#make-campaign').on('shown.bs.modal', function (e) {
        //     var i = $(e.relatedTarget).data('index');
        //     console.log(i);
        //     $("#main-content").html('<div class="box3">' + data[0].name + '<br>' + '</div>');
        // })
        // }

    </script>

    <!-- /content area -->
@endsection
