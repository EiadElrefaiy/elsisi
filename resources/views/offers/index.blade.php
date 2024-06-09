@extends('layouts.app')

@section('content')
<button type="button" id="submitFormButton" class="btn btn-primary m-2 w-25 hide" data-table="offers"></button>

<div class="row">
 <div class="col-md-12">
   <div class="card">
     <div class="card-body">
       <div class="row">
       <div class="col-sm-7 col-6">
         <h3 class="card-title mb-2">العروض</h3>
       </div>
       <div class="col-sm-5 col-6" dir="ltr">

      <form>
         <div class="form-group row">
         <div class="col-12">
              <div class="input-group" dir="rtl">
                  <label for="from_date" class="col-sm-3 text-end control-label col-form-label">من</label>
                  <input id="from_date" type="text" class="form-control mydatepicker" placeholder="yyyy-mm-dd">
                  <div class="input-group-append">
                      <span class="input-group-text h-100"><i class="mdi mdi-calendar"></i></span>
                  </div>
              </div>
          </div>
          <div class="col-12 mt-1">
              <div class="input-group" dir="rtl">
                  <label for="to_date" class="col-sm-3 text-end control-label col-form-label">الى</label>
                  <input id="to_date" type="text" class="form-control mydatepicker" placeholder="yyyy-mm-dd">
                  <div class="input-group-append">
                      <span class="input-group-text h-100"><i class="mdi mdi-calendar"></i></span>
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
             id="searchInput"
             type="text"
             class="form-control"
             placeholder="بحث"
             aria-label="Recipient 's username"
             aria-describedby="basic-addon2"
           />
         </div>    
      </form>

       </div>
       <div class="col-6 mt-2" dir="ltr">
         <a href="{{ route('add', ['view' => 'offers.add']) }}" style="padding: 3px 15px;" type="button" class="btn btn-success text-white ">
           اضافة عرض &nbsp;<i class="mdi mdi-account-plus font-18"></i>
         </a>
       </div>

       <div class="col-12 mt-4">
        <div class="row">
         <div class="col-md-2 col-6" dir="rtl">
         <label for="checkbox1">عدد العروض : {{ $data->where('state', 0)->count() }}</label>
         </div>
         <div class="col-md-2 col-6" dir="rtl">
           <label for="checkbox1">العروض المتسلمة : {{ $data->where('state', 1)->count() }}</label>
         </div>
         <div class="col-md-2 col-6" dir="rtl">
           <label for="checkbox1">العروض قيد الشحن : {{ $data->where('state', 0)->count() }}</label>
         </div>
         <div class="col-md-2 col-6" dir="rtl">
           <label for="checkbox1">العروض المرفوضة : {{ $data->where('state', 2)->count() }}</label>
         </div>
        </div>
       </div>
       
       <div class="col-12 mt-4">
        <div class="row">
        <div class="col-md-2 col-6" dir="rtl">
              <input type="radio" id="radio_all" name="offer_status" value="all" checked>
              <label for="radio_all">كل العروض</label>
          </div>
          <div class="col-md-2 col-6" dir="rtl">
              <input type="radio" id="radio_received" name="offer_status" value="1">
              <label for="radio_received">العروض المتسلمة</label>
          </div>
          <div class="col-md-2 col-6" dir="rtl">
              <input type="radio" id="radio_shipping" name="offer_status" value="0">
              <label for="radio_shipping">العروض قيد الشحن</label>
          </div>
          <div class="col-md-2 col-6" dir="rtl">
              <input type="radio" id="radio_rejected" name="offer_status" value="2">
              <label for="radio_rejected">العروض المرفوضة</label>
          </div>
        </div>
       </div>

      </div>
     </div>
     <div class="table-responsive">
        <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">رقم العرض</th>
                <th scope="col">اسم العميل</th>
                <th scope="col">رقم التليفون</th>
                <th scope="col">المحافظة</th>
                <th scope="col">العنوان</th>
                <th scope="col">الملاحظات</th>
                <th scope="col">تاريخ العرض</th>
                <th scope="col">الحالة</th>
                <th scope="col">حالة الدفع</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="customtable">
            @foreach ($data as $item)
            <tr id="dataRow_{{ $item['id'] }}">
                <td>{{ $item->offer_num}}</td>
                <td>{{ $item->client->name }}</td>
                <td>{{ $item->client->phone }}</td>
                <td>{{ $item->client->state}}</td>
                <td>{{ $item->client->address }}</td>
                <td>{{ $item->notes == null ? '................' : $item->notes}}</td>
                <td class="date-cell">{{ $item->created_at->format('Y-m-d') }}</td>
                <td >
                    <span class="badge {{ $item->state == 0 ? 'bg-warning' : ($item->state == 1 ? 'bg-success' : ($item->state == 2 ? 'bg-danger' : '')) }}">
                    {{ $item->state == 0 ? 'قيد الشحن' : ($item->state == 1 ? 'تم التسليم' : ($item->state == 2 ? 'رفض الاستلام' : '')) }}
                    </span>
                </td>
                <td>
                    <span class="badge {{ $item->financial_state == 1 ? 'bg-success' : ($item->financial_state == 0 ? 'bg-warning' : ($item->financial_state == 2 ? 'bg-danger' : ($item->financial_state == 3 ? 'bg-warning' : '' ))) }}">
                    {{ $item->financial_state == 1 ? 'مدفوع' : ($item->financial_state == 0 ? 'عند الاستلام' : ($item->financial_state == 2 ? 'مرفوض' : ($item->financial_state == 3 ? 'متبقي' : '' ))) }}
                    </span>
                </td>
                <td>
                    <a style="color: #3e5569;" href="{{ route('offer_print', ['view' => 'offers.offer_print', 'table' => 'offers', 'id' => $item['id'] ]) }}">
                        <i class="mdi mdi-eye"></i>
                    </a>&nbsp;&nbsp; 
                    <a style="color: #3e5569;" href="javascript:void(0);" onclick="showConfirmDeleteModal('{{ $item['id'] }}', 'offers')">
                        <i class="mdi mdi-delete"></i>
                    </a> &nbsp;&nbsp; 
                    <a style="color: #3e5569;" href="{{ route('edit', ['view' => 'offers.edit', 'table' => 'offers' ,'id' => $item['id'] ]) }}">
                        <i class="mdi mdi-pencil"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            <tr>
                <td >اجمالي العروض</td>
                <td>{{$data->sum("total")}} ج</td>
                <td>اجمالي المرتجعات</td>

                         @php
                            $totalReturns = 0;
                        @endphp

                        @foreach($data as $item)
                            @php
                                $totalReturns += $item->returns->where("offer_id" , $item->id)->sum("price") * $item->returns->where("offer_id" , $item->id)->sum("quantity");
                            @endphp
                        @endforeach

                <td>{{$totalReturns}} ج</td>
                <td>الاجمالي</td>
                <td>{{$data->sum("total") - $totalReturns}} ج</td>
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
