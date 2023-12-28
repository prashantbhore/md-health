<!-- <div class="bg-img-container"> -->
    <nav id="mdShopNav" class="navbar navbar-expand-lg navbar-light bg-f6 py-3">
    <img class="mdShopNavBg" src="{{URL('front/assets/img/mdShopNavBg.png')}}" alt="">
        <div class="container">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="{{URL::asset('front/assets/img/MDShop.svg')}}" alt="" style="width: 180px;" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                <ul class="navbar-nav align-items-center gap-5">
                    <li class="nav-item"><a href="{{url('home-service')}}" class="nav-link">Home Service</a></li>
                    <li class="nav-item"><a href="" class="nav-link"><span class="fw-bold">MD</span>Booking</a></li>
                    <li class="nav-item"><a href="{{url('mdFoods')}}" class="nav-link"><span class="fw-bold">MD</span>Foods</a></li>
                    <li class="nav-item"><a href="{{url('/')}}" class="nav-link"><span class="fw-bold">MD</span>Health</a></li>
                </ul>
            </div>
            <a href="{{url('sign-in-web')}}" class="signIn nav-link underline text-underline">Sign In</a>
    
            <a href="{{url('user-account')}}" type="button" class="btn btn-sm btn-md df-center">Get Started</a>
        </div>
        <div class="container">
            <div class="nav2">
                <p class="mb-0 brdr-right">Equipment</p>
                <p class="mb-0">Injection & Infusion</p>
                <p class="mb-0">Emergency & First Aid</p>
                <p class="mb-0">Hygience & Disinfection</p>
                <p class="mb-0">Instruments</p>
                <p class="mb-0">More</p>
            </div>
        </div>
    </nav>
<!-- </div> -->