@extends('layouts.app')

@section('content')


@include('management.form')

        <div id="errorMessages" class="alert alert-danger hide"></div>

        <button type="button" id="submitFormButton" class="btn btn-primary m-2 w-25">
          حفظ البيانات
        </button>

        <!-- Success Modal -->
        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                <div class="d-flex justify-content-between align-items-center w-100 p-3">
                    <h5 class="modal-title mb-0" id="confirmDeleteModalLabel">نجاح العملية</h5>
                    <button dir="ltr" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                    <div class="modal-body">
                        تم تعديل بيانات المشرف
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-primary" id="okButton">OK</a>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
          $(document).ready(function() {
            // Function to handle form submission
            function submitForm() {
                var formData = new FormData();
                var formElement = $('#adminForm')[0];

                // Iterate over the form elements
                for (var i = 0; i < formElement.elements.length; i++) {
                    var element = formElement.elements[i];

                    // Add only non-empty fields to the formData
                    if (element.name && element.value) {
                        formData.append(element.name, element.value);
                    }
                }

                formData.append('table', 'users');

                // Check if a file is uploaded
                var fileInput = $('#fileInput')[0];
                if (fileInput.files.length > 0) {
                    formData.append('image', fileInput.files[0]); // Append the uploaded file
                }

                // Get CSRF token value from the meta tag
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: '{{ route("update") }}', // Your route to handle form submission
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
                        console.log("work");
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
            // Handle click event for OK button in success modal
            $('.close').on('click', function() {
                $('#successModal').modal('hide');
                // You can add any redirection or additional actions here
            });
        });

        </script>
@endsection
