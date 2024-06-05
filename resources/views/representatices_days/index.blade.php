@extends('layouts.app')

@section('content')
<button type="button" id="submitFormButton" class="btn btn-primary m-2 w-25 hide" data-table="representatives"></button>
<div class="row">
 <div class="col-md-12">
  <div class="card">
     <div class="card-body">
       <div class="row">
       <div class="col-sm-12">
         <h3 class="card-title mb-2">يومية المناديب</h3>
       </div>
       <div class="col-6 mt-2">
         <div class="input-group">
           <div class="input-group-append">
             <span class="input-group-text" style="padding: 9.5px;" id="basic-addon2"
               ><i class=" fas fa-search"></i></span>
           </div>
           <input
             id="searchInput"
             type="text"
             class="form-control"
             placeholder="بحث"
             aria-label="Recipient 's username"
             aria-describedby="basic-addon2"
           />
         </div>    
       </div>
       <div class="col-6 mt-2" dir="ltr">
         <div class="input-group" dir="rtl">
             <input
               type="text"
               id="datePicker"
               class="form-control mydatepicker"
               placeholder="mm-dd-yyyy"
             />
             <div class="input-group-append">
               <span class="input-group-text h-100"
                 ><i class="mdi mdi-calendar"></i></span>
              </div>
            </div>
         </div>
      </div>
     </div>
     <div class="table-responsive">
       <table class="table">
         <thead class="thead-light">
           <tr>
             <th scope="col">المندوب</th>
             <th scope="col">الايرادات</th>
             <th scope="col">المصروفات</th>
             <th scope="col">الاجمالي</th>
             <th scope="col">التاريخ</th>
             <th scope="col"></th>
           </tr>
         </thead>
         <tbody class="customtable">
           @include('representatices_days.tableRows')
         </tbody>
       </table>
     </div>
   </div>
  </div>
 </div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@include('js.index')

<script>
    $(document).ready(function(){
        $('#searchInput').on('input', function() {
            var searchText = $(this).val().toLowerCase();
            $('.customtable tr').each(function() {
                var rowData = $(this).text().toLowerCase();
                if (rowData.indexOf(searchText) === -1) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });

        $('#datePicker').on('change', function() {
            var selectedDate = $(this).val();
            // Format the selected date to match the server's expected format (YYYY-MM-DD)
            var formattedDate = formatDate(selectedDate);
            // Hide all table rows
            $('.customtable tr').hide();
            // Show table rows with matching date
            $('.customtable tr').each(function() {
                var rowData = $(this).find('td:eq(4)').text(); // Assuming the date is in the 5th column
                if (rowData === formattedDate) {
                    $(this).show();
                }
            });
        });

        // Function to format date (MM/DD/YYYY to YYYY-MM-DD)
        function formatDate(date) {
            var parts = date.split('/');
            return parts[2] + '-' + parts[0] + '-' + parts[1];
        }
    });
</script>
@endsection
