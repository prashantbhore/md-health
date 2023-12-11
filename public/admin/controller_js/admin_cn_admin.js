
$(document).ready(function (){
    $("#adminForm").validate({
        rules: {
            name: "required",
            email: {
                required: true,
                email: true
            },
            password: "required",
            adminRole: "required"
        },
        messages: {
            name: "Please enter  name",
            email: {
                required: "Please enter  email",
                email: "Please enter a valid email address"
            },
            password: "Please enter  password",
            adminRole: "Please select a role"
        }
    });
});



$(function (){
    var table = $("#example").DataTable({
        processing: false,
        serverSide: true,
        paging: true,
        searching: true,
        destroy: true,
        clear: true,
        ajax: base_url + "/admin/admin-data-table",
        method:'get',
        columns: [
            {
                data: "email",
                name: "email",
            },

            {
                data: "name",
                name: "name",
            },

            {
                data: "userType",
                name: "userType",
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