@extends('layouts.app')

@section('content')
<button type="button" id="submitFormButton" class="btn btn-primary m-2 w-25 hide" data-table="delivery"></button>

<div class="row">
 <div class="col-md-12">
   <div class="card">
     <div class="card-body">
       <div class="row">
       <div class="col-sm-7 col-6">
         <h3 class="card-title mb-2">الشحن</h3>
       </div>
       <div class="col-sm-5 col-6" dir="ltr">
         <div class="form-group row">
             <div class="col-12">
             <div class="input-group" dir="rtl">
               <label
               for="lname"
               class="col-sm-3 text-end control-label col-form-label"
               >من</label>
               <input
                 type="text"
                 class="form-control mydatepicker"
                 placeholder="mm/dd/yyyy"
               />
               <div class="input-group-append">
                 <span class="input-group-text h-100"
                   ><i class="mdi mdi-calendar"></i></span>
                </div>
              </div>
           </div>
             <div class="col-12 mt-1">
               <div class="input-group" dir="rtl">
                 <label
               for="lname"
               class="col-sm-3 text-end control-label col-form-label"
               >الى</label>
               <input
                 type="text"
                 class="form-control mydatepicker"
                 placeholder="mm/dd/yyyy"
               />
               <div class="input-group-append">
                 <span class="input-group-text h-100"
                   ><i class="mdi mdi-calendar"></i></span>
                </div>
              </div>
           </div>
         </div> 
     </div>
     <div class="col-6 mt-2">
         <div class="input-group">
           <div class="input-group-append">
             <span class="input-group-text" style="padding: 9.5px;" id="basic-addon2"
               ><i class=" fas fa-search"></i></span>
           </div>
           <input
             type="text"
             class="form-control"
             placeholder="بحث"
             aria-label="Recipient 's username"
             aria-describedby="basic-addon2"
           />
         </div>    

       </div>
       <div class="col-6 mt-2" dir="ltr">
         <a href="{{ route('add', ['view' => 'delivery.add']) }}" style="padding: 3px 15px;" type="button" class="btn btn-success text-white ">
           اضافة شحن &nbsp;<i class="mdi mdi-account-plus font-18"></i>
         </a>
       </div>
       
       <div class="col-6 mt-2" dir="rtl">
         <a onclick="downloadTableAsExcel()" style="padding: 3px 15px;" type="button" class="btn btn-info text-white ">
           تنزيل اكسل &nbsp;<i class="mdi mdi-download font-18"></i>
         </a>
       </div>

       
      </div>
     </div>
     <div class="table-responsive">
       <table class="table">
         <thead class="thead-light">
           <tr>
             <th scope="col">رقم العرض</th>
             <th scope="col">اسم العرض</th>
             <th scope="col">مندوب التوصيل</th>
             <th scope="col">اسم العميل</th>
             <th scope="col">رقم التليفون</th>
             <th scope="col">المحافظة</th>
             <th scope="col">تاريخ التسليم</th>
             <th scope="col">خط السير</th>
             <th scope="col">سعر العرض</th>
             <th scope="col">مصاريف الشحن</th>
             <th scope="col">الاجمالي</th>
             <th scope="col">الحالة</th>
             <th scope="col"></th>
             <th scope="col"></th>
           </tr>
         </thead>
         <tbody class="customtable">
                                    @php
                                        $totalAmount = 0;
                                        $from_date = request('from_date');
                                        $to_date = request('to_date');
                                    @endphp
                                    @foreach ($data as $item)
                                        @php
                                            $itemDate = $item->created_at->format('Y-m-d');
                                            $showItem = true;

                                            if ($from_date && $to_date) {
                                                $showItem = ($itemDate >= $from_date && $itemDate <= $to_date);
                                            }

                                            if ($showItem) {
                                                $totalAmount += $item->offer->total + $item->price;
                                            }
                                        @endphp

                                        @if ($showItem)
                                            <tr id="dataRow_{{ $item->id }}">
                                                <td>{{ $item->offer->offer_num }}</td>
                                                <td>{{ $item->offer->name }}</td>
                                                <td>{{ $item->representative->name }}</td>
                                                <td>{{ $item->offer->client->name }}</td>
                                                <td>{{ $item->offer->client->phone }}</td>
                                                <td>{{ $item->offer->client->state }}</td>
                                                <td>{{ $itemDate }}</td>
                                                <td>{{ $item->line }}</td>
                                                <td>{{ $item->offer->total }} ج</td>
                                                <td>{{ $item->price }} ج</td>
                                                <td>{{ $item->offer->total + $item->price }} ج</td>
                                                <td>
                                                    <span class="badge {{ $item->offer->state == 0 ? 'bg-warning' : ($item->offer->state == 1 ? 'bg-success' : ($item->offer->state == 2 ? 'bg-danger' : '')) }}">
                                                    {{ $item->offer->state == 0 ? 'قيد الشحن' : ($item->offer->state == 1 ? 'تم التسليم' : ($item->offer->state == 2 ? 'رفض الاستلام' : '')) }}
                                                    </span>
                                                </td>
                                                <td>
                                                <a style="color: #3e5569;" href="{{ route('offer_print', ['view' => 'offers.offer_print', 'table' => 'offers', 'id' => $item->offer->id ]) }}"><i class="mdi mdi-eye"></i></a>
                                                  &nbsp;&nbsp;<a style="color: #3e5569;" href="{{ route('edit', ['view' => 'offers.edit', 'table' => 'offers' ,'id' => $item->offer->id ]) }}"><i class="mdi mdi-pencil"></i></a>
                                                </td>
                                                <td>

                                                  <a style="color: #3e5569;" href="{{ route('edit', ['view' => 'delivery.edit' , 'table' => 'delivery' ,'id' => $item->id ]) }}">
                                                  <i class="mdi mdi-pencil"></i>
                                                  </a>

                                                  &nbsp;&nbsp;
                                                  
                                                  <a style="color: #3e5569;" href="javascript:void(0);" onclick="showConfirmDeleteModal('{{ $item['id'] }}', 'delivery')">
                                                    <i class="mdi mdi-delete"></i>
                                                   </a>

                                                </td>
                                            </tr>
                                        @endif
                                      @endforeach

                                    <tr>
                                      <td colspan="13">الاجمالي</td>
                                      
                                      <td>{{ $totalAmount }} ج</td>
                                    </tr>

         </tbody>
       </table>
     </div>
   </div>
  </div>
 </div>



