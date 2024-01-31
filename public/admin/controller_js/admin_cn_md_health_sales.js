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
              url: base_url + "/admin/md-health-sales-data-table",
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
                data: "created",
                name: "created",
                orderable: false,
            },

            {
                data: "customer",
                name: "customer",
                orderable: false,
            },

            {
                data: "product",
                name: "product",
                orderable: false,
            },

            {
                data: "price",
                name: "price",
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