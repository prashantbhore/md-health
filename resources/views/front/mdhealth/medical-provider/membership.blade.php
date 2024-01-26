@extends('front.layout.layout2')
@section("content")
<div class="content-wrapper">
    <div class="container py-100px for-cards">
    <div class="d-flex gap-3">
            <div class="w-292">
                @include('front.includes.sidebar')
            </div>
            <div class="w-761">
                <div class="card mb-4">
                    <h5 class="card-header">
                        <span>Your Membership</span>
                    </h5>

                    <div class="card-body">

                       
                        @if(!empty($membership))
                        @if($membership->membership_type == 'silver')
                            <img src="{{ asset('front/assets/img/silver-md.png') }}" alt="">
                           
                        @elseif($membership->membership_type == 'gold')
                            <img src="{{ asset('front/assets/img/gold-md.png') }}" alt="">
                            
                        @elseif($membership->membership_type == 'platinum')
                            <img src="{{ asset('front/assets/img/platinum-md.png') }}" alt="">
                            
                        @else
                            <p>Unknown Membership Type: {{ $membership->membership_type }}</p>
                        @endif
                    @endif
                    
                      
                      
                      





                    </div>
                </div>


                <div class="card membership-card">
                    <h5 class="card-header mb-3">Memberships</h5>
                    <div class="card-body">


                        <div class="w-100">
                        <div class="d-flex align-items-center gap-3">
                            <h5 class="card-h3 mb-1">{{$provider_amount}} ₺</h5>
                            @if(!empty($membership))
                                @if($membership->membership_type == 'silver')
                                    <h5><img src="{{ asset('front/assets/img/silver-md.png') }}" alt=""></h5>
                                @elseif($membership->membership_type == 'gold')
                                    <h5><img src="{{ asset('front/assets/img/gold-md.png') }}" alt=""></h5>
                                @elseif($membership->membership_type == 'platinum')
                                    <h5><img src="{{ asset('front/assets/img/platinum-md.png') }}" alt=""></h5>
                                @endif
                            @endif
                            {{-- Display the remaining amount needed for the next membership --}}
                            <h5 class="card-h3 mb-1 ms-auto">
                                {{$next_membership_amount}} ₺
                            </h5>
                        </div>

                       
                        <div class="progress" role="progressbar" aria-label="Membership Progress" aria-valuenow="{{ $progress_percentage }}" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: {{ $progress_percentage }}%">{{ number_format($progress_percentage, 2) }}%</div>
                        </div>
                       

                     

                        <div class="w-100">
                            @if(!empty($membership))
                                @if($membership->membership_type == 'silver')
                                    <h5 class="mem-type text-end pt-2">Gold<span>member</span></h5>
                                @elseif($membership->membership_type == 'gold')
                                    <h5 class="mem-type text-end pt-2">Platinum<span>member</span></h5>
                                @elseif($membership->membership_type == 'platinum')
                                    <h5 class="mem-type text-end pt-2">Platinum<span>member</span></h5>
                                @endif
                            @endif
                        </div>
                    </div>

                

                        

                        <!--  -->
                        <h5 class="card-header mb-3 ps-0">Memberships Specification</h5>

                        <div class="mb-3">
                            <h5><img src="{{asset('front/assets/img/default-gold.png')}}" alt="" /></h5>
                            <ul>
                                <li class="card-p1">Fixed Commision</li>
                                <li class="card-p1">No Free Ads</li>
                                <li class="card-p1">No Free Promotion</li>
                            </ul>
                        </div>

                        <div class="mb-3">
                            <h5><img src="{{asset('front/assets/img/GoldMember.svg')}}" alt="" /></h5>
                            <ul>
                                <li class="card-p1">8% Commision Discount</li>
                                <li class="card-p1">3 Free Ads Monthly</li>
                                <li class="card-p1">1 Free Package Featured</li>
                            </ul>
                        </div>
                        <div class="mb-3">
                            <h5><img src="{{asset('front/assets/img/PlatinumMember.svg')}}" alt="" /></h5>
                            <ul>
                                <li class="card-p1">10% Commision Discount</li>
                                <li class="card-p1">3 Free Ads Monthly</li>
                                <li class="card-p1">2 Free Package Featured</li>
                            </ul>
                        </div>
                    </div>



                </div>


            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(".mpMembershipLi").addClass("activeClass");
    $(".mpMembership").addClass("md-active");
</script>
@endsection