@include('modals.confirmDelete')

@include('modals.successDelete')


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

     @include('js.index')


        <script>
        // Function to handle static search
        function search() {
        var query = $('#searchInput').val().toLowerCase();
        var fromDate = $('#from_date').val();
        var toDate = $('#to_date').val();
        var rows = $('.customtable tr');
        var hasResults = false;

        // Convert from_date and to_date to Date objects
        var fromDateObj = fromDate ? new Date(fromDate) : null;
        var toDateObj = toDate ? new Date(toDate) : null;

        // Ensure dates are in the correct format (yyyy-mm-dd)
        if (fromDateObj) fromDateObj.setHours(0, 0, 0, 0);
        if (toDateObj) toDateObj.setHours(23, 59, 59, 999);

        // Remove any existing "No results found" row
        $('.no-results').remove();

        rows.each(function() {
            var row = $(this);
            var match = false;
            var dateMatch = true;

            // Check each cell in the row for the query
            row.find('td').each(function() {
                var cell = $(this);
                if (cell.text().toLowerCase().indexOf(query) !== -1) {
                    match = true;
                    return false; // Exit each() loop once a match is found
                }
            });

            // Check the date range if from_date and to_date are not empty
            if (fromDateObj || toDateObj) {
                var dateCell = row.find('td.date-cell'); // Assuming the date is in a cell with class 'date-cell'
                if (dateCell.length) {
                    var rowDate = new Date(dateCell.text());
                    rowDate.setHours(12, 0, 0, 0); // Adjust time to noon to avoid timezone issues

                    if (fromDateObj && rowDate < fromDateObj) {
                        dateMatch = false;
                    }
                    if (toDateObj && rowDate > toDateObj) {
                        dateMatch = false;
                    }
                }
            }

            // Show or hide the row based on match and dateMatch status
            if (match && dateMatch) {
                row.show();
                hasResults = true;
            } else {
                row.hide();
            }
        });

        // If no results, show the 'No results found' row
        if (!hasResults) {
            $('.customtable').append('<tr class="no-results"><td class="text-center" colspan="10">لا توجد نتائج</td></tr>');
        }
    }

    // Attach the search function to the search input and date pickers
    $('#searchInput').on('input', search);
    $('#from_date, #to_date').on('change', search);

        // Trigger search on button click
        $('#submitFormButton').on('click', function(e) {
            search();
        });



