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
              url: base_url + "/admin/medical-tourism-data-table",
             
          },
          columns: [

            {
                data: "id",
                name: "id",
            },

            {
                data: "hospital",
                name: "hospital",
            },

           

            {
                data: "tax_no",
                name: "tax_no",
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
                data: "status",
                name: "status",
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



  
      
$(document).on("click", ".medical-tourism-delete", function (){

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
            url: base_url + "/admin/medical-tourism-delete",
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














   // $(document).ready(function (){
        $('.verifiedcheckbox').click(function (){
            
            
           
            var id = $(this).data("id");
          
            var isChecked = $(this).prop('checked');

           

            $.ajax({
                method: 'POST',

                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            
                data: { 
                    status: isChecked ? 'yes' : 'no',
                    id:id,
                     
                },
                url: base_url + "/admin/verification-status-chnage",
                success: function (data){
                   

                    success_toast("Success", data.message);
                },
                error: function (error) {
                    // Handle the error response if needed
                    console.error(error);
                }
            });
        });
    //});


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
                url: base_url + "/admin/vendor-status-chnage",
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
                url: base_url + "/admin/vendor-delete",
                success: function (data) {
                    success_toast("Success", data.message);
    
                    // Replace the current history entry with the current URL
                    var currentUrl = window.location.href;
                    window.history.replaceState({}, document.title, currentUrl);
    
                    // Redirect to your desired route
                    window.location.href = base_url + "/admin/service-provider";
                },
                error: function (error) {
                    console.error(error);
                }
            });
        });
    });



    $(document).ready(function() {
        $(".delete-product").on("click", function(e) {
          
           
            e.preventDefault();
          

            var confirmed = window.confirm("Are you sure you want to delete this product?");
            
            if (!confirmed) {
                return;
            }

            var productId = $(this).data("product-id");
            var productCard = $(".product-card[data-product-id='" + productId + "']");

            $.ajax({
                method: 'POST',
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                url: base_url+'/admin/admin-delete-package',
                data: { productId: productId },
                success: function(data) {
                    success_toast("Success", data.message);
                    'product_'+productId.hide();

                    var currentUrl = window.location.href;
                    window.history.replaceState({}, document.title, currentUrl);
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });
    });


    


   
        