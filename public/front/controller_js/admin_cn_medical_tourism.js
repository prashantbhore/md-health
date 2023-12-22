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


$(document).on("click", ".medical-provier-logo-delete", function (){



    var id = $(this).data("id");
    var table = $(this).data("table");
    var flash = $(this).data("flash");

    var actionDiv = $(this);

    var base_url = $("#base_url").val();
    
    if (confirm("Do you really want to delete logo?")) {
        $.ajax({
            type: "get",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { id: id, table: table, flash: flash },
            url: base_url + "/admin/medical-tourism-delete-logo",
            beforeSend: function () {
                actionDiv
                    .html(
                        "<i class='fa fa-spin fa-spinner' style='color: #000000 !important;'></i>"
                    )
                    .show();
            },
            success: function (data) {

                var imageContainer = actionDiv.closest('div');
                var image = imageContainer.find('img'); 
                image.remove();
            
              
                imageContainer.find('.fa-spin').remove();

                success_toast("Success", data.message);
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    }
});



$(document).on("click", ".medical-provier-license-delete", function (){

    var id = $(this).data("id");
    var table = $(this).data("table");
    var flash = $(this).data("flash");

    var actionDiv = $(this);

    var base_url = $("#base_url").val();
    
    if (confirm("Do you really want to delete license?")) {
        $.ajax({
            type: "get",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { id: id, table: table, flash: flash },
            url: base_url + "/admin/medical-tourism-delete-license",
            beforeSend: function () {
                actionDiv
                    .html(
                        "<i class='fa fa-spin fa-spinner' style='color: #000000 !important;'></i>"
                    )
                    .show();
            },
            success: function (data) {

                var imageContainer = actionDiv.closest('div');
                var image = imageContainer.find('img'); 
                image.remove();
            
              
                imageContainer.find('.fa-spin').remove();

                success_toast("Success", data.message);
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    }
});




$(document).on("click", ".medical-provier-gallary-delete", function (){

    var id = $(this).data("id");
    var table = $(this).data("table");
    var flash = $(this).data("flash");

    var actionDiv = $(this);

    var base_url = $("#base_url").val();
    
    if (confirm("Do you really want to delete gallery image?")){
        $.ajax({
            type: "get",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { id: id, table: table, flash: flash },
            url: base_url + "/admin/medical-tourism-delete-gallery",
            beforeSend: function () {
                actionDiv
                    .html(
                        "<i class='fa fa-spin fa-spinner' style='color: #000000 !important;'></i>"
                    )
                    .show();
            },
            success: function (data) {


                var imageContainer = actionDiv.closest('div');
                var galleryItem = imageContainer.closest('.d-flex.flex-column');
            
                galleryItem.fadeOut('slow', function () {
                    $(this).remove();
                });

                // var imageContainer = actionDiv.closest('div');
                // var image = imageContainer.find('img');
            
            
                // image.hide();
            
             
                // imageContainer.find('.fa-spin').remove();

                success_toast("Success", data.message);
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    }
});
