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
                            <ul>
                                <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic repudiandae ad sequi ea accusantium sit!</li>
                                <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic repudiandae ad sequi ea accusantium sit!</li>
                                <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic repudiandae ad sequi ea accusantium sit!</li>
                                <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic repudiandae ad sequi ea accusantium sit!</li>
                                <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic repudiandae ad sequi ea accusantium sit!</li>
                                <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic repudiandae ad sequi ea accusantium sit!</li>
                            </ul>

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