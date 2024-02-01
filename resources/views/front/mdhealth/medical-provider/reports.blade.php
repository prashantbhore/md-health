@extends('front.layout.layout2')
@section('content')
<style>
    .list-div select {
        width: 195px;
        height: 35px;
        border-radius: 3px;
        border: 1px solid #EDEDED;
        background: #FFF;
        padding: 6px 14px;
        font-size: 14px;

    }



    .reports-div {
        border-bottom: 2px solid #d5d5d5;
        padding-bottom: 8px;
        margin-bottom: 16px;
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

    /* .form-div input.form-control,
    .form-div select {

        padding: 8px 10px;

        border-radius: 3px;
        border: 1px solid #EDEDED;
        background: #FFF;

        font-family: CamptonBook;
        font-size: 14px;
        
        font-weight: 400;
        line-height: normal;
        letter-spacing: -0.56px;
    } */
    .form-control::placeholder {
        font-family: CamptonLight;
        font-weight: 600;
    }

    .form-select,
    .form-control {
        color: #000;
        font-family: CamptonBook !important;
        font-size: 16px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        letter-spacing: -0.64px;
    }

    .form-group .prev-img-div img {
        height: 150px;
        width: auto;
        object-fit: contain;
        margin-top: 15px;
        border-radius: 3px;
    }

    .prev-img-div h5 {
        font-family: 'CamptonLight';
        color: #979797;
        font-size: 16px;
        font-weight: 600;
        line-height: 19px;
        letter-spacing: -0.04em;
        margin-left: 1.5rem;
    }

    .error-message {
        color: red;
        margin-top: 5px;
    }

    .no-data {
        height: 150px;
        font-family: "CamptonBook";
        color: #979797;
        font-weight: 400;
        letter-spacing: -0.56px;
        font-size: 16px;
        border-radius: 3px;
        border: 1px solid #F6F6F6;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 16px;
        background: #F6F6F6;
    }
</style>
<style>
    .no-data {
        height: 362px;
        font-family: "CamptonBook";
        color: #979797;
        font-weight: 400;
        letter-spacing: -0.56px;
        font-size: 16px;
        border-radius: 3px;
        /* border: 1px solid #F6F6F6; */
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 16px;
        /* background: #F6F6F6; */
    }

    .no-data img {
        width: 150px;
        height: auto;
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

    input[type="file"] {
        color: #979797 !important;
        line-height: 2 !important;
    }

    select:required:invalid {
        color: gray;
        font-family: CamptonLight !important;
    }

    #previewPDF {
        width: 100%;
        background: #fbfbfb;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem;
        border-radius: 3px;
    }

    #previewPDF img {
        height: 40px;
        margin-top: 0px;
    }

    #previewPDF span {
        font-family: 'CamptonBook';
        letter-spacing: -0.04em;
    }

    .ri-close-line:before {
        content: "\eb99";
        font-size: 18px;
        font-weight: 600;
        border-radius: 50%;
        padding: 2px;
        color: #db2828;
    }
</style>

