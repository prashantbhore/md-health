
    $(document).ready(function () {
        $("#yourFormId").validate({
            rules: {
                country: {
                    required: true,
                },
                city: {
                    required: true,
                    lettersOnly: true, 
                },
            },
            messages: {
                country: {
                    required: "Please select a country",
                },
                city: {
                    required: "Please enter a city name",
                    lettersOnly: "Please enter letters only",
                },
            },
            errorElement: "span",
            errorClass: "text-danger",
        });

        $.validator.addMethod(
            "lettersOnly",
            function (value, element) {
                return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
            },
            "Please enter letters only"
        );
    });





$(function (){
    

    var table = $("#example").DataTable({
        processing: true,
        serverSide: true,
        paging: false,
        searching: false,
        ajax: base_url + "/admin/city-data-table",
        method:'get',
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
            },

            {
                data: "city_name",
                name: "city_name",
            },

            {
                data: "country_name",
                name: "country_name",
            },
          
        ],
    });

    function reload_table() {
        table.DataTable().ajax.reload(null, false);
    }
});
