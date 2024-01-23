



// $(function (){
//     var table = $("#example").DataTable({
//         ordering: false,
//         processing: true,
//         serverSide: true,
//         paging: true,
//         searching: true,
//         destroy: true,
//         clear: true,
//         deferRender: true,
//           ajax: {
//               url: base_url + "/admin/md-health-package-data-table",
             
//           },
//           columns: [

//             {
//                 data: "id",
//                 name: "id",
//             },

//             {
//                 data: "package_name",
//                 name: "package_name",
//             },

//             {
//                 data: "provider",
//                 name: "provider",
//             },

//             {
//                 data: "category",
//                 name: "category",
//             },

//             {
//                 data: "package_price",
//                 name: "package_price",
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
  
//       $("#brand_category").change(function (){
//           table.draw();
//       });
//   });




  
// $(function (){

//     var table = $("#example").DataTable({
//         processing: true,
//         serverSide: true,
//         destroy: true,
//         clear: true,

//         ajax:base_url + "/admin/md-health-package-data-table",
//         columns: [
          
//             {
//                 data: "id",
//                 name: "id",
//             },

//             {
//                 data: "package_name",
//                 name: "package_name",
//             },

//             {
//                 data: "provider",
//                 name: "provider",
//             },

//             {
//                 data: "category",
//                 name: "category",
//             },

//             {
//                 data: "package_price",
//                 name: "package_price",
//             },
          
          
           
//             {
//                 data: "status",
//                 name: "status",
//                 orderable: false,
//                 searchable: false,
//             },
//             {
//                 data: "action",
//                 name: "action",
//                 orderable: false,
//                 searchable: false,
//             },
//         ],
//     });

//     function reload_table() {
//         table.DataTable().ajax.reload(null, false);
//     }
// });







$(function (){
    var table = $("#example").DataTable({
        ordering: false,
        processing: false,
        serverSide: true,
        paging: true,
        searching: true,
        destroy: true,
        clear: true,
        ajax:base_url + "/admin/md-health-package-data-table",
        method:'get',
        columns: [

            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
            },

            {
                data: "id",
                name: "id",
            },

            {
                data: "package_name",
                name: "package_name",
            },

            {
                data: "provider",
                name: "provider",
            },

            {
                data: "category",
                name: "category",
            },

            {
                data: "package_price",
                name: "package_price",
            },

            
            {
                data: "status",
                name: "status",
            },
          
          
            {
                data: "action",
                name: "action",
            },
        ],
    });

    function reload_table() {
        table.DataTable().ajax.reload(null, false);
    }
});





$(document).on("click", ".package_delete", function (){
    
    var id = $(this).data("id");
    var table = $(this).data("table");
    var flash = $(this).data("flash");
    var actionDiv = $(this);

   

    var base_url = $("#base_url").val();
    if (confirm("Do you really want to delete this record ?")){
        $.ajax({
            type: "get",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { id: id, table: table, flash: flash },
            url: base_url + "/admin/md-health-package-delete",
            beforeSend: function () {
                actionDiv
                    .html(
                        "<i class='fa fa-spin fa-spinner' style='color: #000000 !important;'></i>"
                    )
                    .show();
            },
            success: function (data) {
                alert('Hi');
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



$(document).ready(function(){
    $('.deactivate-btn').click(function (){

   
        var button = $(this); 
        var id = button.data("id");

        $.ajax({
            method: 'POST',
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                id: id,
            },
            url: base_url + "/admin/package-status-chnage",
            success: function (data){

                var newText = (button.text() === 'Activate Vendors') ? 'Deactivate Vendors' : 'Activate Vendors';
                button.text(newText);

                success_toast("Success", data.message);
            },
            error: function (error){
                console.error(error);
            }
        });
    });
});



$(document).ready(function (){
    $('.delete-btn').click(function (){
        var button = $(this);
        var id = button.data("id");

        $.ajax({
            method: 'POST',
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                id: id,
            },
            url: base_url + "/admin/package-delete",
            success: function (data) {
                success_toast("Success", data.message);

                // Replace the current history entry with the current URL
                var currentUrl = window.location.href;
                window.history.replaceState({}, document.title, currentUrl);

                // Redirect to your desired route
                window.location.href = base_url + "/admin/product-mdhealth";
            },
            error: function (error) {
                console.error(error);
            }
        });
    });
});
