@extends('front.layout.layout2') @section("content")
<style>
    .message-head a {
        padding: 10px 13px;
        border-radius: 25px;
        background: #d6d6d6;
        color: #828282;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        width: 285px;
    }



    .trmt-card-body {
        position: relative;
    }

   

    .no-msg-div a:last-child {
        /* padding: 13px 20px; */
        background: #fe4949;
        border-radius: 25px;
        line-height: 0;
        color: #fff;
        text-decoration: none;
    }

    .message-body a {
        text-decoration: none;
        color: #000;
    }
</style>
<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="row">
            <div class="col-md-3">
                @include('front.includes.sidebar-user')
            </div>

            <div class="col-md-9">
                <div class="card mb-4">
                    <div class="form-div">
                        <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                            <span>Message</span>
                        </h5>

                        <div class="card-body">
                            <div class="mediacal-message-div mb-3">
                                <div class="message-body">
                                    <a href="{{url('user-person-message')}}">
                                        <div class="treatment-card d-flex align-items-center gap-3 w-100 mb-3 position-relative active-new-msg">
                                            <div class="">
                                                <img src="{{asset('front/assets/img/msg.png')}}" alt="" />
                                            </div>
                                            <div class="w-80">
                                                <h5 class="card-h1">Writen By: Acıbadem Hospital</h5>
                                                <p class="card-p1 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt...</p>
                                                <span class="active popup-msg">New Message</span>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{url('user-person-message')}}">
                                        <div class="treatment-card d-flex align-items-center gap-3 w-100 mb-3 ">
                                            <div class="">
                                                <img src="{{asset('front/assets/img/Memorial.svg')}}" alt="" />
                                            </div>
                                            <div class="w-80">
                                                <h5 class="card-h1">Writen By: Memorial Hospital</h5>
                                                <p class="card-p1 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt...</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="no-msg-div d-flex align-items-center flex-column justify-content-around" style="height: 150px;">
                                    <p class="mb-0">You don't have any message</p>

                                    <a href="{{url('live-consultation-appoinment')}}" class="go-live df-center gap-1">
                                        <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.28622 1.11531C4.3637 1.1927 4.42517 1.28461 4.46711 1.38577C4.50904 1.48694 4.53063 1.59538 4.53063 1.70489C4.53063 1.8144 4.50904 1.92284 4.46711 2.02401C4.42517 2.12517 4.3637 2.21708 4.28622 2.29447C3.03576 3.54515 2.33327 5.24131 2.33327 7.00989C2.33327 8.77847 3.03576 10.4746 4.28622 11.7253C4.36582 11.8022 4.4293 11.8941 4.47298 11.9958C4.51665 12.0975 4.53964 12.2068 4.5406 12.3175C4.54156 12.4281 4.52048 12.5379 4.47858 12.6403C4.43667 12.7427 4.3748 12.8357 4.29655 12.914C4.21831 12.9922 4.12527 13.0541 4.02285 13.096C3.92044 13.1379 3.81071 13.159 3.70006 13.158C3.58941 13.1571 3.48006 13.1341 3.37839 13.0904C3.27672 13.0467 3.18476 12.9832 3.10789 12.9036C-0.147943 9.64864 -0.147943 4.37031 3.10789 1.11531C3.26416 0.959082 3.47609 0.871319 3.69706 0.871319C3.91803 0.871319 4.12995 0.959082 4.28622 1.11531ZM14.8962 1.11531C18.1512 4.37114 18.1512 9.64864 14.8962 12.9036C14.74 13.06 14.528 13.1479 14.3069 13.148C14.0859 13.1481 13.8738 13.0603 13.7175 12.9041C13.5611 12.7478 13.4732 12.5358 13.4731 12.3148C13.4731 12.0937 13.5608 11.8817 13.7171 11.7253C14.9675 10.4746 15.67 8.77847 15.67 7.00989C15.67 5.24131 14.9675 3.54515 13.7171 2.29447C13.5607 2.13811 13.4728 1.92603 13.4728 1.70489C13.4728 1.48375 13.5607 1.27167 13.7171 1.11531C13.8734 0.95894 14.0855 0.871094 14.3066 0.871094C14.5278 0.871094 14.7399 0.95894 14.8962 1.11531ZM6.75872 3.51031C6.91495 3.66658 7.00271 3.8785 7.00271 4.09947C7.00271 4.32044 6.91495 4.53237 6.75872 4.68864C6.45535 4.99198 6.2147 5.35211 6.05051 5.74846C5.88633 6.14482 5.80182 6.56963 5.80182 6.99864C5.80182 7.42765 5.88633 7.85246 6.05051 8.24882C6.2147 8.64517 6.45535 9.0053 6.75872 9.30864C6.8361 9.38607 6.89746 9.47797 6.93931 9.57911C6.98116 9.68025 7.00268 9.78864 7.00264 9.8981C7.0026 10.0076 6.98101 10.1159 6.93908 10.217C6.89716 10.3182 6.83573 10.41 6.75831 10.4874C6.68088 10.5648 6.58898 10.6261 6.48784 10.668C6.3867 10.7098 6.2783 10.7313 6.16885 10.7313C6.05939 10.7313 5.95101 10.7097 5.8499 10.6677C5.74879 10.6258 5.65693 10.5644 5.57956 10.487C4.65442 9.5618 4.13468 8.30701 4.13468 6.99864C4.13468 5.69027 4.65442 4.43548 5.57956 3.51031C5.65695 3.43283 5.74886 3.37136 5.85002 3.32942C5.95119 3.28749 6.05963 3.2659 6.16914 3.2659C6.27865 3.2659 6.38709 3.28749 6.48826 3.32942C6.58942 3.37136 6.68133 3.43283 6.75872 3.51031ZM12.5571 3.51031C13.4822 4.43548 14.0019 5.69027 14.0019 6.99864C14.0019 8.30701 13.4822 9.5618 12.5571 10.487C12.3999 10.6388 12.1894 10.7228 11.9709 10.7209C11.7524 10.719 11.5434 10.6313 11.3889 10.4768C11.2344 10.3223 11.1467 10.1133 11.1448 9.89481C11.1429 9.67631 11.2269 9.46581 11.3787 9.30864C11.6821 9.0053 11.9227 8.64517 12.0869 8.24882C12.2511 7.85246 12.3356 7.42765 12.3356 6.99864C12.3356 6.56963 12.2511 6.14482 12.0869 5.74846C11.9227 5.35211 11.6821 4.99198 11.3787 4.68864C11.2269 4.53147 11.1429 4.32097 11.1448 4.10247C11.1467 3.88398 11.2344 3.67497 11.3889 3.52046C11.5434 3.36595 11.7524 3.27831 11.9709 3.27641C12.1894 3.27451 12.3999 3.35851 12.5571 3.51031ZM9.06872 5.81864C9.23288 5.81864 9.39542 5.85097 9.54708 5.91379C9.69874 5.97661 9.83653 6.06868 9.95261 6.18476C10.0687 6.30083 10.1608 6.43863 10.2236 6.59029C10.2864 6.74194 10.3187 6.90449 10.3187 7.06864C10.3187 7.23279 10.2864 7.39534 10.2236 7.547C10.1608 7.69865 10.0687 7.83645 9.95261 7.95252C9.83653 8.0686 9.69874 8.16067 9.54708 8.22349C9.39542 8.28631 9.23288 8.31864 9.06872 8.31864C8.7372 8.31864 8.41926 8.18694 8.18484 7.95252C7.95042 7.7181 7.81872 7.40016 7.81872 7.06864C7.81872 6.73712 7.95042 6.41918 8.18484 6.18476C8.41926 5.95034 8.7372 5.81864 9.06872 5.81864Z" fill="white" />
                                        </svg>
                                        Your Live Conversation Appointments
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('script')
<script>
    $(".upMessagesLi").addClass("activeClass");
    $(".upMessages").addClass("md-active");
</script>
@endsection