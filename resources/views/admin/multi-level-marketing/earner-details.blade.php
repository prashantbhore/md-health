@extends('admin.layout.layout') @section("content")
<section class="main-content">
    <div class="content-wrapper">
        <div class="d-flex align-items-center justify-content-between">
            <div class="page-title">Ali Danish</div>
            <a href="{{URL::asset('admin/multi-level-marketing')}}" class="page-title"> <img src="{{URL::asset('admin/assets/img/ArrowLeftCircle.png')}}" alt="" class="back-btn" /> Back MLM </a>
        </div>
        <div class="row top-cards">
            <div class="col-md-12 my-3 earners">
                <div class="card">
                    <div class="card-body">
                        <label for="totalEarnings">Total Earnings</label>
                        {{-- <h4 class="mb-0">1.980,00 ₺</h4> --}}
                        <h4 class="mb-0">{{$joining_coin_integer}}</h4>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id" value="{{!empty($id)?$id:''}}">
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Top Earners Monthly</div>
                        <div class="table-responsive" style="overflow-x: hidden">
                            <table class="table" id="example">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr.No.</th>
                                        <th>Full Name</th>
                                        <th>Network</th>
                                        <th>City</th>
                                        <th>Country</th>
                                        <th>Payment Request</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>

                                    {{-- <tr>
                                        <td>#MD7384</td>
                                        <td>Ali Danish</th>
                                        <td>47</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>1.980,00 ₺</td>
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
                                        <td>#MD7384</td>
                                        <td>Ali Danish</th>
                                        <td>47</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>1.980,00 ₺</td>
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
                                        <td>#MD7384</td>
                                        <td>Ali Danish</th>
                                        <td>47</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>1.980,00 ₺</td>
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
                                        <td>#MD7384</td>
                                        <td>Ali Danish</th>
                                        <td>47</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>1.980,00 ₺</td>
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
                                        <td>#MD7384</td>
                                        <td>Ali Danish</th>
                                        <td>47</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>1.980,00 ₺</td>
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
                                        <td>#MD7384</td>
                                        <td>Ali Danish</th>
                                        <td>47</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>1.980,00 ₺</td>
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
                                        <td>#MD7384</td>
                                        <td>Ali Danish</th>
                                        <td>47</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>1.980,00 ₺</td>
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
                                        <td>#MD7384</td>
                                        <td>Ali Danish</th>
                                        <td>47</td>
                                        <td>Istanbul</td>
                                        <td>Turkiye</td>
                                        <td>1.980,00 ₺</td>
                                        <td class="text-end d-flex justify-content-end gap-2">
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/viewEntry.png')}}" alt="">
                                            </a>
                                            <a href="#">
                                                <img src="{{URL::asset('admin/assets/img/deleteEntry.png')}}" alt="">
                                            </a>
                                        </td>
                                    </tr> --}}


                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')

<script src="{{url('admin\controller_js\admin_cn_earner_details.js')}}"></script>
<script>
    $(".mlmLi").addClass("activeClass");
    $(".mlm").addClass("md-active");
</script>
@endsection