@php
// dd(Session::all());
if (Session::get('MDCustomer*%') != null) {
$name = !empty(session('user')) ? (session('user')->first_name ? session('user')->first_name : 'MDHealth') : 'MDHealth';
} elseif (Session::get('MDMedicalProvider*%') != null) {
$name = !empty(session('user')) ? (session('user')->company_name ? session('user')->company_name : 'MDHealth') : 'MDHealth';
} else {
$name = 'MDHealth';
}
@endphp

<style>
    @media only screen and (min-width: 992px) {
        .nav2-menu .dropdown:hover .dropdown-menu {
            display: flex;
        }

        .nav2-menu .dropdown-menu.show {
            display: flex;
        }
    }

    .nav2-menu .dropdown-menu ul {
        list-style: none;
        padding: 0;
    }

    .nav2-menu .dropdown-menu li .dropdown-item {
        color: gray;
        font-size: 1em;
        padding: 0.5em 1em;
    }

    .nav2-menu .dropdown-menu li .dropdown-item:hover {
        background-color: #f1f1f1;
    }

    .nav2-menu .dropdown-menu li:first-child a {
        font-weight: bold;
        font-size: 1.1em;
        text-transform: uppercase;
        color: #516beb;
    }

    .nav2-menu .dropdown-menu li:first-child a:hover {
        background-color: #f1f1f1;
    }

    @media only screen and (max-width: 992px) {
        .nav2-menu .dropdown-menu.show {
            flex-wrap: wrap;
            max-height: 350px;
            overflow-y: scroll;
        }
    }

    @media only screen and (min-width: 992px) and (max-width: 1140px) {
        .nav2-menu .dropdown:hover .dropdown-menu {
            width: 40vw;
            flex-wrap: wrap;
        }
    }

    .dropdown-menu {
        border-radius: 0;
        border: none;
        padding: 0.5em;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.23);
    }

   .nav2-menu .dropdown-menu ul {
        list-style: none;
        padding: 0;
    }

   .nav2-menu .dropdown-menu li a {
        color: gray;
        padding: 0.5em 1em;
    }

   .nav2-menu .dropdown-menu li:first-child a {
        font-weight: bold;
        font-size: 1.1em;
        color: #516beb;
    }

    @media screen and (min-width: 993px) {
        .nav2-menu  .dropdown:hover .dropdown-menu {
            display: flex;
        }

        .nav2-menu .dropdown-menu.show {
            display: flex;
        }
    }

    @media screen and (max-width: 992px) {
        .nav2-menu .dropdown-menu.show {
            max-height: 60vh;
            overflow-y: scroll;
        }
    }
