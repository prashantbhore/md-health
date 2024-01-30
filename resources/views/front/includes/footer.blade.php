
 <footer class="footer text-light py-5" style="background-color:#080808">
     <div class="container">
         <div class="row pb-1">
             <div class="col-md-3">
                 <div class="card-text camptonBook"><span>MD</span>health</div>
                 <ul>
                     <li><a href="{{('/about-us')}}">About Us</a></li>
                     <li><a href="javascript:;">Company</a></li>
                     <li><a href="javascript:;">Career</a></li>
                 </ul>
             </div>
             <div class="col-md-3">
                 <div class="card-text">Support</div>
                 <ul>
                     <li><a href="javascript:;">Contact Us</a></li>
                     <li><a href="javascript:;">Support</a></li>
                     <li><a href="javascript:;">Purchase & Compliment</a></li>
                 </ul>
             </div>
             <div class="col-md-3">
                 <div class="card-text">Other</div>
                 <ul>
                     <li><a href="javascript:;">FAQ</a></li>
                     <li><a href="javascript:;">Glossary</a></li>
                     <li><a href="javascript:;">Cancellation/Refund Transactions</a></li>
                 </ul>
             </div>
             <div class="col-md-3 text-end d-flex flex-column">
                 <div class="card-text text-end mb-0 camLight">support@mdhealth.com</div>
                 <div class="contact-no">0800 800 8080</div>
                 <div class="social-icons mt-150">
                     <ul class="d-flex gap-4 align-items-center justify-content-end mb-0">
                         <li><a href="javascript:;"><img src="{{ 'front/assets/img/Facebook.png' }}" alt=""></a>
                         </li>
                         <li><a href="javascript:;"><img src="{{ 'front/assets/img/twitter.png' }}" alt=""></a>
                         </li>
                         <li><a href="javascript:;"><img src="{{ 'front/assets/img/Instagram.png' }}"
                                     alt=""></a></li>
                         <li><a href="javascript:;"><img src="{{ 'front/assets/img/linkedin.png' }}" alt=""></a>
                         </li>
                     </ul>
                 </div>
             </div>


         </div>

         <!-- v -->

         <hr class="border border-white  my-3" />

         <div class="d-flex justify-content-between mdLtd">
             <div class="d-flex justify-content-center">
                 <div class="md-main"><span class="md-span">MD</span>health</div>
                 <div class="fl-text ms-1">is a brand of MD Sanglik Technology Ltd.Sti</div>
             </div>
             <div class="fs-6 text-end" style="width: 400px">
                 <p class="mext">MDhealth Technology LTD is an electronics
                     money and payment services institution authorised by CBRT to issue electronics
                     money,within the framework of law numbered 6943 on payment Securities Settlement
                     Systems,Payment
                     Services and Electronics Money Institution.
                 </p>
             </div>
         </div>
         <hr class="border border-white my-3" />
         <div class="allRights">
             <div class="me-auto copyText">
                 @2023. All rights reserved.
             </div>
             <ul class="bottom-links d-flex gap-5 mb-0">
                 <li><a href="javascript:;">Enlightenment Text</a></li>
                 <li><a href="javascript:;">Information Society Services</a></li>
                 <li><a href="javascript:;">Privacy Policy</a></li>
                 <li><a href="javascript:;">Legal Information</a></li>
                 <li><a href="javascript:;">Policies</a></li>
             </ul>
         </div>

     </div>
@include("front.includes.firebase-notification")
 </footer>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 {{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> --}}
 {{-- <script type="text/javascript"src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script> --}}
 <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
 {{-- <script src="https://www.gstatic.com/firebasejs/9.6.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.6.0/firebase-auth.js"></script> --}}




 <script>
     var firebaseConfig = {
         apiKey: "AIzaSyCi9vOusfNsRY2NgWUk8fDOjri9L8dALY8",
         authDomain: "sweedesinew.firebaseapp.com",
         databaseURL: "https://sweedesinew.firebaseio.com",
         projectId: "sweedesinew",
         storageBucket: "sweedesinew.appspot.com",
         messagingSenderId: "537186381446",
         appId: "1:537186381446:web:777955e71e5e61c8d62b07"
     };

     // Initialize Firebase before rendering reCAPTCHA
     firebase.initializeApp(firebaseConfig);
 </script>
