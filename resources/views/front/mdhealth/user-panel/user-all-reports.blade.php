@extends('front.layout.layout2')
@section("content")
<style>
    .trmt-card-footer a {
        text-decoration: none;
        /* padding: 6px 20px; */
        width: 156px;
        height: 33px;
        flex-shrink: 0;
        border-radius: 2px;

        color: #FFF;
        text-align: center;
        font-family: Campton;
        font-size: 14px;
        font-weight: 600;
        line-height: normal;
        letter-spacing: -0.56px;
        display: flex;
        
    }

    .trmt-card-body span {
        font-size: 14px;
    }

    .view-more-left .icon-div {
        padding: 10px;
        border-radius: 2px;
        background: #D9D9D9;
        line-height: 0;
    }

    .view-more-reports {
        margin: 25px 30px;
        padding-top: 20px;
        border-top: 2px solid #CFCFCF;
    }

  
    .view-more-reports .view-more-content h5:first-child {
        font-size: 16px;
    }

    .treatment-card .trmt-card-body h5:first-child {
        font-size: 16px;
    }

    .view-more-view {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        /* gap: 1rem; */
        text-decoration: none;
        color: #000;
        font-family: Campton;
        font-size: 10px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        letter-spacing: -0.4px;
    }
</style>
<div class="content-wrapper">
    <div class="container py-135px for-cards">
        <div class="d-flex gap-3">
            <div class="w-292">
                @include('front.includes.sidebar-user')
            </div>
            <div class="w-761">
                <div class="card panel-right card-body">
                    <h5 class="card-header d-flex align-items-center justify-content-between mb-3 head-report">
                        <span>Reports</span>
                    </h5>

                    <div class="filter-div">
                        <div class="search-div">
                            <input type="text" placeholder="Search" id="liveSearchInput">
                        </div>
                        <div class="list-div">
                            <select name="" id="">
                                <option value="">List for date</option>
                                <option value="">List for Price</option>
                                <option value="">List for Distance</option>
                            </select>
                        </div>
                    </div>

                    <div class="reports-list">

                        {{-- <div id="resultContainer"></div> --}}

                        @if($customer_reports)
                        @foreach ($customer_reports as $report)

                        <div class="treatment-card treatment-card-report w-100 mb-3">
                            <div class="row card-row align-items-center justify-content-evenly m-0">
                                <div class="col-md-2 df-center report-img px-0">
                                    <img src="{{!empty($report['provider_data']['logo_path'])?$report['provider_data']['logo_path']:url('/front/assets/img/Memorial.svg')}}" alt="">
                                </div>


                                <div class="col-md-6 justify-content-start ps-0">
                                    <div class="trmt-card-body">
                                        <h5 class="card-h1 mb-0">{{!empty($report['provider_data']['company_name'])?$report['provider_data']['company_name']:''}}</h5>
                                        <h5 class="report-text fw-500 d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15" fill="none">
                                                <path d="M4.21458 1.41667V0H8.46458V1.41667H4.21458ZM4.92292 9.73958L4.14375 8.18125C4.08472 8.05139 3.99618 7.95388 3.87812 7.88871C3.76007 7.82354 3.63611 7.79119 3.50625 7.79167H0C0.177083 6.19792 0.867708 4.85492 2.07187 3.76267C3.27604 2.67042 4.69861 2.12453 6.33958 2.125C7.07153 2.125 7.77396 2.24306 8.44687 2.47917C9.11979 2.71528 9.75139 3.05764 10.3417 3.50625L11.3333 2.51458L12.325 3.50625L11.3333 4.49792C11.7111 4.99375 12.0122 5.51626 12.2365 6.06546C12.4608 6.61465 12.6083 7.19006 12.6792 7.79167H9.61562L8.39375 5.34792C8.26389 5.07639 8.05139 4.94062 7.75625 4.94062C7.46111 4.94062 7.24861 5.07639 7.11875 5.34792L4.92292 9.73958ZM6.33958 14.875C4.69861 14.875 3.27604 14.3289 2.07187 13.2366C0.867708 12.1444 0.177083 10.8016 0 9.20833H3.06354L4.28542 11.6521C4.41528 11.9236 4.62778 12.0594 4.92292 12.0594C5.21806 12.0594 5.43055 11.9236 5.56042 11.6521L7.75625 7.26042L8.53542 8.81875C8.59444 8.94861 8.68299 9.04612 8.80104 9.11129C8.9191 9.17646 9.04306 9.20881 9.17292 9.20833H12.6792C12.5021 10.8021 11.8115 12.1448 10.6073 13.2366C9.40312 14.3284 7.98056 14.8745 6.33958 14.875Z" fill="#111111" />
                                            </svg>
                                            <span class="fsb-2">{{!empty($report['report_count'])?$report['report_count']:''}} Reports</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex flex-column justify-content-between align-items-end text-end">
                                    <div class="trmt-card-footer">
                                        <a href="javascript:void(0);" class="fsb-2 fw-600 bg-green text-dark show-reports df-center" id="ViewAllReports"><strong>View All Reports</strong></a>
                                    </div>
                                </div>
                            </div>



                            <div class="view-all-reports">

                                @if($report['reports'])
                                @foreach ($report['reports'] as $report_data)

                                <div class="view-more-reports d-flex justify-content-between">
                                    <div class="view-more-left d-flex align-items-center gap-3">
                                        <div class="icon-div">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                <g clip-path="url(#clip0_0_14866)">
                                                    <path d="M5.25033 0.583496V4.66683L1.16699 11.6668V13.4168H12.8337V11.6668L8.75033 4.66683V0.583496M10.5003 7.5835C6.41699 5.8335 7.00033 9.91683 3.50033 8.16683M3.50033 0.583496H10.5003M8.75033 10.5002C8.90503 10.5002 9.05341 10.4387 9.1628 10.3293C9.2722 10.2199 9.33366 10.0715 9.33366 9.91683C9.33366 9.76212 9.2722 9.61375 9.1628 9.50435C9.05341 9.39495 8.90503 9.3335 8.75033 9.3335C8.59562 9.3335 8.44724 9.39495 8.33785 9.50435C8.22845 9.61375 8.16699 9.76212 8.16699 9.91683C8.16699 10.0715 8.22845 10.2199 8.33785 10.3293C8.44724 10.4387 8.59562 10.5002 8.75033 10.5002ZM5.25033 11.6668C5.40504 11.6668 5.55341 11.6054 5.6628 11.496C5.7722 11.3866 5.83366 11.2382 5.83366 11.0835C5.83366 10.9288 5.7722 10.7804 5.6628 10.671C5.55341 10.5616 5.40504 10.5002 5.25033 10.5002C5.09562 10.5002 4.94724 10.5616 4.83785 10.671C4.72845 10.7804 4.66699 10.9288 4.66699 11.0835C4.66699 11.2382 4.72845 11.3866 4.83785 11.496C4.94724 11.6054 5.09562 11.6668 5.25033 11.6668Z" stroke="#111111" stroke-width="1.16667" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_0_14866">
                                                        <rect width="14" height="14" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                        <div class="view-more-content">
                                            <h5 class="card-h1 mb-0">{{!empty($report_data['report_title'])?$report_data['report_title']:''}}</h5>
                                            @php
                                            $timestamp = strtotime($report_data['created_at']);


                                            $formattedDate = date('d/m/Y', $timestamp);
                                            @endphp
                                            <h5 class="my-0">Upload Date: {{!empty($formattedDate)?$formattedDate:''}}</h5>
                                        </div>
                                    </div>

                                    <div class="view-more-right d-flex gap-4">
                                        <a href="{{ !empty($report_data['report_path']) ? $report_data['report_path'] : '' }}" class="view-more-view text-black" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                <path d="M2.91699 7.00016C2.91699 7.00016 4.40158 4.0835 7.00033 4.0835C9.59849 4.0835 11.0837 7.00016 11.0837 7.00016C11.0837 7.00016 9.59849 9.91683 7.00033 9.91683C4.40158 9.91683 2.91699 7.00016 2.91699 7.00016Z" stroke="#111111" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M12.25 9.91667V11.0833C12.25 11.3928 12.1271 11.6895 11.9083 11.9083C11.6895 12.1271 11.3928 12.25 11.0833 12.25H2.91667C2.60725 12.25 2.3105 12.1271 2.09171 11.9083C1.87292 11.6895 1.75 11.3928 1.75 11.0833V9.91667M12.25 4.08333V2.91667C12.25 2.60725 12.1271 2.3105 11.9083 2.09171C11.6895 1.87292 11.3928 1.75 11.0833 1.75H2.91667C2.60725 1.75 2.3105 1.87292 2.09171 2.09171C1.87292 2.3105 1.75 2.60725 1.75 2.91667V4.08333M7 7.58333C7.15471 7.58333 7.30308 7.52187 7.41248 7.41248C7.52187 7.30308 7.58333 7.15471 7.58333 7C7.58333 6.84529 7.52187 6.69692 7.41248 6.58752C7.30308 6.47812 7.15471 6.41667 7 6.41667C6.84529 6.41667 6.69692 6.47812 6.58752 6.58752C6.47812 6.69692 6.41667 6.84529 6.41667 7C6.41667 7.15471 6.47812 7.30308 6.58752 7.41248C6.69692 7.52187 6.84529 7.58333 7 7.58333Z" stroke="#111111" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            View
                                        </a>
                                        <a href="#" class="view-more-view text-black" onclick="printDocument('{{ !empty($report_data['report_path']) ? $report_data['report_path'] : '' }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                <path d="M4.08366 5.83317C3.96829 5.83317 3.8555 5.86738 3.75958 5.93148C3.66365 5.99558 3.58888 6.08668 3.54473 6.19327C3.50058 6.29986 3.48903 6.41715 3.51153 6.53031C3.53404 6.64346 3.5896 6.7474 3.67118 6.82898C3.75276 6.91056 3.8567 6.96612 3.96986 6.98863C4.08301 7.01114 4.2003 6.99958 4.30689 6.95543C4.41348 6.91128 4.50459 6.83652 4.56868 6.74059C4.63278 6.64466 4.66699 6.53188 4.66699 6.4165C4.66699 6.26179 4.60553 6.11342 4.49614 6.00402C4.38674 5.89463 4.23837 5.83317 4.08366 5.83317ZM11.0837 3.49984H10.5003V1.74984C10.5003 1.59513 10.4389 1.44675 10.3295 1.33736C10.2201 1.22796 10.0717 1.1665 9.91699 1.1665H4.08366C3.92895 1.1665 3.78058 1.22796 3.67118 1.33736C3.56178 1.44675 3.50033 1.59513 3.50033 1.74984V3.49984H2.91699C2.45286 3.49984 2.00774 3.68421 1.67956 4.0124C1.35137 4.34059 1.16699 4.78571 1.16699 5.24984V8.74984C1.16699 9.21397 1.35137 9.65909 1.67956 9.98727C2.00774 10.3155 2.45286 10.4998 2.91699 10.4998H3.50033V12.2498C3.50033 12.4045 3.56178 12.5529 3.67118 12.6623C3.78058 12.7717 3.92895 12.8332 4.08366 12.8332H9.91699C10.0717 12.8332 10.2201 12.7717 10.3295 12.6623C10.4389 12.5529 10.5003 12.4045 10.5003 12.2498V10.4998H11.0837C11.5478 10.4998 11.9929 10.3155 12.3211 9.98727C12.6493 9.65909 12.8337 9.21397 12.8337 8.74984V5.24984C12.8337 4.78571 12.6493 4.34059 12.3211 4.0124C11.9929 3.68421 11.5478 3.49984 11.0837 3.49984ZM4.66699 2.33317H9.33366V3.49984H4.66699V2.33317ZM9.33366 11.6665H4.66699V9.33317H9.33366V11.6665ZM11.667 8.74984C11.667 8.90455 11.6055 9.05292 11.4961 9.16232C11.3867 9.27171 11.2384 9.33317 11.0837 9.33317H10.5003V8.74984C10.5003 8.59513 10.4389 8.44675 10.3295 8.33736C10.2201 8.22796 10.0717 8.1665 9.91699 8.1665H4.08366C3.92895 8.1665 3.78058 8.22796 3.67118 8.33736C3.56178 8.44675 3.50033 8.59513 3.50033 8.74984V9.33317H2.91699C2.76228 9.33317 2.61391 9.27171 2.50451 9.16232C2.39512 9.05292 2.33366 8.90455 2.33366 8.74984V5.24984C2.33366 5.09513 2.39512 4.94675 2.50451 4.83736C2.61391 4.72796 2.76228 4.6665 2.91699 4.6665H11.0837C11.2384 4.6665 11.3867 4.72796 11.4961 4.83736C11.6055 4.94675 11.667 5.09513 11.667 5.24984V8.74984Z" fill="#111111" />
                                            </svg>
                                            Print
                                        </a>

                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        @endforeach
                        @endif


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(".upReportsLi").addClass("activeClass");
    $(".upReports").addClass("md-active");
