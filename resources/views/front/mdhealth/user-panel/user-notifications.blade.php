@extends('front.layout.layout2')
@section('content')

<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="d-flex gap-3">
            <div class="w-292">
                @include('front.includes.sidebar-user')
            </div>
            <div class="w-761">
                <div class="card panel-right mb-4">
                    <div class="form-div">
                        <h5 class="card-header d-flex align-items-center justify-content-between mb-3">
                            <span>Notifications</span>
                        </h5>
                        <div class="card-body">
                            @if (!empty($notifications))
                            @if (!empty($notifications))
                            <ul class="notifications-list ps-0">
                                @foreach ($notifications as $notification)
                                <!-- <li>{{ $notification->notification_description }}</li> -->
                                <div>
                                    <h6 class="mb-0 d-flex align-items-center gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7" fill="none">
                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#4CDB06" />
                                        </svg>
                                        <p class="mb-0 card-h3 camptonBook">{{ $notification->notification_description }}</p>
                                        <span class="card-p1 ms-auto">Monday 14:52</span>
                                    </h6>
                                </div>

                                @endforeach
                            </ul>
                            @endif
                            @endif

                            <!-- <ul class="notifications-list ps-0">
                                <div>
                                    <h6 class="mb-0 d-flex align-items-center gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7" fill="none">
                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#4CDB06" />
                                        </svg>
                                        <p class="mb-0 card-h3 camptonBook">You have a new message!</p>
                                        <span class="card-p1 ms-auto">Monday 14:52</span>
                                    </h6>
                                </div>
                                <div>
                                    <h6 class="mb-0 d-flex align-items-center gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7" fill="none">
                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#969995" />
                                        </svg>
                                        <p class="mb-0 card-h3 camptonBook">You have a new message!</p>
                                        <span class="card-p1 ms-auto">Monday 14:52</span>
                                    </h6>
                                </div>
                                <div>
                                    <h6 class="mb-0 d-flex align-items-center gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7" fill="none">
                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#969995" />
                                        </svg>
                                        <p class="mb-0 card-h3 camptonBook">You have a new message!</p>
                                        <span class="card-p1 ms-auto">Monday 14:52</span>
                                    </h6>
                                </div>
                                <div>
                                    <h6 class="mb-0 d-flex align-items-center gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7" fill="none">
                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#969995" />
                                        </svg>
                                        <p class="mb-0 card-h3 camptonBook">You have a new message!</p>
                                        <span class="card-p1 ms-auto">Monday 14:52</span>
                                    </h6>
                                </div>
                                <div>
                                    <h6 class="mb-0 d-flex align-items-center gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7" fill="none">
                                            <circle cx="3.5" cy="3.5" r="3.5" fill="#969995" />
                                        </svg>
                                        <p class="mb-0 card-h3 camptonBook">You have a new message!</p>
                                        <span class="card-p1 ms-auto">Monday 14:52</span>
                                    </h6>
                                </div>
                            </ul> -->


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
    $(".upNotificationsLi").addClass("activeClass");
    $(".upNotifications").addClass("md-active");
</script>
@endsection