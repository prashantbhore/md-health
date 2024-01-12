@extends('admin.layout.layout') 
@section("content")
<section class="main-content">
    <div class="content-wrapper">
        <div class="page-title">Dashboard</div>
        <div class="row top-cards">
            <div class="col mb-3 pe-md-0">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2">
                            <div class="card-icon">
                                <svg width="30" height="30" viewBox="0 0 30 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.422 39.54C9.666 39.54 8.838 39.486 7.938 39.378C7.038 39.306 6.228 39.18 5.508 39V22.476L0.27 24.258V19.56L5.508 17.778V14.43L0.27 16.212V11.514L5.508 9.732V0.443998H13.392V7.032L21.816 4.116V8.814L13.392 11.73V15.078L21.816 12.162V16.806L13.392 19.722V32.952C15.66 32.556 17.424 31.8 18.684 30.684C19.98 29.568 20.88 28.11 21.384 26.31C21.924 24.51 22.194 22.44 22.194 20.1H29.592C29.592 22.584 29.268 24.996 28.62 27.336C27.972 29.64 26.91 31.71 25.434 33.546C23.994 35.382 22.032 36.84 19.548 37.92C17.1 39 14.058 39.54 10.422 39.54Z" fill="#EBEBEB" />
                                </svg>
                            </div>
                            <div class="card-text d-flex flex-column">
                                <p>Total Income (Weekly)</p>
                                <h4>366K</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-3 pe-md-0">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2">
                            <div class="card-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 44 44" fill="none">
                                    <path d="M36.0231 9.69139L25.6666 15.6717V3.71289H18.3332V15.6717L7.97672 9.69139L4.31006 16.0439L14.6647 22.0224L4.31006 28.0009L7.97672 34.3534L18.3332 28.3749V40.3337H25.6666V28.3749L36.0231 34.3534L39.6897 28.0009L29.3351 22.0224L39.6897 16.0439L36.0231 9.69139Z" fill="#EBEBEB" />
                                </svg>
                            </div>
                            <div class="card-text d-flex flex-column">
                                <p>Total Patient</p>
                                <h4>1.928</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-3 pe-md-0">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2">
                            <div class="card-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 43 43" fill="none">
                                    <path d="M37.4636 15.8384L15.3365 3.99553C14.8372 3.73042 14.2804 3.5918 13.7151 3.5918C13.1497 3.5918 12.5929 3.73042 12.0936 3.99553L5.55401 7.39969C4.96437 7.72282 4.47106 8.19668 4.12449 8.77285C3.77793 9.34903 3.59051 10.0069 3.5814 10.6792C3.57229 11.3515 3.74181 12.0142 4.07264 12.5996C4.40347 13.1849 4.88375 13.672 5.46443 14.0109L27.3586 26.4272C27.8904 26.7221 28.4884 26.8769 29.0965 26.8769C29.7046 26.8769 30.3027 26.7221 30.8344 26.4272L37.6248 22.4139C38.1936 22.0663 38.6608 21.5753 38.9797 20.99C39.2986 20.4048 39.4578 19.7459 39.4415 19.0796C39.4252 18.4133 39.2338 17.7631 38.8866 17.1941C38.5394 16.6252 38.0487 16.1577 37.4636 15.8384Z" stroke="#EBEBEB" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M21.4999 39.4168V23.2918M5.53618 15.8384L27.6633 3.99553C28.1626 3.73042 28.7194 3.5918 29.2847 3.5918C29.8501 3.5918 30.4068 3.73042 30.9062 3.99553L37.4458 7.39969C38.0402 7.71466 38.5403 8.18183 38.8949 8.75345C39.2495 9.32506 39.446 9.9806 39.4642 10.653C39.4825 11.3255 39.3218 11.9907 38.9986 12.5807C38.6754 13.1707 38.2014 13.6642 37.6249 14.0109L15.6412 26.4272C15.1094 26.7221 14.5113 26.8769 13.9033 26.8769C13.2952 26.8769 12.6971 26.7221 12.1653 26.4272L5.37493 22.4139C4.80622 22.0663 4.33895 21.5753 4.02008 20.99C3.7012 20.4048 3.54193 19.7459 3.55827 19.0796C3.57461 18.4133 3.76598 17.7631 4.11316 17.1941C4.46035 16.6252 4.95112 16.1577 5.53618 15.8384Z" stroke="#EBEBEB" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M35.8332 24.1875V30.2254C35.8339 30.9017 35.6488 31.5651 35.298 32.1433C34.9473 32.7216 34.4445 33.1923 33.8444 33.5042L23.0944 39.0225C22.6019 39.2785 22.0549 39.4121 21.4998 39.4121C20.9447 39.4121 20.3978 39.2785 19.9053 39.0225L9.15526 33.5042C8.5552 33.1923 8.05236 32.7216 7.70164 32.1433C7.35092 31.5651 7.16581 30.9017 7.16651 30.2254V24.1875" stroke="#EBEBEB" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="card-text">
                                <div class="card-text d-flex flex-column">
                                    <p>Total Package</p>
                                    <h4>728</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-3 pe-md-0">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2">
                            <div class="card-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 51 51" fill="none">
                                    <g clip-path="url(#clip0_643_353)">
                                        <path d="M31.6501 14.8476L38.8979 2.29395M23.5612 44.9689L9.60871 36.9135C9.10481 36.6221 8.73716 36.1427 8.58652 35.5805C8.43587 35.0183 8.51455 34.4192 8.80526 33.915L22.2863 10.5652C22.3617 10.4274 22.4671 10.3082 22.5946 10.2163C22.7221 10.1244 22.8686 10.0622 23.0232 10.0342L34.3329 8.79261C34.5868 8.74545 34.8491 8.79047 35.0727 8.91955C35.2962 9.04863 35.4664 9.25329 35.5524 9.49668L40.132 19.912C40.1851 20.0599 40.2045 20.2178 40.1887 20.3742C40.1729 20.5306 40.1223 20.6814 40.0407 20.8157L26.5597 44.1655C26.2683 44.6694 25.7889 45.037 25.2267 45.1877C24.6645 45.3383 24.0654 45.2597 23.5612 44.9689Z" stroke="#EBEBEB" stroke-width="2.14286" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_643_353">
                                            <rect width="41" height="41" fill="white" transform="translate(39.9956 0.392578) rotate(75)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="card-text">
                                <div class="card-text d-flex flex-column">
                                    <p>Total Product</p>
                                    <h4>2929</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2">
                            <div class="card-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 38 38" fill="none">
                                    <g clip-path="url(#clip0_462_8950)">
                                        <path d="M23.79 12.2148C23.79 14.9206 21.5937 17.1133 18.8856 17.1133C16.1805 17.1133 13.9878 14.92 13.9878 12.2148C13.9878 9.50972 16.1805 7.31641 18.8856 7.31641C21.5937 7.31641 23.79 9.50972 23.79 12.2148Z" fill="#EBEBEB" />
                                        <path d="M18.8933 0.311523C16.6264 0.311523 13.4599 1.21521 11.1663 3.50887L13.8904 8.47202C14.4857 7.71448 15.2454 7.10221 16.1121 6.6815C16.9789 6.26079 17.9299 6.04265 18.8933 6.04359C20.9471 6.04359 22.7747 7.01377 23.939 8.52249L26.6109 3.39487C24.626 1.2259 21.0665 0.311523 18.8933 0.311523ZM20.9121 3.95596H19.6438V5.22302H18.1203V3.95596H16.852V2.43299H18.1203V1.16059H19.6438V2.43299H20.9121V3.95596ZM12.4488 25.9182H13.7034L11.9114 32.0599H25.9127L24.129 25.9182H25.3848L27.1797 32.0599H31.2998L28.4878 22.7547C28.0484 21.2187 26.1223 18.5141 22.7984 18.4322L15.1569 18.4256C11.7577 18.4423 9.79116 21.1996 9.34644 22.7541L6.47981 32.0593H10.658L12.4488 25.9182ZM0.5625 34.0181H37.2147V37.5052H0.5625V34.0181Z" fill="#EBEBEB" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_462_8950">
                                            <rect width="44" height="44" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="card-text">
                                <div class="card-text d-flex flex-column">
                                    <p>Total Home Service</p>
                                    <h4>292</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Best Sales -->
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Best Sales (This Month)</div>
                        <div class="table-responsive" style="overflow-x: hidden">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Product ID</th>
                                        <th scope="col">Sales Quantity</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Price</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <th scope="row">#MD8739</th>
                                        <td>3299</td>
                                        <td>Hearth Valve Replacement Surgery</td>
                                        <td>₺ 34.382,90</td>
                                        <td>₺ 402.383,91</td>
                                        <td class="text-end">
                                             <a href="{{URL('admin/sales-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/re-direct.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#MD8739</th>
                                        <td>3089</td>
                                        <td>Home Patient Care Service</td>
                                        <td>₺ 29.382,90</td>
                                        <td>₺ 389.986,49</td>
                                        <td class="text-end">
                                             <a href="{{URL('admin/sales-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/re-direct.png')}}" alt="">
                                            </a>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th scope="row">#MD8739</th>
                                        <td>1726</td>
                                        <td>Hearth Valve Replacement Surgery</td>
                                        <td>₺ 34.382,90</td>
                                        <td>₺ 345.363,73</td>
                                        <td class="text-end">
                                             <a href="{{URL('admin/sales-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/re-direct.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#MD8739</th>
                                        <td>1625</td>
                                        <td>Home Patient Care Service</td>
                                        <td>₺ 29.382,90</td>
                                        <td>₺ 263.442,54</td>
                                        <td class="text-end">
                                             <a href="{{URL('admin/sales-details')}}">
                                                <img src="{{URL::asset('admin/assets/img/re-direct.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="viewAll w-full text-end">
                                <a href="#">View All</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Customer -->
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Recently Customer</div>
                        <div class="table-responsive" style="overflow-x: hidden">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Contact Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Ali Danish</th>
                                        <td>Male</td>
                                        <td>42</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>+90 578 555 21 21</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Melissa Pod</th>
                                        <td>Female</td>
                                        <td>24</td>
                                        <td>Birmingham</td>
                                        <td>United Kingdom</td>
                                        <td>+44 4444 44 44</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Ali Danish</th>
                                        <td>Male</td>
                                        <td>42</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>+90 578 555 21 21</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Melissa Pod</th>
                                        <td>Female</td>
                                        <td>24</td>
                                        <td>Birmingham</td>
                                        <td>United Kingdom</td>
                                        <td>+44 4444 44 44</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                            <div class="viewAll w-full text-end">
                                <a href="#">View All</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
@section('script')
<script>
    $(".dashboardLi").addClass("activeClass");
    $(".dashboard").addClass("md-active");
</script>
@endsection