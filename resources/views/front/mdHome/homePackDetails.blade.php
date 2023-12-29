@extends('front.layout.layout2')
@section('content')
<div class="content-wrapper bg-f6">
    
    <!-- SECTION 1 -->
    <div class="searchBar bg-f6">
        <div class="container pt-4">
            <a href="home-service" class="d-flex align-items-center mb-5 gap-2 backBtn">
                <img src="{{('front/assets/img/ArrowLeftCircle.png')}}" alt="">
                <p class="mb-0 fs-5 camptonBold">Back Home Services</p>
            </a>
            <div class="homeServicePackage rounded mb-4">
                <div>
                    <img src="{{('front/assets/img/ProvidersLogo.png')}}" alt="">
                </div>
                <div class="d-flex justify-content-between flex-grow-1">
                    <div class="d-flex gap-3">
                        <div class="brdr-right d-flex flex-column justify-content-between py-1">
                            <div class="mb-3">
                                <p class="mb-0 fs-5 camptonBold lh-base">Home Service Provider 1</p>
                                <div class="d-flex gap-2 align-items-center">
                                    <img src="{{('front/assets/img/Location.svg')}}" alt="">
                                    <p class="mb-0 lctn smallFont">Besiktas/Istanbul</p>
                                </div>
                            </div>
                            <div>
                            <div>
                                <p class="mb-0"><span class="text-green fw-bold camptonBold" style="font-size: 1.125rem;">Reviews</span><span class="fw-normal">(480)</span></p>
                                <div class="stars">
                                    <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                    <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                    <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                    <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                    <img src="{{('front/assets/img/star-green.svg')}}" style="width: 16px;" alt="">
                                </div>
                                <p class="fs-6 mb-0 camptonBold">Excellent</p>
                            </div>
                            </div>
                        </div>
                        <div>
                            <p class="mb-0"><span class="text-green fw-bold camptonBold" style="font-size: 1.125rem;">Service</span></p>
                            <div class="d-flex gap-1 align-items-baseline mb-1">
                                <img style="width: 11px;" src="{{('front/assets/img/Varlik.svg')}}" alt="">
                                <p class="mb-0 camptonBook smallFont">Patient Care</p>
                            </div>
                            <div class="d-flex gap-1 align-items-baseline mb-1">
                                <img style="width: 11px;" src="{{('front/assets/img/Varlik.svg')}}" alt="">
                                <p class="mb-0 camptonBook smallFont boldRed">Ambulance</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-between">
                        <img src="{{('front/assets/img/verifiedBy.svg')}}" alt="">
                    </div>
                </div>
            </div>
                
            <div class="tab-card rounded mb-3">     
                <!-- Nav pills -->
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="pill" href="#home">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="pill" href="#menu1">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="pill" href="#menu2">Photos/Videos</a>
                    </li>
                    <div class="right-align">
                        <a href="{{url('buy-service')}}" class="underline smallFont anchor">Buy Service</a>
                    </div>
                </ul>
    
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active container" id="home">
                       <div class="overview mt-4">
                        <div class="row">
                            <div class="col-8 ps-0">
                                <p>************ Hospital is a family owned business and Trudi Scrivener, the founder is Buckinghamshire based, Trudi has over 30 years of care experience and provides a key leadership role to her team.

                                <br/>
                                <br/>

                                Ashridge Home Care provide a multi award winning specialist live in care or hourly care service, depending on the needs of the client. Most people want to stay in their own home, and having a carer either living in or visiting from time to time means choosing to enjoy life on your own terms and being able to maintain your independence. Staff pride themselves on delivering quality person-centred care with compassion, choice, dignity and respect.

                                <br/>
                                <br/>

                                Their ethos is based purely on happy and healthy lifestyles. ********** Hospital offers care tailored to suit the individual, taking into account the things that are important to the client, like family, interests, pets or the garden. This ethos applies to both the care provided to clients and also the support given to staff.Having a live-in carer removes all the unnecessary upheaval of leaving home to go to the unfamiliar surroundings or a nursing home.

                                </p>
                            </div>
                            <div class="col-4 pe-0">
                                <img src="{{('front/assets/img/Overview.png')}}" alt="Image">
                            </div>
                            <div class="col-12 px-0">
                                <p>
                                This is especially important to those with dementia where familiar belongings and routines are essential to providing comfort at times of confusion and anxiety.Considering care is a huge step and is one of life’s big decisions. Sometimes it’s difficult for people to accept that they need care, especially when life has been independent and fulfilling. They can sensitively help people through this decision making process, providing all the information needed in order to help make the right decision.

                                <br/>
                                <br/>

                                Staff can provide bespoke live in care packages to people across the Home Counties and further afield in the South East, and hourly care to those in Buckinghamshire.
                                </p>
                            </div>
                        </div>
                       </div>
                    </div>
                    <div class="tab-pane fade" id="menu1">
                        <div class="reviews mt-4">
                            <div class="d-flex align-items-center gap-3">
                                <p class="mb-0 fs-1 camptonBold">4,8</p>
                                <p class="mb-0 u"><u>480 Reviews</u></p>
                            </div>
                            <div class="stars mb-5">
                                <img src="{{('front/assets/img/star-green.svg')}}" style="width: 30px;" alt="">
                                <img src="{{('front/assets/img/star-green.svg')}}" style="width: 30px;" alt="">
                                <img src="{{('front/assets/img/star-green.svg')}}" style="width: 30px;" alt="">
                                <img src="{{('front/assets/img/star-green.svg')}}" style="width: 30px;" alt="">
                                <img src="{{('front/assets/img/star-green.svg')}}" style="width: 30px;" alt="">
                            </div>
                            <div class="review mb-4">
                                <div class="mb-4">
                                    <div class="stars d-inline me-2">
                                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                    </div>
                                    <p class="d-inline camptonBook">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos beatae quia vero eaque officia, aperiam quas accusantium neque non ducimus explicabo eligendi. Cupiditate sit recusandae tempora quia velit, asperiores odio.</p>
                                </div>

                                <div class="mb-4">
                                    <p class="mb-1 fs-6 camptonBold">Ali G. / <span class="fst-italic camptonBook">Heart Valve Replacement Surgery</span></p>
                                    <p class="fs-6 fst-italic">12/12/2023</p>
                                </div>
                            </div>
                            <div class="review mb-4">
                                <div class="mb-4">
                                    <div class="stars d-inline me-2">
                                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                    </div>
                                    <p class="d-inline camptonBook">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos beatae quia vero eaque officia, aperiam quas accusantium neque non ducimus explicabo eligendi. Cupiditate sit recusandae tempora quia velit, asperiores odio.</p>
                                </div>

                                <div class="mb-4">
                                    <p class="mb-1 fs-6 camptonBold">Ali G. / <span class="fst-italic camptonBook">Heart Valve Replacement Surgery</span></p>
                                    <p class="fs-6 fst-italic">12/12/2023</p>
                                </div>
                            </div>
                            <div class="review mb-4">
                                <div class="mb-4">
                                    <div class="stars d-inline me-2">
                                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                        <img src="{{('front/assets/img/star-green.svg')}}" style="width: 15px;" alt="">
                                    </div>
                                    <p class="d-inline camptonBook">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos beatae quia vero eaque officia, aperiam quas accusantium neque non ducimus explicabo eligendi. Cupiditate sit recusandae tempora quia velit, asperiores odio.</p>
                                </div>

                                <div class="mb-4">
                                    <p class="mb-1 fs-6 camptonBold">Ali G. / <span class="fst-italic camptonBook">Heart Valve Replacement Surgery</span></p>
                                    <p class="fs-6 fst-italic">12/12/2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="menu2">
                        <div class="gallery">
                            <a href="{{('front/assets/img/galleryImg1.png')}}" class="glightbox">
                                <img src="{{('front/assets/img/galleryImg1.png')}}" alt="image" />
                            </a>
                            <a href="{{('front/assets/img/galleryImg2.png')}}" class="glightbox">
                                <img src="{{('front/assets/img/galleryImg2.png')}}" alt="image" />
                            </a>
                            <a href="{{('front/assets/img/galleryImg3.png')}}" class="glightbox">
                                <img src="{{('front/assets/img/galleryImg3.png')}}" alt="image" />
                            </a>
                            <a href="{{('front/assets/img/galleryImg4.png')}}" class="glightbox">
                                <img src="{{('front/assets/img/galleryImg4.png')}}" alt="image" />
                            </a>
                            <a href="{{('front/assets/img/galleryImg5.png')}}" class="glightbox">
                                <img src="{{('front/assets/img/galleryImg5.png')}}" alt="image" />
                            </a>
                            <a href="{{('front/assets/img/galleryImg3.png')}}" class="glightbox">
                                <img src="{{('front/assets/img/galleryImg3.png')}}" alt="image" />
                            </a>
                            <a href="{{('front/assets/img/galleryImg4.png')}}" class="glightbox">
                                <img src="{{('front/assets/img/galleryImg4.png')}}" alt="image" />
                            </a>
                            <a href="{{('front/assets/img/galleryImg5.png')}}" class="glightbox">
                                <img src="{{('front/assets/img/galleryImg5.png')}}" alt="image" />
                            </a>
                            <a href="{{('front/assets/img/galleryImg1.png')}}" class="glightbox">
                                <img src="{{('front/assets/img/galleryImg1.png')}}" alt="image" />
                            </a>
                            <a href="{{('front/assets/img/galleryImg2.png')}}" class="glightbox">
                                <img src="{{('front/assets/img/galleryImg2.png')}}" alt="image" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 3 -->
    <div class="bg-f6 scanQr">
        <img src="{{('front/assets/img/appScreenFooter.png')}}" alt="">
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    const lightbox = GLightbox({ ...options });
</script>
@endsection
