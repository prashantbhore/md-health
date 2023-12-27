@extends('front.layout.mdShop')
@section('content')
    <div class="content-wrapper mdShop">
        <!-- SECTION 1 -->
        <div class="container">
            <div class="tab-card rounded mb-3 position-relative">     
                <!-- Product Title Section -->
                <div class="product-title-section">
                    <div class="d-flex gap-2">
                        <div class="bg-f6 d-flex p-2 gap-1" style="border-radius: 3px;">
                            <span class="bg-green campton" style="border-radius: 3px; padding: 2px;">4.7</span>
                            <p class="mb-0 campton">evony medikal</p>
                        </div>
                        <img src="{{('front/assets/img/evony.png')}}" alt="" style="width: 70px; object-fit: contain;">
                    </div>
                    <div class="bg-green p-2 d-flex gap-4" style="border-radius: 3px;">
                        <div class="d-flex align-items-center gap-1">
                            <img src="{{('front/assets/img/Follow.svg')}}" alt="">
                            <p class="mb-0 camptonBold">Unfollow</p>
                        </div>
                        <p class="mb-0">120 Followers</p>
                    </div>
                </div>
                <!-- Nav pills -->
                <ul class="nav nav-pills bg-f6">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="pill" href="#allProducts">All Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="pill" href="#aboutUs">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" disabled style="color: #8a8a8a;">Posts <span class="smallFont">(Coming Soon)</span></a>
                    </li>
                </ul>
    
                <!-- Tab panes -->
                <div>
                    <div class="tab-content">
                        <div class="tab-pane active container" id="allProducts">
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
                        <div class="tab-pane fade" id="aboutUs">
                            <p class="campton">About</p>
                            <p class="camptonBook">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Augue lacus viverra vitae congue eu consequat ac felis. Non diam phasellus vestibulum lorem. Habitasse platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper. Facilisi morbi tempus iaculis urna id volutpat lacus laoreet non. Ultrices eros in cursus turpis massa tincidunt dui. Arcu cursus vitae congue mauris rhoncus. Nunc mattis enim ut tellus elementum sagittis. Viverra mauris in aliquam sem. Dictum at tempor commodo ullamcorper a lacus. Eget egestas purus viverra accumsan. Donec enim diam vulputate ut. Aliquam ultrices sagittis orci a scelerisque purus semper eget duis. Urna porttitor rhoncus dolor purus non enim praesent elementum facilisis. Ultrices vitae auctor eu augue. Eleifend mi in nulla posuere sollicitudin aliquam ultrices.
                                <br/><br/>
                                Sit amet consectetur adipiscing elit ut. Quis eleifend quam adipiscing vitae proin sagittis nisl rhoncus. Commodo viverra maecenas accumsan lacus vel facilisis volutpat est. Lectus quam id leo in vitae turpis massa. At ultrices mi tempus imperdiet nulla malesuada pellentesque elit eget. Morbi tincidunt ornare massa eget egestas. Fermentum et sollicitudin ac orci phasellus egestas tellus. Ut consequat semper viverra nam libero justo laoreet. Id diam vel quam elementum pulvinar etiam. Potenti nullam ac tortor vitae purus faucibus ornare. Mi eget mauris pharetra et ultrices neque ornare. Nisi est sit amet facilisis magna. Adipiscing commodo elit at imperdiet dui. Phasellus faucibus scelerisque eleifend donec. Nulla facilisi morbi tempus iaculis. Sed risus ultricies tristique nulla aliquet enim tortor at auctor. Egestas integer eget aliquet nibh praesent tristique magna sit amet. Mi proin sed libero enim sed. Faucibus et molestie ac feugiat sed.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 2: SCAN QR -->
        <div class="bg-f6 scanQr">
            <img src="{{('front/assets/img/appScreenFooter.png')}}" alt="">
        </div>
    </div>
<!-- </div> -->
@endsection
@section('script')
<script type="text/javascript">
  const lightbox = GLightbox({ ...options });
</script>
<script>
    let checkedVal;
    $('input[type=radio]').click(function(){
        checkedVal = $('input[name="paymentMethod"]:checked').val();
        if(checkedVal === "card"){
            $("#card").css('display', 'block');
            $("#wallet").css('display', 'none');
        }else if(checkedVal === "wallet"){
            $("#card").css('display', 'none');
            $("#wallet").css('display', 'block');
        }
    });
</script>
@endsection