</script>

<script>
    // $(document).ready(function(){
    $(".view-all-reports").hide();
    $("#ViewAllReports").click(function() {
        $(".view-all-reports").toggle();
        $(this).toggleClass('show-reports hide-reports').text(function(i, v) {
            return $(this).hasClass('show-reports') ? 'View All Reports' : 'Close All Reports';
        });
    });
    // });
</script>

<script>
    // $(document).ready(function(){

    performSearch();

    // Bind the function to the input event on the search box
    $('#liveSearchInput').on('input', function() {
        performSearch();
    });

    function performSearch() {




        let query = $('#liveSearchInput').val();
        var base_url = $("#base_url").val();

        $.ajax({
            url: base_url + "/user-all-reports-search",
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                query: query
            },
            success: function(html) {
                // Check if the HTML content is not empty
                if (html.trim() !== "") {
                    // Display the results in #resultContainer
                    $('#resultContainer').html(html);
                } else {
                    // Show "No report found" message when HTML is empty
                    $('#resultContainer').html("<p>No report found</p>");
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
    // });
</script>
<script>
    function printDocument(reportPath) {
        if (reportPath) {
            var printWindow = window.open(reportPath, '_blank');
            if (printWindow) {
                printWindow.onload = function() {
                    printWindow.print();
                };
            } else {
                alert('Failed to open the print window. Please check your browser settings.');
            }
        } else {
            // Handle the case where the report path is empty
            alert('No report available for printing.');
        }

        return false; // Prevent the default behavior of the link
    }
</script>

<script>
    $(document).ready(function() {
        performSearch();

        // Bind the function to the input event on the search box
        $('#liveSearchInput').on('input', function() {
            performSearch();
        });

        function performSearch() {


            let query = $('#liveSearchInput').val();
            var base_url = $("#base_url").val();

            $.ajax({
                url: base_url + "/user-all-reports-search",
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: {
                    query: query
                },
                success: function(html) {
                    // Check if the HTML content is not empty
                    if (html.trim() !== "") {
                        // Display the results in #resultContainer
                        $('#resultContainer').html(html);
                    } else {
                        // Show "No report found" message when HTML is empty
                        $('#resultContainer').html("<p>No report found</p>");
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    });
</script>

@endsection