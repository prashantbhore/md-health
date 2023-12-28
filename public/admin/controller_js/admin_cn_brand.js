
    $(document).ready(function() {
        $("#brandformId").validate({
            rules: {
                brand_category: {
                    required: true,
                },
                brand_name: {
                    required: true,
                    lettersOnly: true,
                },
            },
            messages: {
                brand_category: {
                    required: "Please select a brand category",
                },
                brand_name: {
                    required: "Please enter a brand name",
                    lettersOnly: "Please enter letters only",
                },
            },
            errorElement: "span",
            errorClass: "text-danger",
        });

        $.validator.addMethod(
            "lettersOnly",
            function(value, element) {
                return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
            },
            "Please enter letters only"
        );
    });





    // $(function (){
    //     var table = $("#example").DataTable({
    //         ordering: false,
    //         processing: true,
    //         serverSide: true,
    //         paging: true,
    //         searching: true,
    //         destroy: true,
    //         clear: true,
    //         ajax: base_url + "/admin/brand-data-table",
    //         method:'get',
    //         columns: [
    //             {
    //                 data: "brand_unique_id",
    //                 name: "brand_unique_id",
    //             },
    
    //             {
    //                 data: "brand_name",
    //                 name: "brand_name",
    //             },
    
    //             {
    //                 data: "brand_category",
    //                 name: "brand_category",
    //             },
              
    //             {
    //                 data: "action",
    //                 name: "action",
    //             },
    //         ],
    //     });
    
    //     function reload_table(){
    //         table.DataTable().ajax.reload(null, false);
    //     }
    // });




    

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
              url: base_url + "/admin/brand-data-table",
              data: function (d) {
                  d.brand_category = $('#brand_category').val();
              },
          },
          columns: [
            {
                data: "brand_unique_id",
                name: "brand_unique_id",
            },

            {
                data: "brand_name",
                name: "brand_name",
            },

            {
                data: "brand_category",
                name: "brand_category",
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
  






    




    // $(function (){
    //     var table = $("#example").DataTable({
    //         processing: true,
    //         serverSide: true,
    //         destroy: true,
    //         clear: true,
    
           
    //         ajax: base_url + "/admin/brand-data-table",
    //         data: function (d) {
    //             d.school_id = $('#brand_category').val();
    //         },
    //         columns: [
    //             {
    //                 data: "brand_unique_id",
    //                 name: "brand_unique_id",
    //             },
    
    //             {
    //                 data: "brand_name",
    //                 name: "brand_name",
    //             },
    
    //             {
    //                 data: "brand_category",
    //                 name: "brand_category",
    //             },
              
               
    //             {
    //                 data: 'action',
    //                 name: 'action',
    //                 orderable: false,
    //                 searchable: false
    //             },
    //         ],
    //     });
    
    //     function reload_table() {
    //         table.DataTable().ajax.reload(null, false);
    //     }
    // });




    




    
$(document).on("click", ".brand-delete", function (){

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
            url: base_url + "/admin/brand-delete",
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




function editBrand(id) {
    $.ajax({
        url: base_url+'/admin/brand/' + id + '/edit', 
        type: 'GET',
        success: function(data) {

            //onsole.log(data);
          
            $('#addNewBrandModalBody').html(data);

            // alert(data.brand_name);

       

           
            

            // Set values in the form fields
            $('#id').val(data.id);

            $('#brand_category').val(data.brand_category_id);

            $('#brand_name').val(data.brand_name);

            // Open the modal
            $('#addNewBrandModal').modal('show');
        },
        error: function(error) {
            console.error('Error fetching data:', error);
        }
    });
}
