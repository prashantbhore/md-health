@extends('front.layout.layout2')
@section('content')
<style>
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
        font-family: "Campton";
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
        color: #979797;
        font-family: CamptonBook;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        letter-spacing: -0.64px;
    }

    .error-message {
        color: red;
        margin-top: 5px;
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

                            <form method="POST" action="{{ route('add.report') }}" enctype="multipart/form-data" id="reportForm">
                                @csrf

                                <div class="form-group mb-4">
                                    <label class="form-label mb-3">Report Title</label>
                                    <input type="text" name="report_title" class="form-control" placeholder="Write Here Please" />
                                    <div class="error-message" id="reportTitleError"></div>
                                </div>

                                <div class="form-group d-flex flex-column mb-4">
                                    <label class="form-label mb-3">Patient</label>
                                    <select name="customer_package_purchage_id" class="form-select" id="patientSelect">
                                        <option value="">Choose Patient</option>
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
                                    <label class="form-label mb-3">Upload Report File</label>
                                    <div class="form-group my-3">
                                        <input type="file" name="report_path" class="form-control text-dark" id="fileInput" onchange="previewFile()">
                                    </div>
                                    <div class="prev-img-div d-flex align-items-end gap-3" style="position: relative;">
                                        <img id="previewImage" src="front/assets/img/default-img.png" alt="image" style="max-width: 100%; max-height: 200px;">
                                        <button type="button" onclick="removePreview()" id="removePreviewBtn" style="position: absolute; top: 5px; right: 5px; background-color: transparent; border: none; color: red; cursor: pointer; display: none;">&times;</button>
                                        <div id="previewPDF" style="display: none;">
                                            <img src="path/to/pdf-icon.png" alt="pdf-icon" style="width: 50px; height: 50px;">
                                            <span id="pdfFileName"></span>
                                        </div>
                                        <h5>*Document formats you can upload: PDF, PNG, JPEG, TIFF</h5>
                                    </div>
                                    <div class="error-message" id="reportPathError"></div>
                                </div>

                                <div class="section-btns mb-5">
                                    <button type="submit" class="btn save-btn-black">Upload Reports</a>
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
                                    <input type="text" class="form-control" placeholder="Search" id="liveSearchInput" />
                                </div>

                                <div class="list-div">
                                    <select name="" id="" class="form-select">
                                        <option value="">List for Date</option>
                                        <option value="">List for Price</option>
                                        <option value="">List for Distance</option>
                                    </select>
                                </div>
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

        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            if (file.type.startsWith('image/')) {
                previewImage.src = reader.result;
                previewImage.style.display = 'block';
                removePreviewBtn.style.display = 'block';
                previewPDF.style.display = 'none';
            } else if (file.type === 'application/pdf') {
                previewPDF.style.display = 'block';
                pdfFileName.textContent = file.name;
                previewImage.style.display = 'none';
                removePreviewBtn.style.display = 'block';
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

    function performSearch() {

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


@endsection