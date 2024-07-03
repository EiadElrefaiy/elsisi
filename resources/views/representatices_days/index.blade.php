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
       <div class="col-md-6 mt-2">
         <div class="input-group">
           <div class="input-group-append">
             <span class="input-group-text" style="padding: 9.5px;" id="basic-addon2"
               ><i class="fas fa-search"></i></span>
           </div>
           <input
             id="searchInput"
             type="text"
             class="form-control"
             placeholder="بحث"
             aria-label="Recipient's username"
             aria-describedby="basic-addon2"
           />
         </div>    
       </div>
       <div class="col-md-3 mt-2" dir="rtl">
         <label for="startDatePicker" class="form-label">من</label>
         <div class="input-group" dir="rtl">
             <input
               type="text"
               id="startDatePicker"
               class="form-control mydatepicker"
               placeholder="mm-dd-yyyy"
             />
             <div class="input-group-append">
               <span class="input-group-text h-100"
                 ><i class="mdi mdi-calendar"></i></span>
              </div>
            </div>
         </div>
       <div class="col-md-3 mt-2" dir="rtl">
         <label for="endDatePicker" class="form-label">الى</label>
         <div class="input-group" dir="rtl">
             <input
               type="text"
               id="endDatePicker"
               class="form-control mydatepicker"
               placeholder="mm-dd-yyyy"
             />
             <div class="input-group-append">
               <span class="input-group-text h-100"
                 ><i class="mdi mdi-calendar"></i></span>
              </div>
            </div>
         </div>
       <div class="col-12 mt-2">
         <button id="searchButton" class="btn btn-primary">بحث</button>
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
        $('#searchButton').on('click', function() {
            var searchText = $('#searchInput').val().toLowerCase();
            var startDate = $('#startDatePicker').val();
            var endDate = $('#endDatePicker').val();
            if (startDate && endDate) {
                // Format the dates to match the server's expected format (YYYY-MM-DD)
                var formattedStartDate = formatDate(startDate);
                var formattedEndDate = formatDate(endDate);

                // Hide all table rows
                $('.customtable tr').hide();

                // Show table rows that match the search text and dates within the range
                $('.customtable tr').each(function() {
                    var rowDate = $(this).find('td:eq(4)').text(); // Assuming the date is in the 5th column
                    var rowData = $(this).text().toLowerCase();
                    if (rowDate >= formattedStartDate && rowDate <= formattedEndDate && rowData.indexOf(searchText) !== -1) {
                        $(this).show();
                    }
                });
            }
        });

        // Function to format date (MM/DD/YYYY to YYYY-MM-DD)
        function formatDate(date) {
            var parts = date.split('/');
            return parts[2] + '-' + parts[0] + '-' + parts[1];
        }
    });
</script>
@endsection