document.addEventListener('DOMContentLoaded', function() {
    var radios = document.querySelectorAll('input[name="offer_status"]');
    var fromDateInput = document.getElementById('from_date');
    var toDateInput = document.getElementById('to_date');

    function search() {
        var query = document.getElementById('searchInput').value.toLowerCase();
        var fromDate = fromDateInput.value;
        var toDate = toDateInput.value;
        var selectedStatus = document.querySelector('input[name="offer_status"]:checked').value;
        var rows = document.querySelectorAll('.customtable tr');
        var hasResults = false;

        // Convert from_date and to_date to Date objects
        var fromDateObj = fromDate ? new Date(fromDate) : null;
        var toDateObj = toDate ? new Date(toDate) : null;

        // Ensure dates are in the correct format (yyyy-mm-dd)
        if (fromDateObj) fromDateObj.setHours(0, 0, 0, 0);
        if (toDateObj) toDateObj.setHours(23, 59, 59, 999);

        // Remove any existing "No results found" row
        var noResultsRow = document.querySelector('.no-results');
        if (noResultsRow) {
            noResultsRow.remove();
        }

        rows.forEach(function(row) {
            var match = false;
            var dateMatch = true;
            var statusMatch = selectedStatus === 'all';

            // Check each cell in the row for the query
            row.querySelectorAll('td').forEach(function(cell) {
                if (cell.textContent.toLowerCase().indexOf(query) !== -1) {
                    match = true;
                }
            });

            // Check the date range if from_date and to_date are not empty
            if (fromDateObj || toDateObj) {
                var dateCell = row.querySelector('.date-cell');
                if (dateCell) {
                    var rowDate = new Date(dateCell.textContent);
                    rowDate.setHours(12, 0, 0, 0); // Adjust time to noon to avoid timezone issues

                    if (fromDateObj && rowDate < fromDateObj) {
                        dateMatch = false;
                    }
                    if (toDateObj && rowDate > toDateObj) {
                        dateMatch = false;
                    }
                }
            }

            // Check the offer status if not "all"
            if (selectedStatus !== 'all') {
                var statusCell = row.querySelector('span.badge');
                if (statusCell) {
                    statusMatch = statusCell.textContent.trim() === getStatusText(selectedStatus);
                }
            }

            // Show or hide the row based on match, dateMatch, and statusMatch
            if (match && dateMatch && statusMatch) {
                row.style.display = '';
                hasResults = true;
            } else {
                row.style.display = 'none';
            }
        });

        // If no results, show the 'No results found' row
        if (!hasResults) {
            var table = document.querySelector('.customtable');
            noResultsRow = document.createElement('tr');
            noResultsRow.classList.add('no-results');
            noResultsRow.innerHTML = '<td class="text-center" colspan="10">لا توجد نتائج</td>';
            table.appendChild(noResultsRow);
        }
    }

    function getStatusText(status) {
        switch (status) {
            case '0':
                return 'قيد الشحن';
            case '1':
                return 'تم التسليم';
            case '2':
                return 'رفض الاستلام';
            default:
                return '';
        }
    }

    // Attach the search function to the search input, date pickers, and radio buttons
    document.getElementById('searchInput').addEventListener('input', search);
    fromDateInput.addEventListener('change', search);
    toDateInput.addEventListener('change', search);
    radios.forEach(function(radio) {
        radio.addEventListener('change', search);
    });
});
       
    </script>
     
 @endsection
