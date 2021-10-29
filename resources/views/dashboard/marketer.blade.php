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

@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <strong>Well done!</strong> {{ session()->get('success') }}
    </div>
@endif
<!-- Content area -->
<div class="row align-items-center">
    <div class="col-12">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2><b> Welcome to </b> 7DC</h2>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">7D Affiliate Dashboard</a></li>
                    </ol>
                </div>
                 <div class="col-sm-6">
                    <a href="https://wa.me/+2348038574070"  target="_blank" class="btn btn-success ">
                        <img style="max-height:30px" src="/uploads/whatsapp.png" alt="Whatsapp"> TECH SUPPORT
                    </a>
                    <a href="https://wa.me/+2348170940000"  target="_blank" class="btn btn-warning">
                        <img style="max-height:30px" src="/uploads/whatsapp.png" alt="Whatsapp"> MEMBER SUPPORT
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card" style="background-color: #000;">
    <div class="card-body" style="background-color: #000;">

        <div class="card-group">
            <!-- Card -->
            <div class="card">
                <div class="card-body dark-bg">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                            <span class="btn btn-circle btn-lg " style="background-color: black">
                                <i class="fa fa-users" style="color: white"></i>
                            </span>
                        </div>
                        <div>
                            <h5 style="color: black"> Products </h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: black"> {{count($products)}}</h2>
{{--                            <a href="#" style="color: black"><h6>view all</h6></a>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body dark-bg">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                            <span class="btn btn-circle btn-lg " style="background-color: black">
                                <i class="fa fa-users" style="color: white"></i>
                            </span>
                        </div>
                        <div>
                            <h5 style="color: black"> Campaigns </h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: black"> {{count($campaigns)}}</h2>
{{--                            <a href="#" style="color: black"><h6>view all</h6></a>--}}
                        </div>
                    </div>
                </div>
            </div>
          
            <div class="card">
                <div class="card-body dark-bg">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                    <span class="btn btn-circle btn-lg " style="background-color: black">
                        <i class="fa fa-wallet" style="color: white"></i>
                    </span>
                        </div>
                        <div>
                            <h5 style="color: black"> Wallet</h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: black"> ₦{{$wallet != null ? $wallet->balance : '0.0'}}</h2>
{{--                            <a href="#" style="color: black"><h6>view </h6></a>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body dark-bg">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                    <span class="btn btn-circle btn-lg " style="background-color: black">
                        <i class="fa fa-wallet" style="color: white"></i>
                    </span>
                        </div>
                        <div>
                            <h5 style="color: black"> Referral Bonus</h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: black"> ₦{{$wallet != null ? $wallet->referral_bonus : '0.0'}}</h2>
                            <a href="#" style="color: black"><h6> </h6></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-9 cta-contents">
                <h4 class="cta-title">
                    <i class=" btnn btn btn-warning" title="click to copy" data-clipboard-text="{{request()->root()}}/register?ref={{$user->id}}">click to copy referral link:  {{request()->root()}}/register?ref={{$user->id}}</i>
                </h4>
                {{--
                <h5>@if($referrer != null)
                        <i style="color: white">Reffered By: {{$referrer->name}} {{$referrer->name}}<br>Phone: {{$referrer->phone}}<br>Email: {{$referrer->email}}</i>
                    @endif</h5>
                    --}}
            </div>
        </div>

        <center>
            <div class="row">
                            <div class="embed-responsive embed-responsive-16by9 col-md-6 ">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/mYHSw_Tr3Bc" allowfullscreen></iframe>
            </div>
            <div style="max-height:500px" class="col-md-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                          </ol>
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img style="max-height:500px" src="/images/richest.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                              <img style="max-height:500px" src="/images/affirmations.png" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                              <img style="max-height:500px" src="/images/hashtags.png" alt="Third slide">
                            </div>
                            <div class="carousel-item">
                              <img style="max-height:500px" src="/images/independence.jpg" alt="Fourth slide">
                            </div>
                          </div>
                          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
            </div>
            </div>
        </center>

        @if($user->verified == 0 || $user->verified == 1)
        
                              
            <div class="alert ">
                
                    <div class="col-md-12 cta-contents" style="color: black; ">
                            
                              <div style="background-color: white; border-radius: 20px; padding: 20px" class="row">
                                  
                                      
                                    
                                        <div class="cta-desc col-md-6" style="text-align: left">
                                            <center>
                                            <h3 class="cta-title" style="color: #d79711">THANK YOU for joining this community.</h3>
                                              <h4 class="cta-title" style="color: black">You are now a FULL FLEDGED 7Digits AFFILIATE! </h4>
                                              <h5 class="cta-title" style="color: black; font-weight: bold">Now, it's time for YOU to TAKE the NEXT STEP <br>
                                                  Towards making up to N5 million naira monthly! Yeah!
                                              </h5>
                                           </center>
                                              <h5 class="cta-title" style="color: black; font-weight: bold">Join THE N5 MILLION NAIRA OCTOBER CHALLENGE <br>
            
                                                  EARN N5 Million Naira this October on <b>AfiliatedNg</b> <br/>
                                                  Win  cool bonuses and other membership benefits!
                                              </h5>
                                              <h4 class="cta-title" style="color: #d79711">HOW TO JOIN;</h4>
                                                  <h5>
                                                  1. Commit to the challenge with a token of N10, 500<br>
                                                  Get N12,000 Membership bonus credited on your ewallet, immediately<br>
                                                      <br>
                                                  2. Follow the daily IG Live... Time will be communicated when you commit<br>
                                                      <br>
                                                  3. You'll be added to our motivated WhatsApp community of high flyers. 
                                                  where you have access to multiple "back-to-back" values from Our CEO, Dr OluAyoola<br>
                                                      <br>
                                                  4. Do the N5M Challenge activities<br>
                                                      <br>
                                                  5. Get results.<br>
                                                  </h5>
                                                  <br>
                                                <a href="https://flutterwave.com/pay/7dyearly" class="btn btn-sm btn-block btn-warning">ACCESS YOUR MEMBERSHIP HERE (ONE YEAR)</a>

                                          </div>
                                  
                                  
                                  <div class="col-md-6">
                                    <h3 class="cta-title" style="color: #d79711">ENJOY THE FOLLOWING BENEFITS AS A 7D AFFILIATE</h3><br>
                                    <div class="row">
                                            <h6>1.  LEARN 28+ HIGH-INCOME SKILLS<br>
                                                Each skill can earn you more than 1 million naira monthly!<br>
                                                Some can earn you up to 5 million naira in a month!<br><br>

                                                2. WIN FREE Gadgets, House Appliances, Cool rides etc.<br>
                                                How does  iPhone 12 Pro Max, Samsung S21 Ultra, LG LED TV, Washing Machine, Smart Fridge, Lexus, Benz etc. sound to you?<br>
                                                Never have to worry about any of these little things.<br><br>

                                                3. FREE Bi-Annual Trips to Dubai, Mauritius, Maldives etc.<br>
                                                How does that sound....?  YES, for FREE! All expenses PAID!<br><br>
                                                
                                                4. FREE Health Insurance Package<br>
                                                Never ever have to worry about paying medical bills! Ever<br><br>

                                                5. A Family-like Community.<br>
                                                A family you can always rely on 24/7.... YOU ARE NEVER ALONE!<br><br>

                                                6. 24/7 Telegram Support group<br>
                                                NO MORE STRUGGLE! We are here for you always!<br><br>

                                                7. Mentorship Access with OluAyoola7D<br>
                                                THE ICING on the CAKE! Lol<br>

                                               <br></h6><br>
                                        
                                        
                                    </div>
                                </div>
        
                                  </div>


                                  
                                

{{--
<div class="cta-contents">
                            <center>
                              <div style="background-color: white; border-radius: 20px; padding: 20px">
                                  <h3 class="cta-title" style="color: #d79711">THANK YOU for crossing to this side...! Lol</h3>
                                  <h4 class="cta-title" style="color: black">You are now a FULL FLEDGED 7Digits AFFILIATE! </h4>
                                  <h5 class="cta-title" style="color: black; font-weight: bold">Now, it's time for YOU to TAKE the NEXT STEP <br>
                                      Towards making up to N5 million naira monthly! Yeah!
                                  </h5>
                                  <h5 class="cta-title" style="color: black; font-weight: bold">and<br>

                                      To enjoy UNLIMITED ACCESS to ALL the SWEET benefits of  <b>AfiliatedNg</b>;
                                  </h5>
                                  <h4 class="cta-title" style="color: black">START EARNING MONEY RIGHT AWAY.</h4>

                                  <div class="cta-desc">
                                      <h5>
                                      You EARN N5000 when your referrals pick OPTION2<br>
                                      You EARN N50,000 when your referrals pick OPTION 3<br>
                                          <br>
                                      We have 3 easy-to-follow OPTIONS.<br>
                                          <br>
                                      OPTION 3 is the BEST<br>
                                          <br>
                                      OPTION 2 is the MOST-RECOMMENDED.<br>
                                          <br>
                                      Any of the three will secure your MEMBERSHIP and GET you to start EARNING!<br>
                                      </h5>
                                  </div>
                                  </div>
                            </center>
                              </div>

                        <div class="row" style=" border-radius: 20px; ">
                            <div class="col-md-4">

                                <div  style="border-radius: 20px; background-color: white; margin: 10px; padding: 20px">
                                    <h4>OPTION 1 - FREE</h4>
                                    <h5>Get Your Earning Rights FOR FREE!</h5>
                                    <h6>This is for people who want to earn without committing.</h6>
                                    <h6>However, this option is only available until Pre-Launch Starts.</h6>
                                    <h6 style="font-weight: bold">REFER As Many Affiliates as You can for Free;</h6>
                                    <p><b>Copy Your Affiliate Link <i class=" btnn btn btn-sm btn-warning" title="click to copy" data-clipboard-text="{{request()->root()}}/register?ref={{$user->id}}"> HERE</i></b></p>
                                    <p>Share the Flyer and give them your copied link to register.<br>

                                        Follow them up to pay for their membership<br>

                                        You Just Need 3 of Them To Pay<br>

                                        When they pay for the membership.<br>

                                        Once they start paying, you start earning and you start to unlock the other benefits of your membership.<br>

                                        Guide your referrals to SELECT option 2 or 3 ( not 1) so that you can start to earn and have the full access to other membership benefits that awaits you.
                                    </p>

                                    <i class="btn btn-sm btn-block btn-warning" title="click to copy" data-clipboard-text="{{request()->root()}}/register?ref={{$user->id}}"> GENERATE YOUR REFERRAL CODE HERE</i>
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-4">

                                <div style="border-radius: 20px; background-color: white; margin: 10px; padding: 20px">


                                    <h4>OPTION 2 </h4>
                                    <h5>(Recommended Option)<br>
                                        YEARLY SUBSCRIPTION
                                    </h5>
                                    <p>Immediate Money Making Strategy</p>
                                    <h5>PAY <b>N10,500 ($21)</b> FOR ONE YEAR ONLY!</h5>

                                    <h6>RECEIVE A MEMBERSHIP BONUS OF N12,000 IN 30 DAYS.</h6>

                                    <p>
                                        <i style="font-weight: bold"> To RECEIVE YOUR Membership Bonus (Simply complete these 4 simple tasks)</i>

                                        1. Promote the 7DC MEMBERSHIP or any 1 of our products (efforts only). Get E-Flyer Here and Your unique referral Link here
                                        <br>
                                        2. Follow @OluAyoola7D on all Social Media Platforms<br>

                                        3. Follow  @AffiliatedNG on all Social Media Platforms<br>
                                        4. Verify your account  (KYC) - very easy.

                                    </p>
                                    <br>
                                    <a href="https://flutterwave.com/pay/7dyearly" class="btn btn-sm btn-block btn-warning">ACCESS YOUR MEMBERSHIP HERE (ONE YEAR)</a>




                                </div>
                            </div>
                            <div class="col-md-4">
                                <div  style="border-radius: 20px; background-color: white; margin: 10px; padding: 20px">


                                    <h4>OPTION 3</h4>
                                    <h5>No renewal Ever!<br>
                                        (Best Option)<br>
                                        LIFETIME UNLIMITED ACCESS ONE-TIME PAYMENT.

                                    </h5>
                                    <p>Immediate Money Making Strategy</p>

                                    <h5>PAY <b>N122,500 ($245)</b> AND Never have to pay for membership ever again!</h5>

                                    <h6 style="font-weight: bold">RECEIVE A MEMBERSHIP BONUS OF N150,000 IN 30 DAYS!</h6>

                                    <p>
                                        <i > To RECEIVE YOUR Membership Bonus (Simply complete these 4 simple tasks)</i>

                                        1. Promote the 7DC MEMBERSHIP or any 1 of our products (efforts only)
                                        <br>
                                        2. Follow @OluAyoola7D on all Social Media Platforms<br>

                                        3. Follow  @AffiliatedNG on all Social Media Platforms<br>
                                        4. Verify your account  (KYC) - very easy.

                                    </p>
                                    <br>
                                    <a href="https://flutterwave.com/pay/7dforever" class="btn btn-sm btn-block btn-warning">GET UNLIMITED LIFETIME ACCESS NOW</a>




                                </div>
                            </div>


                        </div>

                        <div style="color: white">

                                <div class="col-md-8 offset-md-2">
                                    <h2>ENJOY THE FOLLOWING BENEFITS AS A 7D AFFILIATE</h2><br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>1.  LEARN 28+ HIGH-INCOME SKILLS<br>
                                                Each skill can earn you more than 1 million naira monthly!<br>
                                                Some can earn you up to 5 million naira in a month!<br><br>

                                                2. WIN FREE Gadgets, House Appliances, Cool rides etc.<br>
                                                How does  iPhone 12 Pro Max, Samsung S21 Ultra, LG LED TV, Washing Machine, Smart Fridge, Lexus, Benz etc. sound to you?<br>
                                                Never have to worry about any of these little things.<br><br>

                                                3. FREE Bi-Annual Trips to Dubai, Mauritius, Maldives etc.<br>
                                                How does that sound....?  YES, for FREE! All expenses PAID!<br><br>

                                               <br></h6><br>
                                        </div>
                                        <div class="col-md-6">
                                            <h6>4. FREE Health Insurance Package<br>
                                                Never ever have to worry about paying medical bills! Ever<br><br>

                                                5. A Family-like Community.<br>
                                                A family you can always rely on 24/7.... YOU ARE NEVER ALONE!<br><br>

                                                6. 24/7 Telegram Support group<br>
                                                NO MORE STRUGGLE! We are here for you always!<br><br>

                                                7. Mentorship Access with OluAyoola7D<br>
                                                THE ICING on the CAKE! Lol<br></h6><br>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        --}}
                        </div>
                    
                </div>
        @endif

{{--        <h3>Buy Movie Tickets N500.00</h3>--}}
{{--        <form method="POST" action="{{ route('pay') }}" id="paymentForm">--}}
{{--            {{ csrf_field() }}--}}

{{--            <input name="name" placeholder="Name" />--}}
{{--            <input name="email" type="email" placeholder="Your Email" />--}}
{{--            <input name="phone" type="tel" placeholder="Phone number" />--}}

{{--            <input type="submit" value="Buy" />--}}
{{--        </form>--}}

        <br>

    </div>
</div>

{{--<div id="upload-cro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
{{--<div class="modal-dialog">--}}
{{--<form action="{{url('/cro-upload')}}" method="post" enctype="multipart/form-data">--}}
{{--@csrf--}}
{{--<div class="modal-content">--}}
{{--<div class="modal-header">--}}
{{--<h5 class="modal-title mt-0" id="myModalLabel">Upload CRO File</h5>--}}
{{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
{{--</div>--}}
{{--<div class="modal-body">--}}
{{--<div class="form-group">--}}
{{--<label>--}}
{{--Upload a CSV file in the order of Middle name, First name, Surname, Phone number, Email Address, Service Centre, Meter Book, Feeder Name, DSS Name, DSS Rating, Department, Account Type, TeamLead Email, BHM Email <span><br/><small>Possible account types are </small><span>--}}
{{--</label>--}}
{{--<input type="file" class="filestyle" name="manifest" data-buttonname="btn-secondary" required="">--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="modal-footer">--}}
{{--<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>--}}
{{--<button type="submit" class="btn btn-primary waves-effect waves-light">Upload</button>--}}
{{--</div>--}}
{{--</div><!-- /.modal-content -->--}}
{{--</form>--}}
{{--</div><!-- /.modal-dialog -->--}}
{{--</div>--}}
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


    });
</script>
<!-- /content area -->
@endsection
