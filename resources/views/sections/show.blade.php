@extends('layouts.app')

@section('content')

@section('css')
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('script')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
@endsection


<!-- Content area -->
<div class="row align-items-center">
    <div class="col-12">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2> <b> Law > {{$data->getLaw()->title}}</b></h2>
                    <ol class="breadcrumb mb-0">
{{--                        <li class="breadcrumb-item ">{{$data->getState() }} State</li>--}}
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Law </a></li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    @if($data->section_type == 'section')
                        <a href="/create-sections?law_id={{$data->law_id}}&section={{$data->id}}&type=sub-section" class="btn btn-primary waves-effect waves-light">
                            <i class="fas fa-plus mr-2"></i> Add Sub-Section
                        </a>
                        <a href="#" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#upload-section">
                            <i class="fas fa-upload mr-2"></i> Upload Sub-Section
                        </a>
                    @elseif($data->section_type == 'sub-section')
                        <a href="/create-sections?law_id={{$data->law_id}}&section={{$data->id}}&type=sub-paragraph" class="btn btn-primary waves-effect waves-light">
                            <i class="fas fa-plus mr-2"></i> Add Sub-Paragraph
                        </a>
                        <a href="#" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#upload-section">
                            <i class="fas fa-upload mr-2"></i> Upload Sub-Paragraph
                        </a>
                    @endif


                    {{-- <a href="{{route('user_edit',0)}}" class="btn btn-primary waves-effect waves-light new-user"><i class="ion ion-md-add-circle"></i> <span>Add User</span></a> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <table class="table table-bordered table-striped">

                            <tr>
                                <td>Caption:</td><th> {{$data->caption}}</th>
                            </tr>
                            <tr>
                                <td>Content:</td><th> {{$data->content}}</th>
                            </tr>

                        </table>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        @if($data->section_type == 'section')
                            <h4>Sub-Sections ({{$data->getSubCount() }})</h4>
                        @elseif($data->section_type == 'sub-section')
                            <h4>Sub-Paragraph ({{$data->getSubCount() }})</h4>

                        @endif
                        <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                @if($data->section_type == 'sub-section')
                                <th>Paragraph</th>
                                @endif
                                <th>Caption</th>
                                {{--                                    <th>Content</th>--}}
                                    @if($data->section_type == 'section')
                                        <th>Sub Sections</th>
                                    @elseif($data->section_type == 'sub-section') <th>Sub Paragraph</th>
                                    @endif
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data->getSubSections() as $object)
                                <tr>
                                    @if($data->section_type == 'sub-section')
                                        <td>{{ $object->sub_paragraph}} </td>
                                    @endif
                                    <td>@if($object->caption) {{$object->caption}} @else Section {{$loop->iteration}} @endif</td>
                                    {{--                                            <td>{{ $object->content}} </td>--}}
                                    <td>{{ $object->getSubCount()}} </td>
                                    <td>
                                        {{--                                                <form  action='/sections/{{$object->id}}' method="POST">--}}
                                        {{--                                                    @method('DELETE')--}}
                                        {{--                                                    {{csrf_field()}}--}}
                                        {{--<button type="submit" class="btn btn-danger"> X </button>--}}
                                        <a class="btn btn-outline-primary btn-sm" href="{{ route('sections.edit', $object->id) }}"> Edit  </a>
                                        <a class="btn btn-outline-success btn-sm" href="{{ route('sections.show', $object->id) }}"> View</a>
                                        {{--                                                </form>--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<div id="upload-section" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{url('/upload-sections')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Upload
                        @if($data->section_type == 'section') Sub-Section @elseif($data->section_type == 'sub-section') Sub-Paragraph @endif
                         File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>
                            Upload a  file in the order of Title, Long Title, Citation, Enactment and Date Published
                        </label>
                        <a href="/section-upload-file.xls" class="btn btn-success waves-effect waves-light">Download Format File</a>
                        <br>
                        <br>
                        <input type="file" class="filestyle" name="upload_file" data-buttonname="btn-secondary" required>
                        <input name="section" type="hidden" value="{{$data->id}}">
                        @if($data->section_type == 'section')
                            <input name="section_type" type="hidden" value="sub-section">
                        @elseif($data->section_type == 'sub-section')
                            <input name="section_type" type="hidden" value="sub-paragraph">
                        @endif
                        <input name="law_id" type="hidden" value="{{$data->law_id}}">



                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Upload</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div>


<script>
    $(function () {
        $('#dataTable').DataTable({
            serverSide: false,
            processing: false,
            responsive: false,
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
        $('#dataTable1').DataTable({lengthChange: false,});



    });
</script>
<!-- /content area -->
@endsection

