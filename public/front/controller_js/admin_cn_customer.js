$(function (){
    var table = $("#example").DataTable({
        ordering: false,
        processing: true,
        serverSide: true,
        paging: true,
        searching: true,
        destroy: true,
        clear: true,
        deferRender: true,
          ajax: {
              url: base_url + "/admin/customer-data-table",
             
          },
          columns: [

            {
                data: "name",
                name: "name",
            },

            {
                data: "gender",
                name: "gender",
            },

            {
                data: "age",
                name: "age",
            },

            {
                data: "country",
                name: "country",
            },

            {
                data: "city",
                name: "city",
            },

            
            {
                data: "phone",
                name: "phone",
            },
          
          
          
          
            {
                data: "action",
                name: "action",
            },
          ],
      });
  
      $("#brand_category").change(function (){
          table.draw();
      });
  });




      
$(document).on("click", ".customer-delete", function (){

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
            url: base_url + "/admin/customer-delete",
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

  