</style>
<nav id="mdShopNav" class="navbar navbar-expand-lg navbar-light bg-f6 py-3">
    <img class="mdShopNavBg" src="{{ URL('front/assets/img/mdShopNavBg.png') }}" alt="">

    <div class="container p-0">
        <a class="navbar-brand" href="javascript:void(0)">
            <img src="{{ URL::asset('front/assets/img/MDShop.svg') }}" alt="" style="width: 180px;" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav align-items-center gap-5">
                <li class="nav-item"><a href="{{ url('home-service') }}" class="nav-link">Home Service</a></li>
                <li class="nav-item"><a href="{{ url('md-booking-home-page') }}" class="nav-link"><span class="fw-bold">MD</span>Booking</a></li>
                <li class="nav-item"><a href="{{ url('mdFoods') }}" class="nav-link"><span class="fw-bold">MD</span>Foods</a></li>
                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link"><span class="fw-bold">MD</span>Health</a></li>
                @if (Session::get('login_token') != null)

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                            <path d="M15.4375 6.33366C16.9654 6.33366 18.2083 5.09074 18.2083 3.56283C18.2083 2.03491 16.9654 0.791992 15.4375 0.791992C13.9096 0.791992 12.6667 2.03491 12.6667 3.56283C12.6667 5.09074 13.9096 6.33366 15.4375 6.33366ZM16.625 12.667V7.75074C16.2292 7.86158 15.8333 7.91699 15.4375 7.91699H15.0417V12.667C15.0417 13.9812 13.9808 15.042 12.6667 15.042H6.33333C5.01917 15.042 3.95833 13.9812 3.95833 12.667V6.33366C3.95833 5.01949 5.01917 3.95866 6.33333 3.95866H11.0833V3.56283C11.0833 3.16699 11.1387 2.77116 11.2496 2.37533H6.33333C4.14833 2.37533 2.375 4.14866 2.375 6.33366V12.667C2.375 14.852 4.14833 16.6253 6.33333 16.6253H12.6667C14.8517 16.6253 16.625 14.852 16.625 12.667Z" fill="#4CDB06" />
                        </svg>
                    </a>
                </li>

                <li class="nav-item dropdown ms-auto">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Welcome <span class="text-green me-1">
                            {{ $name }}</span> <svg xmlns="http://www.w3.org/2000/svg" width="13" height="8" viewBox="0 0 13 8" fill="none">
                            {{-- {{(session('user')->company_name)?session('user')->company_name:MDHealth}} --}}
                            <path d="M1 1.00042L6.5 6.35449L12 1.00042" stroke="#4CDB06" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg></a>
                    @if (Session::get('MDCustomer*%') != null)
                    <ul class="dropdown-menu animate slideIn" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="{{ url('/my-profile') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 12 12" fill="none">
                                    <g clip-path="url(#clip0_187_7253)">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4.5C8 5.03043 7.78929 5.53914 7.41421 5.91421C7.03914 6.28929 6.53043 6.5 6 6.5C5.46957 6.5 4.96086 6.28929 4.58579 5.91421C4.21071 5.53914 4 5.03043 4 4.5C4 3.96957 4.21071 3.46086 4.58579 3.08579C4.96086 2.71071 5.46957 2.5 6 2.5C6.53043 2.5 7.03914 2.71071 7.41421 3.08579C7.78929 3.46086 8 3.96957 8 4.5ZM7 4.5C7 4.76522 6.89464 5.01957 6.70711 5.20711C6.51957 5.39464 6.26522 5.5 6 5.5C5.73478 5.5 5.48043 5.39464 5.29289 5.20711C5.10536 5.01957 5 4.76522 5 4.5C5 4.23478 5.10536 3.98043 5.29289 3.79289C5.48043 3.60536 5.73478 3.5 6 3.5C6.26522 3.5 6.51957 3.60536 6.70711 3.79289C6.89464 3.98043 7 4.23478 7 4.5Z" fill="#111111" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6 0.5C2.9625 0.5 0.5 2.9625 0.5 6C0.5 9.0375 2.9625 11.5 6 11.5C9.0375 11.5 11.5 9.0375 11.5 6C11.5 2.9625 9.0375 0.5 6 0.5ZM1.5 6C1.5 7.045 1.8565 8.007 2.454 8.771C2.87362 8.21995 3.41495 7.77337 4.03572 7.46616C4.65648 7.15894 5.33987 6.9994 6.0325 7C6.71616 6.99935 7.39096 7.15476 8.00547 7.45439C8.61997 7.75402 9.15798 8.18996 9.5785 8.729C10.0117 8.1608 10.3034 7.49761 10.4294 6.79429C10.5555 6.09098 10.5122 5.36777 10.3032 4.68449C10.0943 4.00122 9.72561 3.37752 9.22774 2.86502C8.72988 2.35251 8.11713 1.96593 7.44019 1.73725C6.76326 1.50858 6.0416 1.44439 5.33493 1.54999C4.62826 1.65559 3.9569 1.92795 3.37638 2.34453C2.79587 2.76111 2.32291 3.30994 1.99661 3.9456C1.67032 4.58126 1.50009 5.28548 1.5 6ZM6 10.5C4.96697 10.5016 3.96513 10.1462 3.164 9.494C3.48646 9.03237 3.91567 8.65546 4.4151 8.39534C4.91452 8.13523 5.46939 7.9996 6.0325 8C6.58858 7.99955 7.13674 8.13179 7.63146 8.38571C8.12618 8.63964 8.55318 9.00793 8.877 9.46C8.06965 10.1334 7.05129 10.5015 6 10.5Z" fill="#111111" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_187_7253">
                                            <rect width="14" height="14" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ url('my-packages-list') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <g clip-path="url(#clip0_321_962)">
                                        <path d="M12.1975 5.15665L4.99337 1.30082C4.83079 1.21451 4.64953 1.16937 4.46546 1.16937C4.28138 1.16937 4.10012 1.21451 3.93754 1.30082L1.80837 2.40915C1.6164 2.51436 1.45579 2.66864 1.34295 2.85623C1.23011 3.04382 1.1691 3.258 1.16613 3.4769C1.16316 3.69579 1.21836 3.91155 1.32607 4.10213C1.43378 4.29271 1.59015 4.45129 1.77921 4.56165L8.90754 8.60415C9.08067 8.70017 9.2754 8.75055 9.47337 8.75055C9.67135 8.75055 9.86607 8.70017 10.0392 8.60415L12.25 7.29749C12.4352 7.18434 12.5873 7.02446 12.6912 6.83391C12.795 6.64337 12.8468 6.42885 12.8415 6.21192C12.8362 5.99499 12.7739 5.78328 12.6608 5.59805C12.5478 5.41281 12.388 5.26059 12.1975 5.15665Z" stroke="#111111" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7.00005 12.8333V7.58332M1.80255 5.15665L9.00671 1.30082C9.16929 1.21451 9.35056 1.16937 9.53463 1.16937C9.7187 1.16937 9.89997 1.21451 10.0625 1.30082L12.1917 2.40915C12.3852 2.5117 12.5481 2.6638 12.6635 2.84991C12.779 3.03602 12.843 3.24945 12.8489 3.46838C12.8548 3.68732 12.8025 3.9039 12.6973 4.09599C12.5921 4.28808 12.4377 4.44877 12.25 4.56165L5.09255 8.60415C4.91941 8.70017 4.72469 8.75055 4.52671 8.75055C4.32874 8.75055 4.13401 8.70017 3.96088 8.60415L1.75005 7.29749C1.56488 7.18434 1.41275 7.02446 1.30893 6.83391C1.20511 6.64337 1.15326 6.42885 1.15857 6.21192C1.16389 5.99499 1.2262 5.78328 1.33924 5.59805C1.45227 5.41281 1.61206 5.26059 1.80255 5.15665Z" stroke="#111111" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M11.6667 7.875V9.84083C11.6669 10.061 11.6067 10.277 11.4925 10.4653C11.3783 10.6535 11.2146 10.8068 11.0192 10.9083L7.51921 12.705C7.35884 12.7883 7.18077 12.8319 7.00004 12.8319C6.81931 12.8319 6.64124 12.7883 6.48087 12.705L2.98087 10.9083C2.78551 10.8068 2.62179 10.6535 2.5076 10.4653C2.39342 10.277 2.33315 10.061 2.33337 9.84083V7.875" stroke="#111111" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_321_962">
                                            <rect width="14" height="14" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                Packages
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 10 10" fill="none">
                                    <g clip-path="url(#clip0_187_7257)">
                                        <path d="M4.375 2.5V3.125H2.5V2.5H4.375ZM2.5 4.375V3.75H4.375V4.375H2.5ZM2.5 5.625V5H3.75V5.625H2.5ZM1.875 2.5V3.125H1.25V2.5H1.875ZM1.875 3.75V4.375H1.25V3.75H1.875ZM1.25 5.625V5H1.875V5.625H1.25ZM0.625 0.625V9.375H3.75V10H0V0H5.44434L8.125 2.68066V3.75H7.5V3.125H5V0.625H0.625ZM5.625 1.06934V2.5H7.05566L5.625 1.06934ZM8.75 5H10V10H4.375V5H5.625V4.375H6.25V5H8.125V4.375H8.75V5ZM9.375 9.375V6.875H5V9.375H9.375ZM9.375 6.25V5.625H5V6.25H9.375Z" fill="#111111" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_187_7257">
                                            <rect width="14" height="14" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                Reservations
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <path d="M1.75 11.8358V2.91667C1.75 2.60725 1.87292 2.3105 2.09171 2.09171C2.3105 1.87292 2.60725 1.75 2.91667 1.75H11.0833C11.3928 1.75 11.6895 1.87292 11.9083 2.09171C12.1271 2.3105 12.25 2.60725 12.25 2.91667V8.75C12.25 9.05942 12.1271 9.35616 11.9083 9.57496C11.6895 9.79375 11.3928 9.91667 11.0833 9.91667H4.64392C4.46905 9.91669 4.29643 9.95602 4.13882 10.0317C3.9812 10.1075 3.84262 10.2177 3.73333 10.3542L2.37358 12.054C2.32833 12.1107 2.26658 12.152 2.19686 12.172C2.12714 12.1921 2.0529 12.19 1.98442 12.1661C1.91594 12.1421 1.85659 12.0975 1.8146 12.0383C1.7726 11.9791 1.75003 11.9084 1.75 11.8358Z" stroke="#111111" stroke-width="0.875" />
                                </svg>
                                Messages
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 12 12" fill="none">
                                    <path d="M3 6.5C1.895 6.5 1 7.395 1 8.5C1 9.605 1.895 10.5 3 10.5C4.105 10.5 5 9.605 5 8.5C5 7.395 4.105 6.5 3 6.5ZM3 9.5C2.45 9.5 2 9.05 2 8.5C2 7.95 2.45 7.5 3 7.5C3.55 7.5 4 7.95 4 8.5C4 9.05 3.55 9.5 3 9.5ZM3 1.5C1.895 1.5 1 2.395 1 3.5C1 4.605 1.895 5.5 3 5.5C4.105 5.5 5 4.605 5 3.5C5 2.395 4.105 1.5 3 1.5ZM6 2.5H11V3.5H6V2.5ZM6 9.5V8.5H11V9.5H6ZM6 5.5H11V6.5H6V5.5Z" fill="#111111" />
                                </svg>
                                Orders
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 12 12" fill="none">
                                    <path d="M3 4H5" stroke="#111111" stroke-width="0.625" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M10.4165 4.5H9.1155C8.223 4.5 7.5 5.1715 7.5 6C7.5 6.8285 8.2235 7.5 9.115 7.5H10.4165C10.4585 7.5 10.479 7.5 10.4965 7.499C10.7665 7.4825 10.9815 7.283 10.999 7.0325C11 7.0165 11 6.997 11 6.9585V5.0415C11 5.003 11 4.9835 10.999 4.9675C10.981 4.717 10.7665 4.5175 10.4965 4.501C10.4795 4.5 10.4585 4.5 10.4165 4.5Z" stroke="#111111" stroke-width="0.625" />
                                    <path d="M10.4825 4.5C10.4435 3.564 10.3185 2.99 9.914 2.586C9.3285 2 8.3855 2 6.5 2H5C3.1145 2 2.1715 2 1.586 2.586C1 3.1715 1 4.1145 1 6C1 7.8855 1 8.8285 1.586 9.414C2.1715 10 3.1145 10 5 10H6.5C8.3855 10 9.3285 10 9.914 9.414C10.3185 9.01 10.444 8.436 10.4825 7.5" stroke="#111111" stroke-width="0.625" />
                                    <path d="M8.99548 6H8.99965" stroke="#111111" stroke-width="0.833333" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Wallet
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <path d="M7.58337 4.25002H10.7917L7.58337 1.04169V4.25002ZM3.50004 0.166687H8.16671L11.6667 3.66669V10.6667C11.6667 10.9761 11.5438 11.2729 11.325 11.4916C11.1062 11.7104 10.8095 11.8334 10.5 11.8334H3.50004C3.19062 11.8334 2.89388 11.7104 2.67508 11.4916C2.45629 11.2729 2.33337 10.9761 2.33337 10.6667V1.33335C2.33337 0.685854 2.85254 0.166687 3.50004 0.166687ZM4.08337 10.6667H5.25004V7.16669H4.08337V10.6667ZM6.41671 10.6667H7.58337V6.00002H6.41671V10.6667ZM8.75004 10.6667H9.91671V8.33335H8.75004V10.6667Z" fill="#111111" />
                                </svg>
                                Reports
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 13 13" fill="none">
                                    <path d="M10.2916 12.6208L9.96663 12.35C8.88329 11.3208 8.12496 10.6708 8.12496 9.85831C8.12496 9.20831 8.66663 8.66665 9.31663 8.66665C9.69579 8.66665 10.075 8.82915 10.2916 9.09998C10.5083 8.82915 10.8875 8.66665 11.2666 8.66665C11.9166 8.66665 12.4583 9.15415 12.4583 9.85831C12.4583 10.6708 11.7 11.3208 10.6166 12.35L10.2916 12.6208ZM9.74996 1.08331C10.3458 1.08331 10.8333 1.57081 10.8333 2.16665V7.08498L10.2916 7.04165L9.74996 7.08498V2.16665H7.04163V6.49998L5.68746 5.28123L4.33329 6.49998V2.16665H3.24996V10.8333H7.08496C7.14996 11.2233 7.28538 11.5862 7.47496 11.9166H3.24996C2.65413 11.9166 2.16663 11.4291 2.16663 10.8333V2.16665C2.16663 1.57081 2.65413 1.08331 3.24996 1.08331H9.74996Z" fill="#111111" />
                                </svg>
                                Favorites
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ url('logout') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 11 12" fill="none">
                                    <circle cx="5.5" cy="5.5" r="5.5" fill="#D9D9D9" />
                                    <path d="M7.78148 8H6.54148L5.27148 6.35L3.98148 8H2.75148L4.57148 5.63L2.76148 3.29H4.03148L5.26148 4.88L6.49148 3.29H7.76148L5.96148 5.63L5.95148 5.64L7.78148 8Z" fill="black" />
                                </svg>
                                Log Out
                            </a>
                        </li>
                    </ul>
                    @elseif(Session::get('MDMedicalProvider*%') != null)
                    <ul class="dropdown-menu animate slideIn" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="{{ url('/medical-provider-dashboard') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 12 12" fill="none">
                                    <g clip-path="url(#clip0_187_7253)">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4.5C8 5.03043 7.78929 5.53914 7.41421 5.91421C7.03914 6.28929 6.53043 6.5 6 6.5C5.46957 6.5 4.96086 6.28929 4.58579 5.91421C4.21071 5.53914 4 5.03043 4 4.5C4 3.96957 4.21071 3.46086 4.58579 3.08579C4.96086 2.71071 5.46957 2.5 6 2.5C6.53043 2.5 7.03914 2.71071 7.41421 3.08579C7.78929 3.46086 8 3.96957 8 4.5ZM7 4.5C7 4.76522 6.89464 5.01957 6.70711 5.20711C6.51957 5.39464 6.26522 5.5 6 5.5C5.73478 5.5 5.48043 5.39464 5.29289 5.20711C5.10536 5.01957 5 4.76522 5 4.5C5 4.23478 5.10536 3.98043 5.29289 3.79289C5.48043 3.60536 5.73478 3.5 6 3.5C6.26522 3.5 6.51957 3.60536 6.70711 3.79289C6.89464 3.98043 7 4.23478 7 4.5Z" fill="#111111" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6 0.5C2.9625 0.5 0.5 2.9625 0.5 6C0.5 9.0375 2.9625 11.5 6 11.5C9.0375 11.5 11.5 9.0375 11.5 6C11.5 2.9625 9.0375 0.5 6 0.5ZM1.5 6C1.5 7.045 1.8565 8.007 2.454 8.771C2.87362 8.21995 3.41495 7.77337 4.03572 7.46616C4.65648 7.15894 5.33987 6.9994 6.0325 7C6.71616 6.99935 7.39096 7.15476 8.00547 7.45439C8.61997 7.75402 9.15798 8.18996 9.5785 8.729C10.0117 8.1608 10.3034 7.49761 10.4294 6.79429C10.5555 6.09098 10.5122 5.36777 10.3032 4.68449C10.0943 4.00122 9.72561 3.37752 9.22774 2.86502C8.72988 2.35251 8.11713 1.96593 7.44019 1.73725C6.76326 1.50858 6.0416 1.44439 5.33493 1.54999C4.62826 1.65559 3.9569 1.92795 3.37638 2.34453C2.79587 2.76111 2.32291 3.30994 1.99661 3.9456C1.67032 4.58126 1.50009 5.28548 1.5 6ZM6 10.5C4.96697 10.5016 3.96513 10.1462 3.164 9.494C3.48646 9.03237 3.91567 8.65546 4.4151 8.39534C4.91452 8.13523 5.46939 7.9996 6.0325 8C6.58858 7.99955 7.13674 8.13179 7.63146 8.38571C8.12618 8.63964 8.55318 9.00793 8.877 9.46C8.06965 10.1334 7.05129 10.5015 6 10.5Z" fill="#111111" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_187_7253">
                                            <rect width="14" height="14" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ url('logout') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 11 12" fill="none">
                                    <circle cx="5.5" cy="5.5" r="5.5" fill="#D9D9D9" />
                                    <path d="M7.78148 8H6.54148L5.27148 6.35L3.98148 8H2.75148L4.57148 5.63L2.76148 3.29H4.03148L5.26148 4.88L6.49148 3.29H7.76148L5.96148 5.63L5.95148 5.64L7.78148 8Z" fill="black" />
                                </svg>
                                Log Out
                            </a>
                        </li>
                    </ul>
                    @endif
                </li>
                @endif
            </ul>

            @if (Session::get('login_token') == null)
            <a href="{{ url('sign-in-web') }}" class="nav-link underline text-white text-underline">Sign In</a>

            <a href="{{ url('user-account') }}" type="button" class="btn btn-sm btn-md df-center">Get
                Started</a>
            @endif
        </div>

    </div>

    <div class="container">
        <!-- <div class="nav2">
            <p class="mb-0 brdr-right">Equipment</p>
            <p class="mb-0">Injection & Infusion</p>
            <p class="mb-0">Emergency & First Aid</p>
            <p class="mb-0">Hygience & Disinfection</p>
            <p class="mb-0">Instruments</p>
            <p class="mb-0">More</p>
        </div> -->
        <div class="container nav2-menu">
            <nav class="navbar navbar-expand-lg navbar-dark shadow" style="background-color: #fff;">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-5">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Equipment
                                </a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Mega Menu Link</a></li>
                                        <li><a class="dropdown-item" href="#">Mega Menu Link</a></li>
                                        <li><a class="dropdown-item" href="#">Mega Menu Link</a></li>
                                        <li><a class="dropdown-item" href="#">Mega Menu Link</a></li>

                                    </ul>
                                    <ul>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Mega Menu Link</a></li>
                                        <li><a class="dropdown-item" href="#">Mega Menu Link</a></li>
                                        <li><a class="dropdown-item" href="#">Mega Menu Link</a></li>
                                        <li><a class="dropdown-item" href="#">Mega Menu Link</a></li>

                                    </ul>
                                    <ul>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        <li><a class="dropdown-item" href="#">Mega Menu Link</a></li>
                                        <li><a class="dropdown-item" href="#">Mega Menu Link</a></li>
                                        <li><a class="dropdown-item" href="#">Mega Menu Link</a></li>
                                        <li><a class="dropdown-item" href="#">Mega Menu Link</a></li>

                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Injection & Infusion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Emergency & First Aid Kit</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>

            <p class="mt-5 text-center">Get a step-by-step written explanation here: <a href="https://codingyaar.com/bootstrap-mega-menu-1/" target="_blank">Bootstrap 5 Mega Menu</a> </p>

            <p class="mt-5 text-center">Get a step-by-step video explanation here: <a href="https://youtu.be/V5MquVuKlU4" target="_blank">Bootstrap 5 Mega Menu</a> </p>
        </div>

        <!-- <h1 class="c-text"> Bootstrap Mega Menu </h1> -->
    </div>
</nav>