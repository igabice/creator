@extends('layouts.app')

@section('content')

<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h4 class="page-title">Create New User</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <form class="form-horizontal" method="POST" action="{{ url('/users') }}">
            @csrf
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="surname">Surname</label>
                                <input value="{{old('surname')}}" id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" required autocomplete="surname" autofocus>
                        
                                @error('surname')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <div class="form-group">
                                <label for="other_names">Other Names</label>
                                <input value="{{old('other_names')}}" id="other_names" type="text" class="form-control @error('other_names') is-invalid @enderror" name="other_names" required autocomplete="other_names" autofocus>
                        
                                @error('other_names')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input value="{{old('phone')}}" id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="phone" autofocus>
                        
                                @error('phone')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <div class="form-group">
                                <label for="department">Department</label>
                                <input value="{{old('department')}}" id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" required autocomplete="department" autofocus>
                        
                                @error('department')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="account_type">Select Account Type</label>
                                <select name="account_type" id="account_type" required class="form-control">
                                    <option value=""></option>
                                    @foreach ($data->account_types as $object)
                                        <option value="{{$object->id}}">{{ $object->name }}</option>
                                    @endforeach
                                </select>
                                @error('account_type')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <div class="form-group">
                                <label for="role_level">Select Access Level</label>
                                <select name="role_level" id="role_level" required class="form-control">
                                    <option value=""></option>
                                    @foreach ($data->levels as $object)
                                        <option value="{{$object->id}}">{{ $object->name }}</option>
                                    @endforeach
                                </select>
                                @error('role_level')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <div class="form-group">
                                <label for="store_id">Select Location</label>
                                <select name="store_id" id="store_id" required class="form-control select2">
                                    <option value=""></option>
                                </select>
                                @error('store_id')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input value="{{old('email')}}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus>
                        
                                @error('email')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="ad" id="ad" >
                                    <label class="custom-control-label" for="ad"> Make user an admin </label>
                                </div>
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-sm-6">
                                    
                                </div>
                                <div class="col-sm-6 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Create User</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div> 

@endsection

@section('script')
<script>
        $(".select2").select2();
        $('select[name="role_level"]').on('change', function(){
            $('select[name="store_id"]').html('');
            var level=$(this).val();
            if(level=="")return;
            $.LoadingOverlay("show");
            $.ajax({
                type: "GET",
                url: "/getstores/"+level
            }).done(function(data){
                
                if(data.length<1){
                    alert("There is no unit in the selected location");
                    $('select[name="store_id"]').html('');
                    var ss="<option value=''></option>";
                    $('select[name="store_id"]').append(ss);
                    
                    $.LoadingOverlay("hide");
                    return;
                }
                
                var ss="<option value=''></option>";
                $('select[name="store_id"]').append(ss);
                $.each(data, function(i, item){
                    var ss="<option value='"+item.id+"'>"+item.name+"</option>";
                    $('select[name="store_id"]').append(ss);
                });
                
                $.LoadingOverlay("hide");
    
            });
        });
    
    </script>
@endsection
