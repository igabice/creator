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
                    @if($user->id_verified == 0 && auth()->user()->role == 'A')
                        <a class="btn btn-lg btn-primary" href="/approve/{{$user->id}}" title="verify user?">
                            Click to verify this user <i class="fa fa-check-circle" ></i>
                        </a>

                    @endif
                    
                    @if($user->is_kyc == 0 && auth()->user()->role == 'A')
                        <a class="btn btn-lg btn-primary" href="/approve-kyc/{{$user->id}}" title="verify KYC?">
                            Click to approve KYC details <i class="fa fa-check-circle" ></i>
                        </a>

                    @endif
                    
            
<br>
                    <table class="table table-bordered" width="100%">

                                            <tr>
                                                <td>Images:</td>
                                                <td>
                                                    @if($user->image != null)
                                                        <a href="{{$user->image}}" data-fancybox="gallery">
                                                            view image
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Email:</td><th> {{$user->email  }}</th>
                                            </tr>
                                            <tr>
                                                <td>ID Card:</td>
                                                <th> @if(auth()->user()->id_card)
                                                        <a href="{{ auth()->user()->id_card}}" >click to view document</a>
                                                    @endif
                                                </th>
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

                                            @if(!is_null($user->date_created))
                                                <tr>
                                                    <td>Created Date:</td><th> {{$user->date_created  }}</th>
                                                </tr>
                                            @endif
                                            @if(Auth::user()->role == 'A')
                                                <tr>
                                                    <td colspan="2">
                                                        <h4>Topup Wallet</h4>
                                                        <form class="form-horizontal" method="POST" action="{{ url('/topup-wallet') }}" enctype="multipart/form-data">
                                                            @csrf
                                                            <input value="{{$user->id}}" id="user_id" type="hidden" name="user_id">

                                                            <div class=" text-left ">
                                                                <div class="form-group">
                                                                    <label for="amount">Amount</label>
                                                                    <input  id="amount" type="number" class="form-control @if($errors->has('amount'))is-invalid @endif"
                                                                     name="amount" required >

                                                                    @if($errors->has('amount'))
                                                                        <span class="text-danger">
                                                        <strong>{{ $errors->first('amount') }}</strong>
                                                    </span>
                                                                    @endif
                                                                    
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label" for="role">Type</label>
                                                                        <div class="col-sm-9">
                                                                          <select name="type" id="type" required class="form-control">
                                                                            <option value="credit">Credit</option>
                                                                            <option value="debit">Debit</option>
                                                                        </select>
                                                                        @if($errors->has('id_type'))
                                                                            <span class="text-danger">
                                                                                <strong>{{ $errors->first('id_type') }}</strong>
                                                                            </span>
                                                                        @endif  
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">SUBMIT</button>
                                                            </div>
                                                        </form>

                                                    </td>
                                                </tr>
                                                
                                            @endif
                                        </table>
                                        
                                    <ul>
                                        @if($ref1)
                                        <a href = '/users/{{$ref1->id}}'>
                                            <li>
                                            {{$ref1->name}} {{$ref1->middle_name}} {{$ref1->last_name}}
                                        </li>
                                        </a>
                                        
                                        @endif
                                        @if($ref2 )
                                        <a href = '/users/{{$ref2->id}}'>
                                            <li>
                                            {{$ref2->name}} {{$ref2->middle_name}} {{$ref2->last_name}}
                                        </li>
                                        </a>
                                        
                                        @endif
                                        @if($ref3)
                                        <a href = '/users/{{$ref3->id}}'>
                                            <li>
                                            {{$ref3->name}} {{$ref3->middle_name}} {{$ref3->last_name}}
                                        </li>
                                        </a>
                                        
                                        @endif
                                    </ul>
                                    
                </div>

            <div class="col-md-7">
                <div class="col">
                    <h3>Campaigns</h3>
                    <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            {{--                <th>Image</th>--}}
                            <th> Product </th>
                            <th>Price</th>
                            <th>Commission</th>
                            <th>Date Added </th>
{{--                            <th>Action</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $object)
                            <tr>
                                {{--                    <td>{{ $object->image}} </td>--}}
                                <td><a href="/products/{{$object->product_id}}">{{ $object->name}}</a> </td>
                                <td>{{ $object->price}} </td>
                                <td>{{ $object->commission}} </td>
                                <td>{{ $object->created_at}} </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    
                    
                    <h4>Referrals</h4>
        <table id="dataTable2" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email Address</th>
                    <th>Phone No.</th>
                    <!--<th>Action</th>-->
                </tr>
            </thead>
            <tbody>
                @foreach($referrals as $user)
                    <tr>
                        <td>{{$user->name}}

                            @if($user->verified == 1)
                                <i class="fa fa-check-circle" style="color: green"></i> <small> team member</small>
                                @else
                                <i class="fa fa-ban" style="color: red"></i><small> prospect</small>
                           @endif
                        </td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <!--<td>-->
                        <!--    <form  action='/mills/{{$user->id}}' method="POST">-->
                        <!--        @method('DELETE')-->
                        <!--        {{csrf_field()}}-->
                        <!--        {{--<button type="submit" class="btn btn-danger"> X </button>--}}-->
                        <!--        @if(auth()->user()->role == 'A' || auth()->user()->id == $user->id)-->
                        <!--            <a class="btn btn-outline-primary btn-sm" href="{{ route('users.edit', $user->id) }}"> Edit  </a>-->
                        <!--        @endif-->

                        <!--        <a class="btn btn-outline-success btn-sm" href="{{ route('users.show', $user->id) }}"> View</a>-->

                        <!--    </form></td>-->
                    </tr>
                    @endforeach
            </tbody>

        </table>

                </div>
                
            

            </div>
            </div>

    </div>
    </div>

    <script>
        $(".select2").select2();
        
         $('#dataTable').DataTable({
        serverSide: false,
        processing: true,
        responsive: true,
        lengthChange: false
    });
     $('#dataTable1').DataTable({
        serverSide: false,
        processing: true,
        responsive: true,
        lengthChange: false
        
    });

    </script>

    <!-- /content area -->
@endsection
