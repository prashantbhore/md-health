
//Dynamic input  field js

    $(document).ready(function () {
        var counter = 1;

        function addInputField() {
            var newInput = '<div class="input-group mb-3">' +
                '<input type="text" name="treatments[]" class="form-control border-end-0 dynamic-input" placeholder="Treatment" aria-label="Dynamic Treatment" aria-describedby="addTreatment" />' +
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
