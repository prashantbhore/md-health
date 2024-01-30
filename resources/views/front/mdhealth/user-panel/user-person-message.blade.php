@extends('front.layout.layout2')
@section('content')
<style>
    .person-message-div .treatment-card {
        box-shadow: 0px 0px 14px 0px rgba(0, 0, 0, 0.25);
    }

    .input-file-div label {
        padding: 5px 22px;
        border-radius: 35px;
        /* margin-bottom: 20px; */
        cursor: pointer;
    }

    .write-message {
        position: relative;
    }

    .write-message textarea:focus {
        box-shadow: 0px 0px 14px 0px rgba(0, 0, 0, 0.25);
    }

    .write-message textarea {
        box-shadow: 0px 0px 14px 0px rgba(0, 0, 0, 0.25);
        position: relative;
        padding: 15px 50px 15px 15px;
    }

    .write-message .send-msg-btn {
        position: absolute;
        right: 10px;
        top: 35%;
        bottom: 65%;
        z-index: 999;
    }

    .self-msg-div p:first-child {
        padding: 10px 25px;
        border-radius: 3px;
    }
</style>
<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="d-flex gap-3">
            <div class="w-292">
                @include('front.includes.sidebar-user')
            </div>
            <div class="w-761">
                <div class="card panel-right mb-4">
                    <div class="card-body d-flex" style="min-height:650px">
                        <div class="message-div d-flex justify-content-between flex-column w-100 ">
                            <div class="message-header">
                                <h5 class="d-flex align-items-center justify-content-between bg-light fw-700 p-3 mb-3 fsb-1">
                                    <div class="d-flex align-items-center gap-3">
                                        <img class="" src="{{ asset('front/assets/img/Memorial.svg') }}" alt="" style="width: 35px;height: 35px;">
                                        <span class="card-h1">Ali Danish</span>
                                    </div>
                                    <a href="{{ url('user-message') }}" class="d-flex align-items-center gap-1 text-decoration-none">
                                        <img src="{{ asset('front/assets/img/backPage.png') }}" alt=""> <span class="card-h1">Back Messages</span>
                                    </a>
                                </h5>
                                <div id="messages-container" style="max-height: 400px; overflow-y: auto;">
                                    {{-- <div class="self-msg-div mb-4">
                                        <p class="bg-light card-p1">Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit,
                                            sed do eiusmod tempor incididunt...</p>
                                        <p class="mb-0 card-p1 text-end">Monday 13:42</p>
                                    </div> --}}
                                    {{-- </div>
                                <div id="messages-other-container"> --}}
                                    {{-- <div class="person-message-div mb-4">
                                        <div class="treatment-card df-start mb-1">
                                            <div class="d-flex align-items-center justify-content-evenly gap-4">
                                                <img src="{{ asset('front/assets/img/Memorial.svg') }}" alt="">
                                    <div class="trmt-card-body pe-4">
                                        <h5 class="mb-0 text-end card-p1">Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud
                                            exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat.</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="day-time">
                                <p class="mb-0 card-p1">Monday 14:32</p>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <div class="footer-message-div">
                    <div class="input-file-div d-flex align-items-center justify-content-end gap-2 mb-3">
                        <a data-bs-toggle="modal" data-bs-target="#LiveRequestModal" class="go-live df-center gap-1 text-decoration-none text-light" style="height: 33px;width:265px;cursor:pointer">
                            <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.28622 1.11531C4.3637 1.1927 4.42517 1.28461 4.46711 1.38577C4.50904 1.48694 4.53063 1.59538 4.53063 1.70489C4.53063 1.8144 4.50904 1.92284 4.46711 2.02401C4.42517 2.12517 4.3637 2.21708 4.28622 2.29447C3.03576 3.54515 2.33327 5.24131 2.33327 7.00989C2.33327 8.77847 3.03576 10.4746 4.28622 11.7253C4.36582 11.8022 4.4293 11.8941 4.47298 11.9958C4.51665 12.0975 4.53964 12.2068 4.5406 12.3175C4.54156 12.4281 4.52048 12.5379 4.47858 12.6403C4.43667 12.7427 4.3748 12.8357 4.29655 12.914C4.21831 12.9922 4.12527 13.0541 4.02285 13.096C3.92044 13.1379 3.81071 13.159 3.70006 13.158C3.58941 13.1571 3.48006 13.1341 3.37839 13.0904C3.27672 13.0467 3.18476 12.9832 3.10789 12.9036C-0.147943 9.64864 -0.147943 4.37031 3.10789 1.11531C3.26416 0.959082 3.47609 0.871319 3.69706 0.871319C3.91803 0.871319 4.12995 0.959082 4.28622 1.11531ZM14.8962 1.11531C18.1512 4.37114 18.1512 9.64864 14.8962 12.9036C14.74 13.06 14.528 13.1479 14.3069 13.148C14.0859 13.1481 13.8738 13.0603 13.7175 12.9041C13.5611 12.7478 13.4732 12.5358 13.4731 12.3148C13.4731 12.0937 13.5608 11.8817 13.7171 11.7253C14.9675 10.4746 15.67 8.77847 15.67 7.00989C15.67 5.24131 14.9675 3.54515 13.7171 2.29447C13.5607 2.13811 13.4728 1.92603 13.4728 1.70489C13.4728 1.48375 13.5607 1.27167 13.7171 1.11531C13.8734 0.95894 14.0855 0.871094 14.3066 0.871094C14.5278 0.871094 14.7399 0.95894 14.8962 1.11531ZM6.75872 3.51031C6.91495 3.66658 7.00271 3.8785 7.00271 4.09947C7.00271 4.32044 6.91495 4.53237 6.75872 4.68864C6.45535 4.99198 6.2147 5.35211 6.05051 5.74846C5.88633 6.14482 5.80182 6.56963 5.80182 6.99864C5.80182 7.42765 5.88633 7.85246 6.05051 8.24882C6.2147 8.64517 6.45535 9.0053 6.75872 9.30864C6.8361 9.38607 6.89746 9.47797 6.93931 9.57911C6.98116 9.68025 7.00268 9.78864 7.00264 9.8981C7.0026 10.0076 6.98101 10.1159 6.93908 10.217C6.89716 10.3182 6.83573 10.41 6.75831 10.4874C6.68088 10.5648 6.58898 10.6261 6.48784 10.668C6.3867 10.7098 6.2783 10.7313 6.16885 10.7313C6.05939 10.7313 5.95101 10.7097 5.8499 10.6677C5.74879 10.6258 5.65693 10.5644 5.57956 10.487C4.65442 9.5618 4.13468 8.30701 4.13468 6.99864C4.13468 5.69027 4.65442 4.43548 5.57956 3.51031C5.65695 3.43283 5.74886 3.37136 5.85002 3.32942C5.95119 3.28749 6.05963 3.2659 6.16914 3.2659C6.27865 3.2659 6.38709 3.28749 6.48826 3.32942C6.58942 3.37136 6.68133 3.43283 6.75872 3.51031ZM12.5571 3.51031C13.4822 4.43548 14.0019 5.69027 14.0019 6.99864C14.0019 8.30701 13.4822 9.5618 12.5571 10.487C12.3999 10.6388 12.1894 10.7228 11.9709 10.7209C11.7524 10.719 11.5434 10.6313 11.3889 10.4768C11.2344 10.3223 11.1467 10.1133 11.1448 9.89481C11.1429 9.67631 11.2269 9.46581 11.3787 9.30864C11.6821 9.0053 11.9227 8.64517 12.0869 8.24882C12.2511 7.85246 12.3356 7.42765 12.3356 6.99864C12.3356 6.56963 12.2511 6.14482 12.0869 5.74846C11.9227 5.35211 11.6821 4.99198 11.3787 4.68864C11.2269 4.53147 11.1429 4.32097 11.1448 4.10247C11.1467 3.88398 11.2344 3.67497 11.3889 3.52046C11.5434 3.36595 11.7524 3.27831 11.9709 3.27641C12.1894 3.27451 12.3999 3.35851 12.5571 3.51031ZM9.06872 5.81864C9.23288 5.81864 9.39542 5.85097 9.54708 5.91379C9.69874 5.97661 9.83653 6.06868 9.95261 6.18476C10.0687 6.30083 10.1608 6.43863 10.2236 6.59029C10.2864 6.74194 10.3187 6.90449 10.3187 7.06864C10.3187 7.23279 10.2864 7.39534 10.2236 7.547C10.1608 7.69865 10.0687 7.83645 9.95261 7.95252C9.83653 8.0686 9.69874 8.16067 9.54708 8.22349C9.39542 8.28631 9.23288 8.31864 9.06872 8.31864C8.7372 8.31864 8.41926 8.18694 8.18484 7.95252C7.95042 7.7181 7.81872 7.40016 7.81872 7.06864C7.81872 6.73712 7.95042 6.41918 8.18484 6.18476C8.41926 5.95034 8.7372 5.81864 9.06872 5.81864Z" fill="white" />
                            </svg>
                            Send Live Consultation Request
                        </a>
                        <label for="attachfile" class="bg-light">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.8746 2.18752C11.2586 2.18587 10.6483 2.30631 10.0791 2.54189C9.50994 2.77747 8.99306 3.12351 8.55837 3.56002L2.81462 9.30502C2.63842 9.48089 2.5393 9.71955 2.53906 9.96851C2.53883 10.2175 2.6375 10.4563 2.81337 10.6325C2.98924 10.8087 3.22791 10.9078 3.47686 10.9081C3.72582 10.9083 3.96467 10.8096 4.14087 10.6338L9.88712 4.88627C10.4217 4.39483 11.1254 4.12897 11.8514 4.14422C12.5774 4.15947 13.2694 4.45465 13.7828 4.96809C14.2962 5.48154 14.5914 6.17352 14.6067 6.89948C14.6219 7.62544 14.3561 8.32922 13.8646 8.86377L7.23587 15.4925C7.05815 15.6581 6.8231 15.7483 6.58022 15.744C6.33734 15.7397 6.10561 15.6413 5.93385 15.4695C5.76208 15.2978 5.66369 15.066 5.6594 14.8232C5.65512 14.5803 5.74527 14.3452 5.91087 14.1675L12.5396 7.53877C12.7158 7.36273 12.8149 7.12391 12.815 6.87483C12.8151 6.62576 12.7163 6.38685 12.5402 6.21064C12.3642 6.03444 12.1254 5.93538 11.8763 5.93527C11.6272 5.93515 11.3883 6.03398 11.2121 6.21002L4.58212 12.8413C4.09069 13.3758 3.82483 14.0796 3.84008 14.8055C3.85532 15.5315 4.1505 16.2235 4.66395 16.7369C5.17739 17.2504 5.86938 17.5456 6.59534 17.5608C7.3213 17.5761 8.02507 17.3102 8.55962 16.8188L15.1884 10.19C15.6252 9.75575 15.9715 9.23915 16.2073 8.67013C16.4431 8.10111 16.5637 7.49096 16.5621 6.87502C16.5608 5.63222 16.0665 4.44071 15.1877 3.56192C14.3089 2.68313 13.1174 2.18884 11.8746 2.18752Z" fill="#969696" />
                            </svg>
                        </label>
                        <input type="file" id="attachfile" hidden>
                    </div>
                    <div class="write-message">
                        <textarea class="form-control border-0" id="productstext" rows="3" placeholder="Your message here" data-gramm="false" wt-ignore-input="true"></textarea>
                        <button class="border-0 bg-white send-msg-btn" id="sendMessageButton">
                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.41634 12.9998L4.762 7.10967C4.57459 5.424 6.31009 4.18575 7.843 4.91267L20.7823 11.0422C22.4344 11.8243 22.4344 14.1752 20.7823 14.9573L7.843 21.0868C6.31009 21.8127 4.57459 20.5755 4.762 18.8898L5.41634 12.9998ZM5.41634 12.9998H12.9997" stroke="#878787" stroke-width="1.45833" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="LiveRequestModal" tabindex="-1" aria-labelledby="LiveRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0 flex-column position-relative">
                <h5 class="modal-title fs-5 modal-h1 mb-2" id="LiveRequestModalLabel">Make a Live Conversation
                    Appoinment</h5>
                <p class="mb-0 card-p1">Fill the form & get your live conversation appoinment</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" class="user-profile-form" method="php" id="">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="*Conversation Subject" class="form-label">*Conversation Subject</label>
                            <select name="" id="" class="form-select">
                                <option value="" selected disabled>About Treatments</option>
                                <option value="">About Service</option>
                                <option value="">Technical</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="*Conversation Subject" class="form-label">*Conversation Subject</label>
                            <select name="" id="" class="form-select">
                                <option value="" selected>Today</option>
                                <option value="">Tommorow</option>
                                <option value="">Sunday</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-5">
                            <div class="d-flex flex-wrap gap-3 appTime">
                                <button class="btn">09:30</button>
                                <button class="btn btn-selected">09:30</button>
                                <button class="btn btn-selected">09:30</button>
                                <button class="btn btn-selected">09:30</button>
                                <button class="btn">09:30</button>
                                <button class="btn">09:30</button>
                                <button class="btn">09:30</button>
                                <button class="btn">09:30</button>
                                <button class="btn btn-selected">09:30</button>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3 text-center">
                            <button class="btn btn-md rounded btn-text submit" type="submit" style="height: 48px;width:305px">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@include('front.includes.initialize-firebase-messaging')
@endsection
@section('script')
<script>
    $(".upMessagesLi").addClass("activeClass");
    $(".upMessages").addClass("md-active");
</script>
@endsection