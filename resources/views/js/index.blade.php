<script>
      // Function to show the confirm deletion modal
      function showConfirmDeleteModal(id, table) {
        $('#confirmDeleteButton').data('id', id); // Set data-id attribute on the confirm delete button
        $('#confirmDeleteButton').data('table', table); // Set data-table attribute on the confirm delete button
        $('#confirmDeleteModal').modal('show'); // Show the modal
    }

    $(document).ready(function() {
      // Function to handle deletion when confirm delete button is clicked
      $('#confirmDeleteButton').on('click', function() {
          var id = $(this).data('id');
          var table = $(this).data('table');
          var rowToDelete = $('#dataRow_' + id); // Find the row to delete using its ID
          console.log(id);
          console.log(table);
          $.ajax({
              type: 'POST',
              url: '{{ route('delete') }}',
              data: {
                  id: id,
                  table: table,
                  _token: '{{ csrf_token() }}'
              },
              success: function(response) {
                  showSuccessMessage(response.message);
                  // Hide the row after successful deletion
                  rowToDelete.hide(); // Hide the row
              },
              error: function(xhr, status, error) {
                  showErrorMessage('حدثت مشكلة أثناء الحذف. يرجى المحاولة مرة أخرى.');
                  console.error(xhr.responseText);
              }
          });
          $('#confirmDeleteModal').modal('hide'); // Hide the modal after deletion
      });

      // Function to show the success message modal
      function showSuccessMessage(message) {
          $('#successMessage').text(message);
          $('#successModal').modal('show');
      }

      // Function to show the error message modal
      function showErrorMessage(message) {
          $('#errorMessage').text(message);
          $('#errorModal').modal('show');
      }

});

</script>
