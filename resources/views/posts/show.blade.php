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
                    <div class="col-sm-8">
                        <h2> <b> Law > {{$data->title}}</b></h2>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item ">{{$data->getState() }} State</li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Law </a></li>
                        </ol>
                    </div>
                    <div class="col-sm-4">
{{--                        <a href="/create-sections?law_id={{$data->id}}&type=section" class="btn btn-primary waves-effect waves-light">--}}
{{--                            <i class="fas fa-plus mr-2"></i> Add Withdrawal--}}
{{--                        </a>--}}
{{--                        <a href="/download-law/{{$data->id}}" class="btn btn-primary waves-effect waves-light">--}}
{{--                            <i class="fas fa-download mr-2"></i> Download Law--}}
{{--                        </a>--}}
                        <a href="#" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#upload-section">
                            <i class="fas fa-upload mr-2"></i> Upload Section
                        </a>
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
                                    <td>Title:</td><th> {{$data->title}}</th>
                                </tr>
                                <tr>
                                    <td>Long Title:</td><th> {{$data->long_title}}</th>
                                </tr>
                                <tr>
                                    <td>Description:</td><th> {{$data->description}}</th>
                                </tr>
{{--                                <tr>--}}
{{--                                    <td>Enactment:</td><th> {{$data->enactment}}</th>--}}
{{--                                </tr>--}}

                                <tr>
                                    <td>Date Published:</td><th> {{$data->date_published}}</th>
                                </tr>

                                @if(!is_null($data->date_created))
                                    <tr>
                                        <td>Created Date:</td><th> {{$data->date_created}}</th>
                                    </tr>
                                @endif
                            </table>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            {{--                                            {{url('/').$data->pdf}}--}}
                            @if(!empty(url('/').$data->pdf))

                                <iframe src='https://view.officeapps.live.com/op/embed.aspx?src={{url('/').$data->short_word}}'
                                        width='100%' height='400px' frameborder='0'>This is an embedded
                                    <a target='_blank' href='http://office.com'>Microsoft Office</a>
                                    document, powered by <a target='_blank' href='http://office.com/webapps'>Office Online</a>.
                                </iframe>
{{--                                <div id="example1"></div>--}}
                            @endif

{{--                            <iframe src="https://view.officeapps.live.com/op/view.aspx?src={{urlencode(url('/').$data->word)}}" frameborder="0" style="width:100%;min-height:640px;"></iframe>--}}

                            {{--                            <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>Caption</th>--}}
{{--                                    <th>Content</th>--}}
{{--                                    <th>Sub Sections</th>--}}
{{--                                    <th>Action</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach($sections as $object)--}}
{{--                                        <tr>--}}
{{--                                            <td>@if($object->caption) {{$object->caption}} @else Withdrawal {{$loop->iteration}} @endif</td>--}}
{{--                                            <td>{{ $object->content}} </td>--}}
{{--                                            <td>{{ $object->getSubCount()}} </td>--}}
{{--                                            <td>--}}
{{--                                                <form  action='/sections/{{$object->id}}' method="POST">--}}
{{--                                                    @method('DELETE')--}}
{{--                                                    {{csrf_field()}}--}}
{{--                                                    --}}{{--<button type="submit" class="btn btn-danger"> X </button>--}}
{{--                                        <a class="btn btn-outline-primary btn-sm" href="{{ route('sections.edit', $object->id) }}"> Edit  </a>--}}
{{--                                        <a class="btn btn-outline-success btn-sm" href="{{ route('sections.show', $object->id) }}"> View</a>--}}
{{--                                                </form>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
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
                    <h5 class="modal-title mt-0" id="myModalLabel">Upload Section File</h5>
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
                        <input type="file" class="filestyle" name="upload_file" data-buttonname="btn-secondary" required="">
                        <input name="law_id" type="hidden" value="{{$data->id}}">
                        <input name="section_type" type="hidden" value="section">
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
<script src="{{ asset('js/pdfobject.js') }}"></script>
<script>PDFObject.embed("{{url('/').$data->pdf}}", "#example1", {
        height: "800px",
        fallbackLink: "<p>This is a <a href='{{url('/').$data->pdf}}'>fallback link</a></p>",
        pdfOpenParams: { view: 'FitV', page: '2' }
    });</script>

        <script>
            $(function () {
                $('#dataTable').DataTable({
                    serverSide: false,
                    processing: false,
                    responsive: false,
                    lengthChange: false,

                });
                $('#dataTable1').DataTable({lengthChange: false,});



            });
        </script>
        <!-- /content area -->
@endsection

