@extends('front.layout.layout2')
@section("content")
<style>
    .select-name-div {
        box-shadow: 0px 0px 14px 0px rgba(0, 0, 0, 0.25);
        border-radius: 3px;
    }
    .input-file-div label{
        padding: 5px 22px;
    border-radius: 35px;
    margin-bottom: 20px;
    cursor: pointer;
    }
    .write-message{
        position: relative;
    }
    .write-message textarea:focus{
        box-shadow: 0px 0px 14px 0px rgba(0, 0, 0, 0.25);
    }
    .write-message textarea{
        box-shadow: 0px 0px 14px 0px rgba(0, 0, 0, 0.25);
        position: relative;
        padding: 15px 50px 15px 15px;
    }
    .write-message .send-msg-btn{
        position: absolute;
        right: 10px;
        top: 35%;
        bottom: 65%;
        z-index: 999;
    }
</style>
<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="row">
            <div class="col-md-3">
                @include('front.includes.sidebar')
            </div>
            <div class="col-md-9">
                <div class="card mb-4">
                    <div class="card-body d-flex" style="min-height:800px">
                        <div class="message-div d-flex justify-content-between flex-column w-100 ">
                            <div class="message-header">
                                <h5 class="d-flex align-items-center justify-content-between bg-light fw-700 p-4 mb-3 fsb-1">
                                    <span>Message</span>
                                    <a href="{{url('medical-messages')}}" class="d-flex align-items-center text-dark gap-1 text-decoration-none">
                                        <img src="{{asset('front/assets/img/backPage.png')}}" alt=""> Back Messages
                                    </a>
                                </h5>
                                <div class="select-message-div">
                                    <div class="select-name-div d-flex justify-content-between align-items-center p-3" id="onclickopen">
                                        <p class="m-0 fw-800 fsb-1 d-flex align-items-center gap-2">
                                            <span class="fw-200 text-secondary">Write to </span><span class="fw-200 text-secondary">|</span> Customer Name Surname
                                        </p>
                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                    <div class="show-name-list mt-3">
                                        <div class="select-name-div p-3" id="onclickopen">
                                            <p class="m-0 fw-800 fsb-1 d-flex align-items-center p-1 gap-2">
                                                <span class="fw-200 text-secondary">Write to </span><span class="fw-200 text-secondary">|</span> Customer Name Surname
                                            </p>
                                            <p class="m-0 fw-800 fsb-1 d-flex align-items-center p-1 gap-2">
                                                <span class="fw-200 text-secondary">Write to </span><span class="fw-200 text-secondary">|</span> Customer Name Surname
                                            </p>
                                            <p class="m-0 fw-800 fsb-1 d-flex align-items-center p-1 gap-2">
                                                <span class="fw-200 text-secondary">Write to </span><span class="fw-200 text-secondary">|</span> Customer Name Surname
                                            </p>
                                            <p class="m-0 fw-800 fsb-1 d-flex align-items-center p-1 gap-2">
                                                <span class="fw-200 text-secondary">Write to </span><span class="fw-200 text-secondary">|</span> Customer Name Surname
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="footer-message-div">
                                <div class="input-file-div text-end">
                                    <label for="attachfile" class="bg-light">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.8746 2.18752C11.2586 2.18587 10.6483 2.30631 10.0791 2.54189C9.50994 2.77747 8.99306 3.12351 8.55837 3.56002L2.81462 9.30502C2.63842 9.48089 2.5393 9.71955 2.53906 9.96851C2.53883 10.2175 2.6375 10.4563 2.81337 10.6325C2.98924 10.8087 3.22791 10.9078 3.47686 10.9081C3.72582 10.9083 3.96467 10.8096 4.14087 10.6338L9.88712 4.88627C10.4217 4.39483 11.1254 4.12897 11.8514 4.14422C12.5774 4.15947 13.2694 4.45465 13.7828 4.96809C14.2962 5.48154 14.5914 6.17352 14.6067 6.89948C14.6219 7.62544 14.3561 8.32922 13.8646 8.86377L7.23587 15.4925C7.05815 15.6581 6.8231 15.7483 6.58022 15.744C6.33734 15.7397 6.10561 15.6413 5.93385 15.4695C5.76208 15.2978 5.66369 15.066 5.6594 14.8232C5.65512 14.5803 5.74527 14.3452 5.91087 14.1675L12.5396 7.53877C12.7158 7.36273 12.8149 7.12391 12.815 6.87483C12.8151 6.62576 12.7163 6.38685 12.5402 6.21064C12.3642 6.03444 12.1254 5.93538 11.8763 5.93527C11.6272 5.93515 11.3883 6.03398 11.2121 6.21002L4.58212 12.8413C4.09069 13.3758 3.82483 14.0796 3.84008 14.8055C3.85532 15.5315 4.1505 16.2235 4.66395 16.7369C5.17739 17.2504 5.86938 17.5456 6.59534 17.5608C7.3213 17.5761 8.02507 17.3102 8.55962 16.8188L15.1884 10.19C15.6252 9.75575 15.9715 9.23915 16.2073 8.67013C16.4431 8.10111 16.5637 7.49096 16.5621 6.87502C16.5608 5.63222 16.0665 4.44071 15.1877 3.56192C14.3089 2.68313 13.1174 2.18884 11.8746 2.18752Z" fill="#969696"/>
                                        </svg>
                                    </label>
                                    <input type="file" id="attachfile" hidden>
                                </div>
                                <div class="write-message">
                                    <textarea class="form-control" id="productstext" rows="3" placeholder="Your message here" data-gramm="false" wt-ignore-input="true"></textarea>
                                    <button class="border-0 bg-white send-msg-btn">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.41634 12.9998L4.762 7.10967C4.57459 5.424 6.31009 4.18575 7.843 4.91267L20.7823 11.0422C22.4344 11.8243 22.4344 14.1752 20.7823 14.9573L7.843 21.0868C6.31009 21.8127 4.57459 20.5755 4.762 18.8898L5.41634 12.9998ZM5.41634 12.9998H12.9997" stroke="#878787" stroke-width="1.45833" stroke-linecap="round" stroke-linejoin="round"/>
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
@endsection
@section('script')
<script>
    $(".mpMessagesLi").addClass("activeClass");
    $(".mpMessages").addClass("md-active");
</script>

<script>
    $(".show-name-list").hide();
    $("#onclickopen").click(function() {
        $(".show-name-list").toggle(200);
    });
</script>
@endsection