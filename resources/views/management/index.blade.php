@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="card-title mb-2">الادارة</h3>
                    </div>
                    <div class="col-6 mt-2">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text" style="padding: 9.5px;" id="basic-addon2"><i class=" fas fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="بحث" aria-label="Recipient 's username" aria-describedby="basic-addon2" />
                        </div>
                    </div>
                    <div class="col-6 mt-2" dir="ltr">
                        <a href="{{ route('add', ['view' => 'management.add']) }}" style="padding: 3px 15px;" type="button" class="btn btn-success text-white ">
                            اضافة مشرف &nbsp;<i class="mdi mdi-account-plus font-18"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">الصورة</th>
                            <th scope="col">الاسم</th>
                            <th scope="col">رقم التليفون</th>
                            <th scope="col">المنصب</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="customtable">
                        @foreach ($data as $item)
                        <tr id="dataRow_{{ $item['id'] }}">
                            <td>
                                @if(isset($item['image']) && $item['image'])
                                <img src="{{ Storage::url('public/' . $item['image']) }}" alt="user" width="70" height="70" class="rounded-circle" />
                                @else
                                <img src="{{ URL::asset('assets/images/businessman.png') }}" alt="default user" width="70" height="70" class="rounded-circle" />
                                @endif
                            </td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['phone'] }}</td>
                            <td>{{ $item['position'] == 1 ? 'ادمن' : 'مشرف'}}</td>
                            <td>
                                <a style="color: #3e5569;" href="{{ route('edit', ['view' => 'management.edit' , 'table' => 'users' , 'id' => $item['id'] ]) }}">
                                    <i class="mdi mdi-grease-pencil"></i>
                                </a>&nbsp;&nbsp;
                                <a style="color: #3e5569;" href="javascript:void(0);" onclick="showConfirmDeleteModal('{{ $item['id'] }}', 'users')">
                                    <i class="mdi mdi-delete"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Confirm deletion modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

    <div class="d-flex justify-content-between align-items-center w-100 p-3">
        <h5 class="modal-title mb-0" id="confirmDeleteModalLabel">تأكيد الحذف</h5>
        <button dir="ltr" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
            
            <div class="modal-body">
                <p>هل أنت متأكد أنك تريد حذف هذا السجل؟</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteButton">تأكيد الحذف</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

        <div class="d-flex justify-content-between align-items-center w-100 p-3">
          <h5 class="modal-title mb-0" id="confirmDeleteModalLabel">تأكيد الحذف</h5>
          <button dir="ltr" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
             
            <div class="modal-body">
                <p id="successMessage"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

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

@endsection
