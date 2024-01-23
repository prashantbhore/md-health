// $(function (){
//     var table = $("#example").dataTable({
//         bFilter: false,
//         ordering: false,
//         processing: true,
//         serverSide: true,
//         paging: true,
//         searching: true,
//         destroy: true,
//         clear: true,
//         deferRender: true,
//           ajax: {
//               url: base_url + "/admin/customer-data-table",
//               data: function (d){
//                 d.status = $('#status').val();
//             },
             
//           },
//           columns: [

//             {
//                 data: "DT_RowIndex",
//                 name: "DT_RowIndex",
//                 orderable: false,
              
//             },

//             {
//                 data: "id",
//                 name: "id",
//             },

//             {
//                 data: "name",
//                 name: "name",
//             },


//             {
//                 data: "country",
//                 name: "country",
//             },

//             {
//                 data: "city",
//                 name: "city",
//             },

            
//             {
//                 data: "phone",
//                 name: "phone",
//             },

//             {
//                 data: "status",
//                 name: "status",
//             },
          
//             {
//                 data: "action",
//                 name: "action",
//             },
//           ],
//       });

    
//     $("#status").change(function (){
//         table.draw();
//     });

//   });






  
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
              url: base_url + "/admin/customer-data-table",
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
                data: "id",
                name: "id",
                orderable: false,
            },

            {
                data: "name",
                name: "name",
                orderable: false,
            },


            {
                data: "country",
                name: "country",
                orderable: false,
            },

            {
                data: "city",
                name: "city",
                orderable: false,
            },

            
            {
                data: "phone",
                name: "phone",
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

  



