<script>
          $(document).ready(function() {
            // Function to handle form submission
            function submitForm() {
                var formData = new FormData();
                var formElement = $('#Form')[0];

                // Iterate over the form elements
                for (var i = 0; i < formElement.elements.length; i++) {
                    var element = formElement.elements[i];

                    // Add only non-empty fields to the formData
                    if (element.name && element.value) {
                        formData.append(element.name, element.value);
                    }
                }

                for (var pair of formData.entries()) {
                    console.log(pair[0] + ': ' + pair[1]);
                }
               
                var tableName = $('#submitFormButton').data('table');
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

                        const offerTable = document.getElementById('offerTable');
                        if (offerTable) {
                            // Iterate through table rows and save each item
                            const tableRows = offerTable.querySelectorAll('tbody tr');
                            tableRows.forEach(row => {
                                const idCell = row.querySelector('.id');
                                const labelCell = row.querySelector('.label_name');
                                const priceCell = row.querySelector('.price');
                                const quantityCell = row.querySelector('.quantity');
                                const notesCell = row.querySelector('.note');
                                if (labelCell && priceCell) {

                                    const id = idCell.textContent;
                                    const label = labelCell.textContent;
                                    const price = priceCell.textContent;
                                    const quantity = quantityCell.textContent;
                                    const notes = notesCell.value;
                                    var offer_id = document.getElementById('id').value;

                                    const formData_items = new FormData();
                                    formData_items.append('table', 'offer_items');
                                    formData_items.append('product_id', id);
                                    formData_items.append('offer_id', offer_id);
                                    formData_items.append('price', price);
                                    formData_items.append('quantity', quantity);
                                    formData_items.append('notes', notes);


                                    $.ajax({
                                    url: '{{ route("create") }}', 
                                    type: 'POST',
                                    data: formData_items,
                                    headers: {
                                        'X-CSRF-TOKEN': csrfToken 
                                    },

                                    contentType: false,
                                    processData: false,

                                });
                            }     
                        });
                    }

                        const returnsTable = document.getElementById('offerReturnTable');
                        if (returnsTable) {
                            // Iterate through table rows and save each item
                            const tableRows = returnsTable.querySelectorAll('tbody tr');
                            tableRows.forEach(row => {
                                const idCell = row.querySelector('.id');
                                const labelCell = row.querySelector('.label_name');
                                const priceCell = row.querySelector('.price');
                                const quantityCell = row.querySelector('.quantity');
                                if (labelCell && priceCell) {

                                    const id = idCell.textContent;
                                    const label = labelCell.textContent;
                                    const price = priceCell.textContent;
                                    const quantity = quantityCell.textContent;
                                    var offer_id = document.getElementById('id').value;

                                    const formData_items = new FormData();
                                    formData_items.append('table', 'returns');
                                    formData_items.append('product_id', id);
                                    formData_items.append('offer_id', offer_id);
                                    formData_items.append('price', price);
                                    formData_items.append('quantity', quantity);

                                    $.ajax({
                                    url: '{{ route("create") }}', 
                                    type: 'POST',
                                    data: formData_items,
                                    headers: {
                                        'X-CSRF-TOKEN': csrfToken 
                                    },

                                    contentType: false,
                                    processData: false,

                                });
                            }     
                        });
                    }

                        const invoiceTable = document.getElementById('invoiceTable');
                        if (invoiceTable) {
                            // Iterate through table rows and save each item
                            const tableRows = invoiceTable.querySelectorAll('tbody tr');
                            tableRows.forEach(row => {
                                const idCell = row.querySelector('.id');
                                const labelCell = row.querySelector('.label_name');
                                const quantityCell = row.querySelector('.quantity');
                                const notesCell = row.querySelector('.note');

                                if (labelCell) {
                                    const id = idCell.textContent;
                                    const label = labelCell.textContent;
                                    const quantity = quantityCell.textContent;
                                    const notes = notesCell.value;
                                    var invoice_id = document.getElementById('id').value;

                                    const formData_items = new FormData();
                                    
                                    formData_items.append('table', 'invoice_items');
                                    formData_items.append('product_id', id);
                                    formData_items.append('invoice_id', invoice_id);
                                    formData_items.append('price', 0);
                                    formData_items.append('quantity', quantity);
                                    formData_items.append('notes', notes);


                                    $.ajax({
                                    url: '{{ route("create") }}', 
                                    type: 'POST',
                                    data: formData_items,
                                    headers: {
                                        'X-CSRF-TOKEN': csrfToken 
                                    },

                                    contentType: false,
                                    processData: false,

                                });
                            }     
                        });
                    }

                        
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
