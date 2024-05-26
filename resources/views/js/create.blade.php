<script>
$(document).ready(function() {
    // Function to handle form submission
    function submitForm() {
        var formData = new FormData($('#Form')[0]); // Get form data
        
        // Get table name from the button's data attribute
        var tableName = $('#submitFormButton').data('table');
        var viewName = $('#submitFormButton').data('view');
        formData.append('table', tableName);

        // Check if file input exists
        if ($('#fileInput').length > 0) {
            var fileInput = $('#fileInput')[0];
            if (fileInput.files.length > 0) {
                formData.append('image', fileInput.files[0]); // Append the uploaded file
            }
        }

        // Get CSRF token value from the meta tag
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '{{ route("create") }}', // Your route to handle form submission
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken // Include CSRF token in the request headers
            },
            contentType: false,
            processData: false,
            success: function(response) {
                // Show success modal
                $('#successModal').modal('show');
                // Update link in success modal based on table and view parameters
                var table = tableName; // Example value, replace it with your actual value
                var view = viewName; // Example value, replace it with your actual value
                var route = "{{ route('index') }}?table=" + table + "&view=" + view;
                $('#okButton').attr('href', route);

            },
            error: function(xhr, status, error) {
                // Handle validation errors
                if (xhr.status === 422) {
                    // Unprocessable Entity
                    var errors = xhr.responseJSON.errors;
                    var errorMessages = '';
                    $.each(errors, function(field, messages) {
                        errorMessages += '<p>' + messages.join('<br>') + '</p>';
                    });
                    // Display errors in a modal or alert
                    $('#errorMessages').html(errorMessages).removeClass('hide').addClass('alert alert-danger');
                } else {
                    // Handle other errors
                    alert('An error occurred. Please try again.');
                }
            }
        });
    }

    // Submit form when the external button is clicked
    $('#submitFormButton').on('click', function() {
        submitForm();
    });

    // Handle click event for upload button
    $('#uploadButton').on('click', function() {
        $('#fileInput').click();
    });

    // Handle click event for OK button in success modal
    $('#okButton').on('click', function() {
        $('#successModal').modal('hide');
    });

    // Handle click event for close button in success modal
    $('.close').on('click', function() {
        $('#successModal').modal('hide');
        // You can add any redirection or additional actions here
    });
});
</script>
