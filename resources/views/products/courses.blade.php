@extends('layouts.app')

@section('content')

@section('css')
    <link href='plugins/datatables/dataTables.bootstrap4.min.css' rel="stylesheet" type="text/css" />
    <link href='plugins/datatables/buttons.bootstrap4.min.css' rel="stylesheet" type="text/css" />
    <link href='plugins/datatables/responsive.bootstrap4.min.css' rel="stylesheet" type="text/css" />
@endsection

@section('script')
    <script src='plugins/datatables/jquery.dataTables.min.js'></script>
    <script src='plugins/datatables/dataTables.bootstrap4.min.js'></script>
    <script src='plugins/datatables/dataTables.buttons.min.js'></script>
    <script src='plugins/datatables/buttons.bootstrap4.min.js'></script>
    <script src='plugins/datatables/dataTables.responsive.min.js'></script>
    <script src='plugins/datatables/responsive.bootstrap4.min.js'></script>
@endsection

<!-- Content area -->
<div class="row align-items-center">
    <div class="col-12">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Courses <b></b></h2>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Courses</li>
                    </ol>
                </div>
                @if(auth()->user()->role == 'A')
                <div class="col-sm-6">
                    <a href="/create-product?type=course" class="btn btn-primary waves-effect waves-light">
                         Add Course
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">

            <div class="row">
            @foreach($data as $object)


                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-30">
                    <div class="card rounded bg-white h-100 text-center" style="padding: 30px 20px">
                        <a href="{{$object->link}}" class="text-center">
                            <img src="{{$object->image ?? 'images/noimage.jpeg'}}"
                                 alt="{{$object->name}}"
                                 title="{{$object->name}}"
                                 class="img-fluid rounded">
                        </a>
                        <div class="iCard-content p-1 pt-15 pb-15">
                            <h5 class="shop-thumb__title">
                                {{$object->name}}
                                
                                @if(auth()->user()->role == 'A')
                                <a class="btn btn-sm btn-warning" href="/products/{{$object->id}}/edit">edit</a>
                                @endif
                            </h5>
                            
                        </div>
                    </div>
                </div>


            @endforeach
            </div>
    
    </div>
</div>


<script>
    $(function () {
        $('#dataTable').DataTable({
            serverSide: false,
            processing: false,
            responsive: true,
            lengthChange: false,
            
        });

    });
</script>
<!-- /content area -->
@endsection