<div class="content-wrapper">
    <div class="container py-100px for-cards">
        <div class="d-flex gap-3">
            <div class="w-292">
                @include('front.includes.sidebar')
            </div>
            <div class="w-761">
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

                            <form id="uploadForm" method="POST" action="{{ route('add.report') }}" enctype="multipart/form-data" id="reportForm">
                                @csrf

                                <div class="form-group mb-4">
                                    <label class="form-label mb-3">Report Title</label>
                                    <input type="text" name="report_title" class="form-control" placeholder="Write Here Please" />
                                    <div class="error-message" id="reportTitleError"></div>
                                </div>

                                <div class="form-group d-flex flex-column mb-4">
                                    <label class="form-label mb-3">Patient</label>
                                    <select required name="customer_package_purchage_id" class="form-select" id="patientSelect">
                                        <option value="">Choose</option>
                                        @if (!empty($patient_list))
                                        @foreach ($patient_list as $patient)
                                        <option value="{{ !empty($patient['id']) ? $patient['id'] : '' }}">
                                            {{ !empty($patient['name']) ? $patient['name'] : '' }}
                                        </option>
                                        @endforeach @endif
                                    </select>
                                    <div class="error-message" id="patientError"></div>
                                </div>

                                <div class="form-group mb-5">
                                    <label class="form-label d-block mb-3">Upload Report File</label>
                                    <div class="d-flex">

                                        <label for="fileInput">
                                            <input type="file" name="report_path" class="form-control text-dark d-none" id="fileInput" onchange="previewFile()">
                                            <img id="previewImage" src="{{asset('front/assets/img/uploadHere.png')}}" alt="image" class="cp up-image">
                                        </label>
                                        <div class="prev-img-div d-flex align-items-end gap-3 w-100" style="position: relative;">
                                            <!-- <img id="previewImage" src="{{asset('front/assets/img/uploadHere.png')}}" alt="image" class="cp up-image"> -->
                                            <button type="button" onclick="removePreview()" id="removePreviewBtn" style="position: absolute; top: 5px; right: 5px; background-color: transparent; border: none; color: red; cursor: pointer; display: none;"><i class="ri-close-line"></i></button>
                                            <div id="previewPDF" style="display: none;">
                                                <img src="{{asset('front/assets/img/pdf2.svg')}}" alt="pdf-icon">
                                                <span id="pdfFileName"></span>
                                            </div>
                                            <h5 id="valText">*Document formats you can upload: PDF, PNG, JPEG, TIFF</h5>
                                        </div>
                                    </div>
                                    <div class="error-message" id="reportPathError"></div>
                                </div>

                                <div class="section-btns mb-5">
                                    <button type="button" class="btn save-btn-black" id="uploadBtn" onclick="disableButton()">Upload Reports</button>
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
                            <!-- FILTER -->
                            <div class="filter-div">
                                <div class="search-div">
                                    <input type="text" placeholder="Search" id="liveSearchInput" />
                                </div>

                                {{-- <div class="list-div">
                                    <select name="" id="">
                                        <option value="">List for date</option>
                                        <option value="">List for Price</option>
                                        <option value="">List for Distance</option>
                                    </select>
                                </div> --}}
                            </div>

                            <div id="resultContainer"></div>

                            <!-- Reports-->



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
<script>
    function previewFile() {
        var fileInput = document.getElementById('fileInput');
        var previewImage = document.getElementById('previewImage');
        var removePreviewBtn = document.getElementById('removePreviewBtn');
        var previewPDF = document.getElementById('previewPDF');
        var pdfFileName = document.getElementById('pdfFileName');
        var valText = document.getElementById('valText')

        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            if (file.type.startsWith('image/')) {
                previewImage.src = reader.result;
                previewImage.style.display = 'block';
                removePreviewBtn.style.display = 'block';
                previewPDF.style.display = 'none';
                valText.style.display = 'none';
            } else if (file.type === 'application/pdf') {
                previewPDF.style.display = 'flex';
                pdfFileName.textContent = file.name;
                previewImage.style.display = 'none';
                removePreviewBtn.style.display = 'flex';
                valText.style.display = 'none';
            } else {
                // Ignore other file types (optional)
                previewImage.src = 'front/assets/img/default-img.png';
                previewImage.style.display = 'block';
                removePreviewBtn.style.display = 'none';
                previewPDF.style.display = 'none';
            }
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            previewImage.src = 'front/assets/img/default-img.png';
            previewPDF.style.display = 'none';
            pdfFileName.textContent = '';
            previewImage.style.display = 'block';
            removePreviewBtn.style.display = 'none';
        }
    }

    function removePreview() {
        var fileInput = document.getElementById('fileInput');
        var previewImage = document.getElementById('previewImage');
        var removePreviewBtn = document.getElementById('removePreviewBtn');
        var previewPDF = document.getElementById('previewPDF');
        var pdfFileName = document.getElementById('pdfFileName');

        fileInput.value = ""; // Clear the file input
        previewImage.src = "front/assets/img/default-img.png";
        previewImage.style.display = "block";
        removePreviewBtn.style.display = "none";
        previewPDF.style.display = "none";
        pdfFileName.textContent = "";
    }
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
    //$(document).ready(function () {
    // Function to validate the form
    function validateForm() {
        var isValid = true;

        // Validate Report Title
        var reportTitle = $('input[name="report_title"]').val().trim();
        if (reportTitle === '') {
            isValid = false;
            $('#reportTitleError').text('Report Title is required.');
        } else {
            $('#reportTitleError').text('');
        }

        // Validate Patient selection
        var selectedPatient = $('#patientSelect').val();
        if (selectedPatient === '') {
            isValid = false;
            $('#patientError').text('Please choose a patient.');
        } else {
            $('#patientError').text('');
        }

        // Validate Report File
        var reportPath = $('input[name="report_path"]').val();
        if (reportPath === '') {
            isValid = false;
            $('#reportPathError').text('Please upload a report file.');
        } else {
            $('#reportPathError').text('');
        }

        return isValid;
    }

    // Submit form with validation
    $('#reportForm').submit(function(event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });
    //});
</script>

<script>
    //$(document).ready(function(){

    performSearch();

    // Bind the function to the input event on the search box
    $('#liveSearchInput').on('input', function() {
        performSearch();
    });

    function performSearch(){
        let query = $('#liveSearchInput').val();
        var base_url = $("#base_url").val();

        $.ajax({
            url: base_url + "/provider-reports-list",
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
                    $('#resultContainer').html('<div class="no-data">\
                     <img src="{{ asset('front / assets / img / No - Data - Found - 1. svg ') }}" alt="" class="">\
                </div>');
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
    function disableButton() {
        document.getElementById("uploadBtn").disabled = true;
        document.getElementById("uploadBtn").innerHTML = "Uploading...";
        setTimeout(function() {
            document.getElementById("uploadForm").submit();
        }, 100);
    }
</script>


@endsection