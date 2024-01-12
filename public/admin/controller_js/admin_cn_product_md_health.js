
//Dynamic input  field js

    $(document).ready(function (){
       var counter = 1;

        function addInputField() {
            var newInput = '<div class="input-group mb-3">' +
                '<input type="text" name="treatments[]" class="form-control border-end-0 dynamic-input" placeholder="Treatment" aria-label="Dynamic Treatment" aria-describedby="addTreatment" />' +
                '<span class="input-group-text border-start-0 remove-treatment aa" data-counter="' + counter + '">-</span>' +
                '</div>';
            $('.treatmentsAdd').find('.input-group:first').before(newInput);
            counter++;
        }

        $('.addTreatment').on('click', function (){
            
            addInputField();
        });

        
        $('#sub_category').on('click', '.addTreatment', function () {
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

$(document).ready(function (){
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
              url: base_url + "/admin/md-health-data-table",
             
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

// Function to initialize the modal


$(".add-brand-btn").click(function(){

 $('#main_category_id').empty();

 $('.dynamic-treatments').hide();

 $('.static-treatments').show();

 $('#product_category_name').val('');

});




function editProductCategory(id){
    $.ajax({
        url: base_url + '/admin/product-category/' + id + '/edit',
        type: 'GET',
        success: function (data) {
            $('#addNewBrandModalBody').html('');
            $('#id').val('');
            $('#product_category_name').val('');
            $('.static-treatments').hide();
            $('.static-treatments').remove();
            $('.treatments-container').empty();
            $('#sub_category').empty();  
            $('#addNewBrandModalBody').html(data);
            $('#id').val(data.id);
            $('#product_category_name').val(data.product_category_name);

            if (data.product_subcategory_names && data.product_subcategory_names.length > 0) {
                data.product_subcategory_names.forEach(function (subcategoryName, index) {
                    let treatmentInputField;
                    if (index === data.product_subcategory_names.length - 1) {
                        treatmentInputField = `
                            <div class="input-group">
                                <input type="text" name="treatments[]" class="form-control border-end-0 dynamic-treatments" placeholder="Treatments" value="${subcategoryName}" aria-label="Treatments" aria-describedby="addTreatment" />
                                <span class="input-group-text border-start-0 addTreatment dynamic-treatments" id="addTreatment">+</span>
                            </div>`;
                    } else {
                        treatmentInputField = `<input type="text" name="treatments[]" class="form-control dynamic-treatments" placeholder="Treatments" value="${subcategoryName}" />`;
                    }
                    $('#sub_category').append(treatmentInputField);
                });
            }

            $('#addNewBrandModal').modal('show');
        },
        error: function (error) {
            console.error('Error fetching data:', error);
        }
    });
}


