@extends('front.layout.layout')
@section('content')
<style>
    body {
        background-color: #f6f6f6;
    }
</style>
<div class="header section-3 bg-black df-center" style="height: 190px;">
    <h1 class="text-white headerText" id="headerText">About <span class="text-green" id="g-text">Us</span></h1>
</div>
<div class="container footer-pages">
    <div class="card border-0" style="min-height:1127px">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="nav flex-column align-items-start nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link" id="v-pills-enlightment-tab" onclick="eText()" data-bs-toggle="pill" data-bs-target="#v-pills-enlightment" type="button" role="tab" aria-controls="v-pills-enlightment" aria-selected="false">Enlightenment Text</button>
                        <button class="nav-link active" id="v-pills-society-tab" onclick="society()" data-bs-toggle="pill" data-bs-target="#v-pills-society" type="button" role="tab" aria-controls="v-pills-society" aria-selected="true">Information Society Services</button>
                        <button class="nav-link" id="v-pills-privacy-policy-tab" onclick="privacyPolicy()" data-bs-toggle="pill" data-bs-target="#v-pills-privacy-policy" type="button" role="tab" aria-controls="v-pills-privacy-policy" aria-selected="false">Privacy Policy</button>
                        <button class="nav-link" id="v-pills-legal-tab" onclick="legal()" data-bs-toggle="pill" data-bs-target="#v-pills-legal" type="button" role="tab" aria-controls="v-pills-legal" aria-selected="false">Legal Information</button>
                        <button class="nav-link" id="v-pills-policies-tab" onclick="policies()" data-bs-toggle="pill" data-bs-target="#v-pills-policies" type="button" role="tab" aria-controls="v-pills-policies" aria-selected="false">Policies</button>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <!-- ABOUT US -->
                        <div class="tab-pane fade show active" id="v-pills-about-us" role="tabpanel" aria-labelledby="v-pills-about-us-tab">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Suscipit tellus mauris a diam maecenas sed. Arcu cursus euismod quis viverra nibh. A condimentum vitae sapien pellentesque habitant morbi. Commodo ullamcorper a lacus vestibulum sed arcu non. Aliquam id diam maecenas ultricies mi. Purus non enim praesent elementum facilisis leo. Leo integer malesuada nunc vel risus commodo viverra maecenas. Semper feugiat nibh sed pulvinar proin gravida hendrerit lectus. Convallis convallis tellus id interdum velit laoreet id donec ultrices.
                            <br><br>
                            Id eu nisl nunc mi ipsum. Cras tincidunt lobortis feugiat vivamus at augue. Feugiat nisl pretium fusce id velit ut tortor pretium viverra. In hac habitasse platea dictumst. Id diam vel quam elementum pulvinar etiam non. Sem et tortor consequat id porta nibh venenatis. Enim ut tellus elementum sagittis vitae et leo duis. Aliquam sem et tortor consequat id porta nibh venenatis cras. Magna eget est lorem ipsum dolor sit amet consectetur. Adipiscing commodo elit at imperdiet dui. Dignissim suspendisse in est ante in nibh mauris cursus.
                            <br><br>
                            Lacus vestibulum sed arcu non odio euismod lacinia at quis. Mi tempus imperdiet nulla malesuada pellentesque elit. Sem nulla pharetra diam sit amet nisl suscipit adipiscing. Eu mi bibendum neque egestas. Pulvinar neque laoreet suspendisse interdum. Diam quam nulla porttitor massa. Adipiscing elit ut aliquam purus. Fringilla est ullamcorper eget nulla. Auctor elit sed vulputate mi. Aliquet nibh praesent tristique magna sit amet purus gravida quis. Pellentesque id nibh tortor id aliquet lectus proin nibh nisl.
                            <br><br>
                            Tellus pellentesque eu tincidunt tortor aliquam nulla. Aliquam etiam erat velit scelerisque. Euismod quis viverra nibh cras pulvinar. Venenatis tellus in metus vulputate eu. Aliquam malesuada bibendum arcu vitae elementum curabitur vitae nunc. Habitant morbi tristique senectus et netus et malesuada fames. Mattis enim ut tellus elementum sagittis. Nunc lobortis mattis aliquam faucibus purus in. Donec massa sapien faucibus et molestie ac feugiat sed. Elementum eu facilisis sed odio morbi. Libero volutpat sed cras ornare. Turpis egestas integer eget aliquet nibh praesent. Auctor elit sed vulputate mi sit amet mauris commodo quis. Lectus magna fringilla urna porttitor rhoncus dolor purus non. Id donec ultrices tincidunt arcu. In metus vulputate eu scelerisque felis. Dictum varius duis at consectetur lorem donec massa sapien. Eget duis at tellus at. Ornare lectus sit amet est placerat in egestas erat imperdiet.
                            <br><br>
                            Enim diam vulputate ut pharetra sit amet aliquam id. Porttitor leo a diam sollicitudin tempor. Facilisis magna etiam tempor orci eu. Tincidunt augue interdum velit euismod in pellentesque massa placerat duis. Velit scelerisque in dictum non consectetur a erat nam at. Donec massa sapien faucibus et molestie. Aliquam etiam erat velit scelerisque in dictum non. Tortor dignissim convallis aenean et tortor. Ut venenatis tellus in metus vulputate. At auctor urna nunc id cursus metus.
                            <br><br>
                        </div>
                        <!-- PRIVACY POLICY -->
                        <div class="tab-pane fade" id="v-pills-privacy-policy" role="tabpanel" aria-labelledby="v-pills-privacy-policy-tab">
                            Tellus pellentesque eu tincidunt tortor aliquam nulla. Aliquam etiam erat velit scelerisque. Euismod quis viverra nibh cras pulvinar. Venenatis tellus in metus vulputate eu. Aliquam malesuada bibendum arcu vitae elementum curabitur vitae nunc. Habitant morbi tristique senectus et netus et malesuada fames. Mattis enim ut tellus elementum sagittis. Nunc lobortis mattis aliquam faucibus purus in. Donec massa sapien faucibus et molestie ac feugiat sed. Elementum eu facilisis sed odio morbi. Libero volutpat sed cras ornare. Turpis egestas integer eget aliquet nibh praesent. Auctor elit sed vulputate mi sit amet mauris commodo quis. Lectus magna fringilla urna porttitor rhoncus dolor purus non. Id donec ultrices tincidunt arcu. In metus vulputate eu scelerisque felis. Dictum varius duis at consectetur lorem donec massa sapien. Eget duis at tellus at. Ornare lectus sit amet est placerat in egestas erat imperdiet.
                            <br><br>
                            Lacus vestibulum sed arcu non odio euismod lacinia at quis. Mi tempus imperdiet nulla malesuada pellentesque elit. Sem nulla pharetra diam sit amet nisl suscipit adipiscing. Eu mi bibendum neque egestas. Pulvinar neque laoreet suspendisse interdum. Diam quam nulla porttitor massa. Adipiscing elit ut aliquam purus. Fringilla est ullamcorper eget nulla. Auctor elit sed vulputate mi. Aliquet nibh praesent tristique magna sit amet purus gravida quis. Pellentesque id nibh tortor id aliquet lectus proin nibh nisl.
                            <br><br>
                            Enim diam vulputate ut pharetra sit amet aliquam id. Porttitor leo a diam sollicitudin tempor. Facilisis magna etiam tempor orci eu. Tincidunt augue interdum velit euismod in pellentesque massa placerat duis. Velit scelerisque in dictum non consectetur a erat nam at. Donec massa sapien faucibus et molestie. Aliquam etiam erat velit scelerisque in dictum non. Tortor dignissim convallis aenean et tortor. Ut venenatis tellus in metus vulputate. At auctor urna nunc id cursus metus.
                            <br><br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Suscipit tellus mauris a diam maecenas sed. Arcu cursus euismod quis viverra nibh. A condimentum vitae sapien pellentesque habitant morbi. Commodo ullamcorper a lacus vestibulum sed arcu non. Aliquam id diam maecenas ultricies mi. Purus non enim praesent elementum facilisis leo. Leo integer malesuada nunc vel risus commodo viverra maecenas. Semper feugiat nibh sed pulvinar proin gravida hendrerit lectus. Convallis convallis tellus id interdum velit laoreet id donec ultrices.
                            <br><br>
                            Id eu nisl nunc mi ipsum. Cras tincidunt lobortis feugiat vivamus at augue. Feugiat nisl pretium fusce id velit ut tortor pretium viverra. In hac habitasse platea dictumst. Id diam vel quam elementum pulvinar etiam non. Sem et tortor consequat id porta nibh venenatis. Enim ut tellus elementum sagittis vitae et leo duis. Aliquam sem et tortor consequat id porta nibh venenatis cras. Magna eget est lorem ipsum dolor sit amet consectetur. Adipiscing commodo elit at imperdiet dui. Dignissim suspendisse in est ante in nibh mauris cursus.
                            <br><br>
                        </div>
                        <!-- COMPANY -->
                        <div class="tab-pane fade" id="v-pills-company" role="tabpanel" aria-labelledby="v-pills-company-tab">
                            Enim diam vulputate ut pharetra sit amet aliquam id. Porttitor leo a diam sollicitudin tempor. Facilisis magna etiam tempor orci eu. Tincidunt augue interdum velit euismod in pellentesque massa placerat duis. Velit scelerisque in dictum non consectetur a erat nam at. Donec massa sapien faucibus et molestie. Aliquam etiam erat velit scelerisque in dictum non. Tortor dignissim convallis aenean et tortor. Ut venenatis tellus in metus vulputate. At auctor urna nunc id cursus metus.
                            <br><br>
                            Tellus pellentesque eu tincidunt tortor aliquam nulla. Aliquam etiam erat velit scelerisque. Euismod quis viverra nibh cras pulvinar. Venenatis tellus in metus vulputate eu. Aliquam malesuada bibendum arcu vitae elementum curabitur vitae nunc. Habitant morbi tristique senectus et netus et malesuada fames. Mattis enim ut tellus elementum sagittis. Nunc lobortis mattis aliquam faucibus purus in. Donec massa sapien faucibus et molestie ac feugiat sed. Elementum eu facilisis sed odio morbi. Libero volutpat sed cras ornare. Turpis egestas integer eget aliquet nibh praesent. Auctor elit sed vulputate mi sit amet mauris commodo quis. Lectus magna fringilla urna porttitor rhoncus dolor purus non. Id donec ultrices tincidunt arcu. In metus vulputate eu scelerisque felis. Dictum varius duis at consectetur lorem donec massa sapien. Eget duis at tellus at. Ornare lectus sit amet est placerat in egestas erat imperdiet.
                            <br><br>
                            Lacus vestibulum sed arcu non odio euismod lacinia at quis. Mi tempus imperdiet nulla malesuada pellentesque elit. Sem nulla pharetra diam sit amet nisl suscipit adipiscing. Eu mi bibendum neque egestas. Pulvinar neque laoreet suspendisse interdum. Diam quam nulla porttitor massa. Adipiscing elit ut aliquam purus. Fringilla est ullamcorper eget nulla. Auctor elit sed vulputate mi. Aliquet nibh praesent tristique magna sit amet purus gravida quis. Pellentesque id nibh tortor id aliquet lectus proin nibh nisl.
                            <br><br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Suscipit tellus mauris a diam maecenas sed. Arcu cursus euismod quis viverra nibh. A condimentum vitae sapien pellentesque habitant morbi. Commodo ullamcorper a lacus vestibulum sed arcu non. Aliquam id diam maecenas ultricies mi. Purus non enim praesent elementum facilisis leo. Leo integer malesuada nunc vel risus commodo viverra maecenas. Semper feugiat nibh sed pulvinar proin gravida hendrerit lectus. Convallis convallis tellus id interdum velit laoreet id donec ultrices.
                            <br><br>
                            Id eu nisl nunc mi ipsum. Cras tincidunt lobortis feugiat vivamus at augue. Feugiat nisl pretium fusce id velit ut tortor pretium viverra. In hac habitasse platea dictumst. Id diam vel quam elementum pulvinar etiam non. Sem et tortor consequat id porta nibh venenatis. Enim ut tellus elementum sagittis vitae et leo duis. Aliquam sem et tortor consequat id porta nibh venenatis cras. Magna eget est lorem ipsum dolor sit amet consectetur. Adipiscing commodo elit at imperdiet dui. Dignissim suspendisse in est ante in nibh mauris cursus.
                            <br><br>
                        </div>
                        <!-- ENLIGHTMENT TEXT -->
                        <div class="tab-pane fade" id="v-pills-enlightment" role="tabpanel" aria-labelledby="v-pills-enlightment-tab">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Suscipit tellus mauris a diam maecenas sed. Arcu cursus euismod quis viverra nibh. A condimentum vitae sapien pellentesque habitant morbi. Commodo ullamcorper a lacus vestibulum sed arcu non. Aliquam id diam maecenas ultricies mi. Purus non enim praesent elementum facilisis leo. Leo integer malesuada nunc vel risus commodo viverra maecenas. Semper feugiat nibh sed pulvinar proin gravida hendrerit lectus. Convallis convallis tellus id interdum velit laoreet id donec ultrices.
                            <br><br>
                            Id eu nisl nunc mi ipsum. Cras tincidunt lobortis feugiat vivamus at augue. Feugiat nisl pretium fusce id velit ut tortor pretium viverra. In hac habitasse platea dictumst. Id diam vel quam elementum pulvinar etiam non. Sem et tortor consequat id porta nibh venenatis. Enim ut tellus elementum sagittis vitae et leo duis. Aliquam sem et tortor consequat id porta nibh venenatis cras. Magna eget est lorem ipsum dolor sit amet consectetur. Adipiscing commodo elit at imperdiet dui. Dignissim suspendisse in est ante in nibh mauris cursus.
                            <br><br>
                            Lacus vestibulum sed arcu non odio euismod lacinia at quis. Mi tempus imperdiet nulla malesuada pellentesque elit. Sem nulla pharetra diam sit amet nisl suscipit adipiscing. Eu mi bibendum neque egestas. Pulvinar neque laoreet suspendisse interdum. Diam quam nulla porttitor massa. Adipiscing elit ut aliquam purus. Fringilla est ullamcorper eget nulla. Auctor elit sed vulputate mi. Aliquet nibh praesent tristique magna sit amet purus gravida quis. Pellentesque id nibh tortor id aliquet lectus proin nibh nisl.
                            <br><br>
                            Tellus pellentesque eu tincidunt tortor aliquam nulla. Aliquam etiam erat velit scelerisque. Euismod quis viverra nibh cras pulvinar. Venenatis tellus in metus vulputate eu. Aliquam malesuada bibendum arcu vitae elementum curabitur vitae nunc. Habitant morbi tristique senectus et netus et malesuada fames. Mattis enim ut tellus elementum sagittis. Nunc lobortis mattis aliquam faucibus purus in. Donec massa sapien faucibus et molestie ac feugiat sed. Elementum eu facilisis sed odio morbi. Libero volutpat sed cras ornare. Turpis egestas integer eget aliquet nibh praesent. Auctor elit sed vulputate mi sit amet mauris commodo quis. Lectus magna fringilla urna porttitor rhoncus dolor purus non. Id donec ultrices tincidunt arcu. In metus vulputate eu scelerisque felis. Dictum varius duis at consectetur lorem donec massa sapien. Eget duis at tellus at. Ornare lectus sit amet est placerat in egestas erat imperdiet.
                            <br><br>
                            Enim diam vulputate ut pharetra sit amet aliquam id. Porttitor leo a diam sollicitudin tempor. Facilisis magna etiam tempor orci eu. Tincidunt augue interdum velit euismod in pellentesque massa placerat duis. Velit scelerisque in dictum non consectetur a erat nam at. Donec massa sapien faucibus et molestie. Aliquam etiam erat velit scelerisque in dictum non. Tortor dignissim convallis aenean et tortor. Ut venenatis tellus in metus vulputate. At auctor urna nunc id cursus metus.
                            <br><br>
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
    function eText() {
        //change text from add to Update
        $("#headerText").text('Enlightment Text');
    }

    function society() {
        //change text from add to Update
        $("#headerText").text('About Us');
    }

    function privacyPolicy() {
        //change text from add to Update
        $("#headerText").text('Privacy Policy');
    }

    function legal() {
        //change text from add to Update
        $("#headerText").text('Company');
    }
    function policies() {
        //change text from add to Update
        $("#headerText").text('Company');
    }
</script>
@endsection