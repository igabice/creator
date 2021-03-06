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
                    <h2>Assets <b></b></h2>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Media Assets</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">

        <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

            <tbody>


<div class="row">
    
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-30">
                    <div class="card rounded bg-white h-100 text-center" style="padding: 30px 20px">
                        <a href="/images/AFFILIATENG7D.jpg" download class="text-center">
                            <img src="/images/AFFILIATENG7D.jpg"
                                 alt="Bootstrap shopping cart table example"
                                 title="Bootstrap shopping cart table example"
                                 class="img-fluid rounded">
                        </a>
                        <div class="iCard-content p-1 pt-15 pb-15">
                            <div class="pt-15 b-t text-right">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <a href="/images/AFFILIATENG7D.jpg" download class="btn btn-warning btn-icon btn-icon-right ">
                                            <i class="fa fa-plus"></i> Download  Flyer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-30">
                    <div class="card rounded bg-white h-100 text-center" style="padding: 30px 20px">
                        <a href="/images/FAQs-FOR-AFFILIATEDNG.pdf" download class="text-center">
                            <img src="/images/AFFILIATENG7D.jpg"
                                 alt="Bootstrap shopping cart table example"
                                 title="Bootstrap shopping cart table example"
                                 class="img-fluid rounded">
                        </a>
                        <div class="iCard-content p-1 pt-15 pb-15">
                            <div class="pt-15 b-t text-right">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <a href="/images/FAQs-FOR-AFFILIATEDNG.pdf" download class="btn btn-warning btn-icon btn-icon-right ">
                                            <i class="fa fa-plus"></i> Download FAQ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-30">
                    <div class="card rounded bg-white h-100 text-center" style="padding: 30px 20px">
                        <a href="/images/affirmations.png" download class="text-center">
                            <img src="/images/affirmations.png"
                                 alt="Bootstrap shopping cart table example"
                                 title="Bootstrap shopping cart table example"
                                 class="img-fluid rounded">
                        </a>
                        <div class="iCard-content p-1 pt-15 pb-15">
                            <div class="pt-15 b-t text-right">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <a href="/images/affirmations.png" download class="btn btn-warning btn-icon btn-icon-right ">
                                            <i class="fa fa-plus"></i> Download Affirmations</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-30">
                    <div class="card rounded bg-white h-100 text-center" style="padding: 30px 20px">
                        <a href="/images/hashtags.png" download class="text-center">
                            <img src="/images/hashtags.png"
                                 alt="Bootstrap shopping cart table example"
                                 title="Bootstrap shopping cart table example"
                                 class="img-fluid rounded">
                        </a>
                        <div class="iCard-content p-1 pt-15 pb-15">
                            <div class="pt-15 b-t text-right">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <a href="/images/hashtags.png" download class="btn btn-warning btn-icon btn-icon-right ">
                                            <i class="fa fa-plus"></i> Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-30">
                    <div class="card rounded bg-white h-100 text-center" style="padding: 30px 20px">
                        <a href="/images/independence.jpg" download class="text-center">
                            <img src="/images/independence.jpg"
                                 alt="Bootstrap shopping cart table example"
                                 title="Bootstrap shopping cart table example"
                                 class="img-fluid rounded">
                        </a>
                        <div class="iCard-content p-1 pt-15 pb-15">
                            <div class="pt-15 b-t text-right">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <a href="/images/independence.jpg" download class="btn btn-warning btn-icon btn-icon-right ">
                                            <i class="fa fa-plus"></i> Download </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-30">
                    <div class="card rounded bg-white h-100 text-center" style="padding: 30px 20px">
                        <a href="/images/richest.jpg" download class="text-center">
                            <img src="/images/richest.jpg"
                                 alt="Bootstrap shopping cart table example"
                                 title="Bootstrap shopping cart table example"
                                 class="img-fluid rounded">
                        </a>
                        <div class="iCard-content p-1 pt-15 pb-15">
                            <div class="pt-15 b-t text-right">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <a href="/images/richest.jpg" download class="btn btn-warning btn-icon btn-icon-right ">
                                            <i class="fa fa-plus"></i> Download </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
</div>


            </tbody>
        </table>
    </div>
</div>


<script>
    $(function () {
        $('#dataTable').DataTable({
            serverSide: false,
            processing: false,
            responsive: true,
            lengthChange: false,
            {{--ajax: {--}}
            {{--// url: "{{route('load_user_data')}}",--}}
            {{--type: "POST",--}}
            {{--data:{ _token: "{{csrf_token()}}"},--}}
            {{--},--}}
            // columns: [
            //     {data: 'first_name'},
            //     {data: 'middle_name'},
            //     {data: 'last_name'},
            //     {data: 'email'},
            //     {data: 'phone'},
            //     {data: 'department_name', name:'departments.name'},
            //     {data: 'account_name', name:'account_types.name'},
            //     {data: 'role_name', name:'account_types.name'},
            //     {data: 'store_name', name:'stores.name'},
            //     {data: 'status_name',name:'status.name'},
            //     {data: 'action', orderable: false, searchable: false}
            // ]
        });

        // $('#dataTable').on('click', '.btn-delete[data-remote]', function (e)
        // {
        //     e.preventDefault();
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     var url = $(this).data('remote');
        //     // confirm then
        //     if (confirm('Are you sure you want to delete this?')) {
        //         $.ajax({
        //             url: url,
        //             type: 'DELETE',
        //             dataType: 'json',
        //             data: {method: '_DELETE', submit: true}
        //         }).always(function (data) {
        //             $('#dataTable').DataTable().draw(false);
        //         });
        //     } else
        //         alert("You have cancelled!");
        // });

    });
</script>
<!-- /content area -->
@endsection
