
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
              url: base_url + "/admin/earner-details-data-table",
              data: function (d) {
                  d.status = $('#status').val();
                  d.id = $('input[name="id"]').val();
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