@extends('front.layout.layout2')
@section('content')
    <style>
        .reports-div {
            border-bottom: 1px solid #A5A5A5;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .form-group input.form-control {
            color: #000 !important;
        }

        .form-group .prev-img-div img {
            height: 150px;
            width: auto;
            object-fit: contain;
            margin-top: 15px;
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
                        <div class="form-div">
                            <h5 class="card-header d-flex align-items-center justify-content-between mb-4">
                                <span>Reports</span>
                                <img src="{{ asset('front/assets/img/GoldMember.svg') }}" alt="">
                            </h5>
                            <div class="card-body mb-3">

                                <div class="reports-div section-heading-div">
                                    <h6 class="section-heading">Add New Reports</h6>
                                </div>

                                <form method="POST" action="{{ route('add.report') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group  mb-3 ">
                                        <label class="form-label">Report Title</label>
                                        <input type="text" name="report_title" class="form-control"
                                            placeholder="Write Here Please">
                                    </div>

                                    {{-- {{dd($patient_list)}} --}}

                                    <div class="form-group d-flex flex-column mb-5">
                                        <label class="form-label">Patient</label>
                                        <select name="customer_package_purchage_id" id="">
                                            <option value="">Choose Patient</option>
                                            @if (!empty($patient_list))
                                                @foreach ($patient_list as $patient)
                                                    <option value="{{ !empty($patient['id']) ? $patient['id'] : '' }}">
                                                        {{ !empty($patient['name']) ? $patient['name'] : '' }}</option>
                                                @endforeach
                                            @endif

                                            {{-- <option value="">Patient 2</option>
                                        <option value="">Patient 3</option> --}}
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label">Upload Report File</label>
                                        <div class="form-group">
                                            <input type="file" name="report_path" class="form-control text-dark">
                                        </div>
                                        <div class="prev-img-div">
                                            <img src="front/assets/img/default-img.png" alt="image">
                                        </div>
                                    </div>

                                    <div class="section-btns mb-5">
                                        <button class="black-plate bg-black text-white fw-700 w-100" type="submit">Upload
                                            Reports</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="form-div">
                            <h5 class="card-header d-flex align-items-center justify-content-between mb-4">
                                <span>Uploaded Reports</span>
                                <img src="{{ asset('front/assets/img/GoldMember.svg') }}" alt="">
                            </h5>
                            <div class="card-body">


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
        $(".mpReportsLi").addClass("activeClass");
        $(".mpReports").addClass("md-active");
    </script>
@endsection
