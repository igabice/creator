@extends('layouts.plainapp')

@section('content')

    <!-- Content area -->
    <div class="row align-items-center">
        <div class="col-12">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2> <b> You have successfully accepted the reservation for this show. </b></h2>
                        <ol class="breadcrumb mb-0">
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
                    <div class="row">
                        <div class="col-6">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td>Title:</td><th> {{$data->name  }}</th>
                                </tr>
                                <tr>
                                    <td>Host:</td><th> {{$data->getHost()  }}</th>
                                </tr>
                                <tr>
                                    <td>Guest:</td><th> {{$data->getGuest()  }}</th>
                                </tr>
                                <tr>
                                    <td>Guest Status:</td><th> {{$data->guest_status  }}</th>
                                </tr>
                                <tr>
                                    <td>Date:</td><th> {{$data->date  }}</th>
                                </tr>
                                @if(!is_null($data->date_created))
                                    <tr>
                                        <td>Created Date:</td><th> {{$data->date_created  }}</th>
                                    </tr>
                                @endif
                            </table>
                        </div>
                        <div class="col-6">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td>Show Start:</td><th> {{$data->start_time  }}</th>
                                </tr>
                                <tr>
                                    <td>Show Ends:</td><th> {{$data->end_time  }}</th>
                                </tr>
                                <tr>
                                    <td>Location:</td><th> {{$data->studio}}</th>
                                </tr>

                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <script>
            $(".select2").select2();


        </script>

        <!-- /content area -->
@endsection
