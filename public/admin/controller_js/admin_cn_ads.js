$(document).ready(function() {
    $("#ads-form").validate({
        rules: {
            page_name: {
                required: true,
            },
            date: {
                required: true,
            },
            url: {
                required: true,
            },
            ads_image: {
                required: true,
            }
        },
        messages: {
            page_name: {
                required: "Please choose a page.",
            },
            date: {
                required: "Please enter a date.",
            },
            url: {
                required: "Please enter an URL.",
            },
            ads_image: {
                required: "Please upload an image.",
            }
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

    // Function to preview image
    function previewImage(input) {
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }
    }
});

