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




$(document).off("click", ".md-change-status").on("click", ".md-change-status", function (){

    var id = $(this).data("id");

    var base_url = $("#base_url").val();

    

    var table = $(this).data("table");

   

    var flash = $(this).data("flash");


    

   

    var actionDiv = $(this);
    if (confirm("Do you really want to change status ?")){
        $.ajax({
            type: "post",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { id: id, table: table, flash: flash },
            url: base_url + "/change-status",
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

