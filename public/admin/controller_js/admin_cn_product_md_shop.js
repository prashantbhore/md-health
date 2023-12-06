
//Dynamic input  field js

$(document).ready(function () {
    var counter = 1;

    function addInputField() {
        var newInput = '<div class="input-group mb-3">' +
            '<input type="text" name="subcategory[]" class="form-control border-end-0 dynamic-input" placeholder="subcategory" aria-label="Dynamic Treatment" aria-describedby="addTreatment" />' +
            '<span class="input-group-text border-start-0 remove-treatment" data-counter="' + counter + '">-</span>' +
            '</div>';
        $('.treatmentsAdd').find('.input-group:first').before(newInput);
        counter++;
    }

    $('#addTreatment').on('click', function () {
        addInputField();
    });

    $('.treatmentsAdd').on('click', '.remove-treatment', function () {
        var counterToRemove = $(this).data('counter');
        $(this).closest('.input-group').remove();
    });

  
    $('form').on('submit', function (e) {
        
    });
});


//validation code 

$(document).ready(function () {
    $('form').validate({
        rules: {
            category_name: {
                required: true
            }
        },
        messages: {
            category_name: {
                required: "Category Name is required."
            }
        },
        errorClass: "error", // Added error class
        submitHandler: function (form) {
            // Your form submission logic goes here
            form.submit();
        }
    });
});



//datatable js  

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
              url: base_url + "/admin/md-shop-data-table",
             
          },
          columns: [

            {
                data: "id",
                name: "id",
            },

            {
                data: "product_category_name",
                name: "product_category_name",
            },

            {
                data: "subcategories",
                name: "subcategories",
            },

            {
                data: "created_at",
                name: "created_at",
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



  
  $(document).on("click", ".product-category-delete", function (){

    

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
            url: base_url + "/admin/product-category-delete",
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