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
              url: base_url + "/admin/top-earner-data-table",
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
                data: "full_name",
                name: "full_name",
                orderable: false,
            },


            {
                data: "network",
                name: "network",
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
                data: "earnings",
                name: "earnings",
                orderable: false,
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




  $(document).on("click", ".customer-coin-delete", function (){

   

    var id = $(this).data("id");
    var flash = $(this).data("flash");

     

    
    var actionDiv = $(this);

    var base_url = $("#base_url").val();
    
    if (confirm("Do you really want to delete?")){
        $.ajax({
            type: "post",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { id: id,flash: flash },
            url: base_url + "/admin/delete-earner",
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
            
              
                imageContainer.find('.fa-spin').remove();

                success_toast("Success", data.message);
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    }
});





