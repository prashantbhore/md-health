//alert('Hello');

$(function (){
    var table = $("#pending_vendors_list").DataTable({
        processing: true,
        serverSide: true,
        searchable: true,
        deferRender: true,
        pagingType: 'numbers',
        destroy: true,
        clear: true,
          ajax: {
              url: base_url + "/admin/pending-vendors-data-table",
              data: function (d) {
                  d.vendor_type = $('#vendor_type').val();
              },
          },
          columns: [

              {
                  data: "DT_RowIndex",
                  name: "DT_RowIndex",
                  orderable: false,
                
              },
             
              {
                  data: "reg_date",
                  name: "reg_date",
                  orderable: false,
               
              },

              {
                  data: "vendor_id",
                  name: "vendor_id",
                  orderable: false,
              
              },

              {
                  data: "vendor_type",
                  name: "vendor_type",
                  orderable: false,
                  
              },
              {
                  data: "company_name",
                  name: "company_name",
                  orderable: false,
                
              },
              {
                  data: "city",
                  name: "city",
                  orderable: false,
                 
              },

              {
                data: "contact_no",
                name: "contact_no",
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
  
      $("#vendor_type").change(function (){
          table.draw();
      });
  });








  $(function (){
    var table = $("#approved_vendor_list").DataTable({
        processing: true,
        serverSide: true,
        searchable: true,
        deferRender: true,
        pagingType: 'numbers',
        destroy: true,
        clear: true,
          ajax: {
              url: base_url + "/admin/approved-vendors-data-table",
              data: function (d) {
                  d.vendor_type = $('#vendor_type').val();
              },
          },
          columns: [

              {
                  data: "DT_RowIndex",
                  name: "DT_RowIndex",
                  orderable: false,
                
              },
             
              {
                  data: "reg_date",
                  name: "reg_date",
                  orderable: false,
               
              },

              {
                  data: "vendor_id",
                  name: "vendor_id",
                  orderable: false,
              
              },

              {
                  data: "vendor_type",
                  name: "vendor_type",
                  orderable: false,
                  
              },
              {
                  data: "company_name",
                  name: "company_name",
                  orderable: false,
                
              },

              {
                data: "membership_type",
                name: "membership_type",
                orderable: false,
              
              },
              {
                  data: "city",
                  name: "city",
                  orderable: false,
                 
              },

              {
                data: "contact_no",
                name: "contact_no",
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
  
      $("#vendor_type").change(function (){
          table.draw();
      });
  });




  $(function (){
    var table = $("#rejected_vendor_list").DataTable({
        processing: true,
        serverSide: true,
        searchable: true,
        deferRender: true,
        pagingType: 'numbers',
        destroy: true,
        clear: true,
          ajax: {
              url: base_url + "/admin/rejected-vendors-data-table",
              data: function (d) {
                  d.vendor_type = $('#vendor_type').val();
              },
          },
          columns: [

              {
                  data: "DT_RowIndex",
                  name: "DT_RowIndex",
                  orderable: false,
                
              },
             
              {
                  data: "reg_date",
                  name: "reg_date",
                  orderable: false,
               
              },

              {
                  data: "vendor_id",
                  name: "vendor_id",
                  orderable: false,
              
              },

              {
                  data: "vendor_type",
                  name: "vendor_type",
                  orderable: false,
                  
              },
              {
                  data: "company_name",
                  name: "company_name",
                  orderable: false,
                
              },
              {
                  data: "city",
                  name: "city",
                  orderable: false,
                 
              },

              {
                data: "contact_no",
                name: "contact_no",
                orderable: false,
              
              },

              
              {
                data: "rejected_date",
                name: "rejected_date",
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
  
      $("#vendor_type").change(function (){
          table.draw();
      });
  });






  $(document).on("click", ".vendor-delete", function (){

    var id = $(this).data("id");

   
    var vendor_type = $(this).data("table");

    
    var flash = $(this).data("flash");


    var actionDiv = $(this);

   

    var base_url = $("#base_url").val();
    if (confirm("Do you really want to delete this record ?")){
        $.ajax({
            type: "get",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { id: id, vendor_type: vendor_type, flash: flash },
            url: base_url + "/admin/vendor-delete",
            beforeSend: function () {
                actionDiv
                    .html(
                        "<i class='fa fa-spin fa-spinner' style='color: #000000 !important;'></i>"
                    )
                    .show();
            },
            success: function (data) {
              
                 var oTable = $("#pending_vendor_list").dataTable();
                
                oTable.fnDraw(false);
                success_toast("Success", data.message);
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    }
});