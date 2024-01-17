$(document).ready(function () {
    $("#yourFormId").validate({
        rules: {
            country: {
                required: true,
                lettersOnly: true,
            },
            country_code: {
                required: true,
                validCountryCode: true,
            },
        },
        messages: {
            country: {
                required: "Please enter a country name",
                lettersOnly: "Please enter letters only for the country name",
            },
            country_code: {
                required: "Please enter a country code",
                validCountryCode: "Please enter a valid country code (with '+' sign)",
            },
        },
        errorElement: "span",
        errorClass: "text-danger",
    });

    $.validator.addMethod(
        "lettersOnly",
        function (value, element) {
            return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
        },
        "Please enter letters only"
    );

    $.validator.addMethod(
        "validCountryCode",
        function (value, element) {
            // Allow numeric values or values starting with '+'
            return this.optional(element) || /^(\+?\d+|\d+)$/.test(value);
        },
        "Please enter a valid country code (numeric or with a '+' sign)"
    );
});





// $(function (){
// var table = $("#example").DataTable({
//     bFilter: false,
//     ordering: false,
//     processing: false,
//     serverSide: true,
//     paging: true,
//     searching: true,
//     destroy: true,
//     clear: true,
//     ajax: base_url + "/admin/country-data-table",
//     method:'get',
//     columns: [
//         {
//             data: "DT_RowIndex",
//             name: "DT_RowIndex",
//         },

//         {
//             data: "country_code",
//             name: "country_code",
//         },

//         {
//             data: "country_name",
//             name: "country_name",
//         },

//         {
//             data: "status",
//             name: "status",
//         },
      
//         {
//             data: "action",
//             name: "action",
//         },
//     ],
// });

// function reload_table() {
//     table.DataTable().ajax.reload(null, false);
// }
// });






$(function (){
    var table = $("#example").DataTable({
        processing: true,
        serverSide: true,
        searchable: true,
        deferRender: true,
        pagingType: 'numbers',
        destroy: true,
        clear: true,
          ajax: {
              url: base_url + "/admin/country-data-table",
              data: function (d) {
                  d.status = $('#status').val();
              },
          },
          columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: false,
                
            },
    
            {
                data: "country_code",
                name: "country_code",
                orderable: false,
            },
    
            {
                data: "country_name",
                name: "country_name",
                orderable: false,
            },
    
            {
                data: "status",
                name: "status",
                orderable: false,
                searchable: false,
            },
          
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
            },
            
         ],
      });
  
      $("#status").change(function (){
          table.draw();
      });
  });




















$(document).on("click", ".city-delete", function (){

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
        url: base_url + "/admin/city-delete",
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





$(document).on("click", ".country-delete", function (){
   

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
            url: base_url + "/admin/country-delete",
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