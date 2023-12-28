var base_url = $("#base_url").val();

$(document).ready(() => {
    $(".preview").change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                console.log(event.target.result);
                $(".preview_image").attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});

$(document).ready(() => {
    $(".preview1").change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                console.log(event.target.result);
                $(".preview_image1").attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});

$(document).ready(() => {
    $(".preview2").change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                console.log(event.target.result);
                $(".preview_image2").attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});

$(document).ready(() => {
    $(".preview3").change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                console.log(event.target.result);
                $(".preview_image3").attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});

$(document).ready(() => {
    $(".preview4").change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                console.log(event.target.result);
                $(".preview_image4").attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});

$(document).ready(() => {
    $(".preview5").change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                console.log(event.target.result);
                $(".preview_image5").attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});

$(document).ready(() => {
    $(".preview6").change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                console.log(event.target.result);
                $(".preview_image6").attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});

$(document).ready(() => {
    $(".preview7").change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                console.log(event.target.result);
                $(".preview_image7").attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});

$(document).on("click", ".change-status", function () {
    var id = $(this).data("id");
    var base_url = $("#base_url").val();
    var table = $(this).data("table");
    var flash = $(this).data("flash");
    var actionDiv = $(this);
    if (confirm("Do you really want to change status ?")) {
        $.ajax({
            type: "post",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { id: id, table: table, flash: flash },
            url: base_url + "/admin/change-status",
            beforeSend: function () {
                $(this).hide();
                actionDiv
                    .html(
                        "<i class='fa fa-spin fa-spinner' style='color: #0c0c0c !important;'></i>"
                    )
                    .show();
            },
            success: function (data) {
                var oTable = $("#example").dataTable();
                oTable.fnDraw(false);

                success_toast("Success", data.message);
            },
        });
    }
});
$(document).on("click", ".Measurement_change-status", function () {
    var id = $(this).data("id");
    var base_url = $("#base_url").val();
    var table = $(this).data("table");
    var flash = $(this).data("flash");
    var actionDiv = $(this);
    if (confirm("Do you really want to change status ?")) {
        $.ajax({
            type: "post",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { id: id, table: table, flash: flash },
            url: base_url + "/admin/Measurement_change-status",
            beforeSend: function () {
                $(this).hide();
                actionDiv
                    .html(
                        "<i class='fa fa-spin fa-spinner' style='color: #0c0c0c !important;'></i>"
                    )
                    .show();
            },
            success: function (data) {
                var oTable = $("#example").dataTable();
                oTable.fnDraw(false);

                success_toast("Success", data.message);
            },
        });
    }
});
$(document).on("click", ".state_district_city_change-status", function () {
    var id = $(this).data("id");
    var base_url = $("#base_url").val();
    var table = $(this).data("table");
    var flash = $(this).data("flash");
    var actionDiv = $(this);
    if (confirm("Do you really want to change status ?")) {
        $.ajax({
            type: "post",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { id: id, table: table, flash: flash },
            url: base_url + "/admin/state_district_city_change-status",
            beforeSend: function () {
                $(this).hide();
                actionDiv
                    .html(
                        "<i class='fa fa-spin fa-spinner' style='color: #0c0c0c !important;'></i>"
                    )
                    .show();
            },
            success: function (data) {
                var oTable = $("#example").dataTable();
                oTable.fnDraw(false);

                success_toast("Success", data.message);
            },
        });
    }
});
// $(document).on("click", ".delete", function () {
//     var id = $(this).data("id");
//     var table = $(this).data("table");
//     var flash = $(this).data("flash");
//     var actionDiv = $(this);
//     var base_url = $("#base_url").val();
//     if (confirm("Do you really want to delete this record ?")) {
//         $.ajax({
//             type: "get",
//             headers: {
//                 "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//             },
//             data: { id: id, table: table, flash: flash },
//             url: base_url + "/common-delete",
//             beforeSend: function () {
//                 actionDiv
//                     .html(
//                         "<i class='fa fa-spin fa-spinner' style='color: #000000 !important;'></i>"
//                     )
//                     .show();
//             },
//             success: function (data) {
//                 var oTable = $("#example").dataTable();
//                 oTable.fnDraw(false);
//                 success_toast("Success", data.message);
//             },
//             error: function (data) {
//                 console.log("Error:", data);
//             },
//         });
//     }
// });



