
    $(document).ready(function () {
        $("#yourFormId").validate({
            rules: {
                country: {
                    required: true,
                },
                city: {
                    required: true,
                    lettersOnly: true, 
                },
            },
            messages: {
                country: {
                    required: "Please select a country",
                },
                city: {
                    required: "Please enter a city name",
                    lettersOnly: "Please enter letters only",
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
    });


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
              url: base_url + "/admin/city-data-table",
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
                data: "city_name",
                name: "city_name",
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