$(document).on("click", ".delete", function (){
    var id = $(this).data("id");
    var table = $(this).data("table");
    var flash = $(this).data("flash");
    var actionDiv = $(this);
    var base_url = $("#base_url").val();
    if (confirm("Do you really want to delete this record ?")) {
        $.ajax({
            type: "get",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { id: id, table: table, flash: flash },
            url: base_url + "/admin/common-delete",
            beforeSend: function () {
                actionDiv
                    .html(
                        "<i class='fa fa-spin fa-spinner' style='color: #000000 !important;'></i>"
                    )
                    .show();
            },
            success: function (data) {
                var oTable = $("#example").dataTable();
                oTable.fnDraw(false);
                success_toast("Success", data.message);
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    }
});

function getDistricts(state_id) {
    if (state_id != "") {
        $("#district_id").html("");
        $("#city_id").html("");
        $.ajax({
            url: base_url + "/districts-list",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            data: { state_id: state_id },
            success: function (html) {
                if (html != "") {
                    $("#district_id").html(html);
                    console.log($("#district_id").html(html));
                } else {
                    $("#district_id").html("");
                }
            },
        });
    }
}
function getCities(district_id) {
    if (district_id != "") {
        $("#city_id").html("");
        $.ajax({
            url: base_url + "/city-list",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            data: { district_id: district_id },
            success: function (html) {
                if (html != "") {
                    $("#city_id").html(html);
                } else {
                    $("#city_id").html("");
                }
            },
        });
    }
}
$(document).on("click", ".student_record_delete", function () {
    var id = $(this).data("id");
    var table = $(this).data("table");
    var flash = $(this).data("flash");
    var actionDiv = $(this);
    var base_url = $("#base_url").val();

    if (confirm("Do you really want to delete this record ?")) {
        $.ajax({
            type: "get",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { id: id, table: table, flash: flash },
            url: base_url + "/delete-student-record",
            beforeSend: function () {
                actionDiv
                    .html(
                        "<i class='fa fa-spin fa-spinner' style='color: #000000 !important;'></i>"
                    )
                    .show();
            },
            success: function (data) {
                var oTable = $("#student_records").dataTable();
                oTable.fnDraw(false);
                success_toast("Success", data.message);
                location.reload();
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    }
});
$(document).on("click", ".student_delete", function () {
    var id = $(this).data("id");
    var table = $(this).data("table");
    var flash = $(this).data("flash");
    var actionDiv = $(this);
    var base_url = $("#base_url").val();

    if (confirm("Do you really want to delete this record ?")) {
        $.ajax({
            type: "get",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { id: id, table: table, flash: flash },
            url: base_url + "/delete-student",
            beforeSend: function () {
                actionDiv
                    .html(
                        "<i class='fa fa-spin fa-spinner' style='color: #000000 !important;'></i>"
                    )
                    .show();
            },
            success: function (data) {
                var oTable = $("#example").dataTable();
                oTable.fnDraw(false);
                success_toast("Success", data.message);
                location.reload();
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    }
});

$(document).on("click", ".teacher_delete", function () {
    var id = $(this).data("id");
    var table = $(this).data("table");
    var flash = $(this).data("flash");
    var actionDiv = $(this);
    var base_url = $("#base_url").val();

    if (confirm("Do you really want to delete this record ?")) {
        $.ajax({
            type: "get",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { id: id, table: table, flash: flash },
            url: base_url + "/delete-teacher",
            beforeSend: function () {
                actionDiv
                    .html(
                        "<i class='fa fa-spin fa-spinner' style='color: #000000 !important;'></i>"
                    )
                    .show();
            },
            success: function (data) {
                var oTable = $("#example").dataTable();
                oTable.fnDraw(false);
                success_toast("Success", data.message);
                location.reload();
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    }
});
$(document).on("click", ".teacher_record_delete", function () {
    var id = $(this).data("id");
    var table = $(this).data("table");
    var flash = $(this).data("flash");
    var actionDiv = $(this);
    var base_url = $("#base_url").val();

    if (confirm("Do you really want to delete this record ?")) {
        $.ajax({
            type: "get",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { id: id, table: table, flash: flash },
            url: base_url + "/delete-teacher-record",
            beforeSend: function () {
                actionDiv
                    .html(
                        "<i class='fa fa-spin fa-spinner' style='color: #000000 !important;'></i>"
                    )
                    .show();
            },
            success: function (data) {
                var oTable = $("#example").dataTable();
                oTable.fnDraw(false);
                success_toast("Success", data.message);
                location.reload();
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    }
});
$(document).on("click", ".event_delete", function () {
    var id = $(this).data("id");
    var table = $(this).data("table");
    var flash = $(this).data("flash");
    var actionDiv = $(this);
    var base_url = $("#base_url").val();

    if (confirm("Do you really want to delete this record ?")) {
        $.ajax({
            type: "get",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { id: id, table: table, flash: flash },
            url: base_url + "/delete-event",
            beforeSend: function () {
                actionDiv
                    .html(
                        "<i class='fa fa-spin fa-spinner' style='color: #000000 !important;'></i>"
                    )
                    .show();
            },
            success: function (data) {
                var oTable = $("#example").dataTable();
                oTable.fnDraw(false);
                success_toast("Success", data.message);
                location.reload();
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    }
});
$(document).on("click", ".announcement_delete", function () {
    var id = $(this).data("id");
    var table = $(this).data("table");
    var flash = $(this).data("flash");
    var actionDiv = $(this);
    var base_url = $("#base_url").val();

    if (confirm("Do you really want to delete this record ?")) {
        $.ajax({
            type: "get",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { id: id, table: table, flash: flash },
            url: base_url + "/delete-announcement",
            beforeSend: function () {
                actionDiv
                    .html(
                        "<i class='fa fa-spin fa-spinner' style='color: #000000 !important;'></i>"
                    )
                    .show();
            },
            success: function (data) {
                success_toast("Success", data.message);
                location.reload();
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    }
});
$(document).on("click", ".job_delete", function () {
    var id = $(this).data("id");
    var table = $(this).data("table");
    var flash = $(this).data("flash");
    var actionDiv = $(this);
    var base_url = $("#base_url").val();

    if (confirm("Do you really want to delete this record ?")) {
        $.ajax({
            type: "get",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { id: id, table: table, flash: flash },
            url: base_url + "/delete-job",
            beforeSend: function () {
                actionDiv
                    .html(
                        "<i class='fa fa-spin fa-spinner' style='color: #000000 !important;'></i>"
                    )
                    .show();
            },
            success: function (data) {
                var oTable = $("#example").dataTable();
                oTable.fnDraw(false);
                success_toast("Success", data.message);
                location.reload();
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    }
});
$(document).on("click", ".infrastructure_delete", function () {
    var id = $(this).data("id");
    var table = $(this).data("table");
    var flash = $(this).data("flash");
    var actionDiv = $(this);
    var base_url = $("#base_url").val();

    if (confirm("Do you really want to delete this record ?")) {
        $.ajax({
            type: "get",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { id: id, table: table, flash: flash },
            url: base_url + "/delete-infrastructure",
            beforeSend: function () {
                actionDiv
                    .html(
                        "<i class='fa fa-spin fa-spinner' style='color: #000000 !important;'></i>"
                    )
                    .show();
            },
            success: function (data) {
                var oTable = $("#example").dataTable();
                oTable.fnDraw(false);
                success_toast("Success", data.message);
                location.reload();
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    }
});
$(document).on("click", ".change-status-jobs", function () {
    var id = $(this).data("id");
    var base_url = $("#base_url").val();
    var table = $(this).data("table");
    var flash = $(this).data("flash");
    var actionDiv = $(this);
    if (confirm("Do you really want to change status ?")) {
        $.ajax({
            type: "post",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { id: id, table: table, flash: flash },
            url: base_url + "/change-status-job",
            beforeSend: function () {
                $(this).hide();
                actionDiv
                    .html(
                        "<i class='fa fa-spin fa-spinner' style='color: #0c0c0c !important;'></i>"
                    )
                    .show();
            },
            success: function (data) {
                var oTable = $("#example").dataTable();
                oTable.fnDraw(false);

                success_toast("Success", data.message);
            },
        });
    }
});
$(document).on("click", ".change-status-infrastructure", function () {
    var id = $(this).data("id");
    var base_url = $("#base_url").val();
    var table = $(this).data("table");
    var flash = $(this).data("flash");
    var actionDiv = $(this);
    if (confirm("Do you really want to change status ?")) {
        $.ajax({
            type: "post",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { id: id, table: table, flash: flash },
            url: base_url + "/change-status-infrastructure",
            beforeSend: function () {
                $(this).hide();
                actionDiv
                    .html(
                        "<i class='fa fa-spin fa-spinner' style='color: #0c0c0c !important;'></i>"
                    )
                    .show();
            },
            success: function (data) {
                var oTable = $("#example").dataTable();
                oTable.fnDraw(false);

                success_toast("Success", data.message);
            },
        });
    }
});
$(document).on("click", ".mentor_record_delete", function () {
    var id = $(this).data("id");
    var table = $(this).data("table");
    var flash = $(this).data("flash");
    var actionDiv = $(this);
    var base_url = $("#base_url").val();

    if (confirm("Do you really want to delete this record ?")) {
        $.ajax({
            type: "get",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { id: id, table: table, flash: flash },
            url: base_url + "/delete-mentor-record",
            beforeSend: function () {
                actionDiv
                    .html(
                        "<i class='fa fa-spin fa-spinner' style='color: #000000 !important;'></i>"
                    )
                    .show();
            },
            success: function (data) {
                var oTable = $("#example").dataTable();
                oTable.fnDraw(false);
                success_toast("Success", data.message);
                location.reload();
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    }
});
// $(document).ready(() => {
//     var no_of_fields = 0;
//     $(".no-of-fields-school").each(function () {
//         no_of_fields++;
//     });
//     $.ajax({
//         type: "get",
//         headers: {
//             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//         },
//         data: { no_of_fields: no_of_fields },
//         url: base_url + "/percentageSchool",
//         success: function (data) {
           
//             if(data.status == 'true'){
//                 $(".profile-completed").html(data.data);
//                 document.getElementById('progress-bar').style.width= data.data + '%';
//             }
//         },
//         error: function (data) {
//             console.log("Error:", data);
//         },
//     });
// });

$(document).ready(() => {
    // var no_of_fields = 0;
    // $(".no-of-fields-student").each(function () {
    //     no_of_fields++;
    // });
    $.ajax({
        type: "get",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        // data: { no_of_fields: no_of_fields },
        url: base_url + "/user-profile-completed",
        success: function (data) {
            console.log(data);
            if(data.status == 'true'){
                $(".profile-completed").html(data.data);
                document.getElementById('progress-bar').style.width= data.data + '%';
            }
        },
        error: function (data) {
            console.log("Error:", data);
        },
    });
});

// $(document).ready(() => {
//     var no_of_fields = 0;
//     $(".no-of-fields-teacher").each(function () {
//         no_of_fields++;
//     });
//     $.ajax({
//         type: "get",
//         headers: {
//             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//         },
//         data: { no_of_fields: no_of_fields },
//         url: base_url + "/percentageTeacher",
//         success: function (data) {
//             console.log(data);
//             if(data.status == 'true'){
//                 $(".profile-completed").html(data.data);
//                 document.getElementById('progress-bar').style.width= data.data + '%';
//             }
//         },
//         error: function (data) {
//             console.log("Error:", data);
//         },
//     });
// });

// $(document).ready(() => {
//     var no_of_fields = 0;
//     $(".no-of-fields-teacher").each(function () {
//         no_of_fields++;
//     });
//     $.ajax({
//         type: "get",
//         headers: {
//             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//         },
//         data: { no_of_fields: no_of_fields },
//         url: base_url + "/percentageTeacher",
//         success: function (data) {
//             console.log(data);
//             if(data.status == 'true'){
//                 $(".profile-completed").html(data.data);
//                 document.getElementById('progress-bar').style.width= data.data + '%';
//             }
//         },
//         error: function (data) {
//             console.log("Error:", data);
//         },
//     });
// });


$(document).on("click", ".admin_teacher_delete", function (){ 
    
    var id = $(this).data("id");
    var table = $(this).data("table");
    var flash = $(this).data("flash");
    var actionDiv = $(this);
    var base_url = $("#base_url").val();
  
    if (confirm("Do you really want to delete this record ?")) {
        $.ajax({
            type: "get",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { id: id, table: table, flash: flash },
            url: base_url + "/admin/admin-delete-teacher",
            beforeSend: function () {
                actionDiv
                    .html(
                        "<i class='fa fa-spin fa-spinner' style='color: #000000 !important;'></i>"
                    )
                    .show();
            },
            success: function (data) {
                console.log(data);
                var oTable = $("#example").dataTable();
                oTable.fnDraw(false);
                success_toast("Success", data.message);
                location.reload();
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    }
  });
  