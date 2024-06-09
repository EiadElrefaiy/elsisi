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
                  <label for="lname" class="col-sm-3 text-end control-label col-form-label">من</label>
                  <input type="text" id="fromDate" class="form-control mydatepicker" value="{{date('m/d/Y')}}" placeholder="mm/dd/yyyy" />
                  <div class="input-group-append">
                    <span class="input-group-text h-100"><i class="mdi mdi-calendar"></i></span>
                  </div>
                </div>
              </div>
              <div class="col-12 mt-1">
                <div class="input-group" dir="rtl">
                  <label for="lname" class="col-sm-3 text-end control-label col-form-label">الى</label>
                  <input type="text" id="toDate" class="form-control mydatepicker" value="{{date('m/d/Y')}}" placeholder="mm/dd/yyyy" />
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
                <span class="input-group-text" style="padding: 9.5px;" id="basic-addon2"><i class="fas fa-search"></i></span>
              </div>
              <input id="searchInput" type="text" class="form-control" placeholder="بحث" aria-label="Recipient 's username" aria-describedby="basic-addon2" />
            </div>
          </div>
          <div class="col-6 mt-2" dir="ltr">
            <a href="{{ route('add', ['view' => 'delivery.add']) }}" style="padding: 3px 15px;" type="button" class="btn btn-success text-white">اضافة شحن &nbsp;<i class="mdi mdi-account-plus font-18"></i></a>
          </div>
          <div class="col-6 mt-2" dir="rtl">
            <a dir="ltr" id="searchButton" href="javascript:void(0);" style="padding: 3px 15px;" type="button" class="btn btn-info text-white">بحث &nbsp;<i class="fas fa-search font-12"></i></a>
          </div>

          <div class="col-6 mt-2" dir="ltr">
            <a onclick="downloadTableAsExcel()" style="padding: 3px 15px;" type="button" class="btn btn-info text-white">تنزيل اكسل &nbsp;<i class="mdi mdi-download font-18"></i></a>
          </div>

        </div>
      </div>
      <div class="table-responsive">
        <table id="deliveryTable" class="table">
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
              <th scope="col">العرض</th>
              <th scope="col">الشحن</th>
            </tr>
          </thead>
          <tbody class="customtable">
          @php
                                        $totalAmount = 0;
                                        $from_date = request('from_date');
                                        $to_date = request('to_date');
                                    @endphp
                                    @foreach ( Auth::guard('representative')->check() ? $data->where('representative_id' , Auth::guard('representative')->user()->id) : $data as $item)
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

                          </tbody>
                          
                        <tfoot>
                          <tr>
                            <td colspan="12">الاجمالي</td>
                            <td colspan="2" id="totalAmountCell">{{ $totalAmount }} ج</td>
                          </tr>
                        </tfoot>

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
    // Function to filter table rows based on search input and date range, and update total
    function filterTableRows() {
        var query = $('#searchInput').val().trim().toLowerCase();
        var fromDateValue = $('#fromDate').val().trim();
        var toDateValue = $('#toDate').val().trim();
        var fromDate = fromDateValue ? new Date(fromDateValue) : null;
        var toDate = toDateValue ? new Date(toDateValue) : null;
        var totalAmount = 0;

        $('.customtable tr').each(function() {
            var $row = $(this);
            var rowText = $row.text().toLowerCase();
            var showRow = true;

            // Filter by search query
            if (query && rowText.indexOf(query) === -1) {
                showRow = false;
            }

            // Filter by date range
            if (showRow && (fromDate || toDate)) {
                var deliveryDateCell = $row.find('td').eq(6).text().trim();
                var deliveryDate = deliveryDateCell ? new Date(deliveryDateCell) : null;

                if (deliveryDate) {
                    if (fromDate && deliveryDate < fromDate) {
                        showRow = false;
                    }
                    if (toDate && deliveryDate > toDate) {
                        showRow = false;
                    }
                } else {
                    showRow = false; // If there is no delivery date, hide the row
                }
            }

            // Calculate total if the row is shown
            if (showRow) {
                var offerPrice = parseFloat($row.find('td').eq(8).text().replace(' ج', '').trim()) || 0;
                var shippingCost = parseFloat($row.find('td').eq(9).text().replace(' ج', '').trim()) || 0;
                totalAmount += (offerPrice + shippingCost);
                $row.show();
            } else {
                $row.hide();
            }
        });

        // Update the total amount in the table footer
        $('#totalAmountCell').text(totalAmount.toFixed(2) + ' ج');
    }

    // Trigger filter function when the search button is clicked
    $('#searchButton').on('click', function(e) {
        filterTableRows();
    });

</script>

<script>
function downloadTableAsExcel() {
    // Create a new workbook
    var wb = XLSX.utils.book_new();

    // Get table element
    var table = document.getElementById('deliveryTable');

    // Convert table to worksheet
    var ws = XLSX.utils.table_to_sheet(table);

    // Set column widths to make each cell take up the width of three standard cells
    var colWidths = [];
    for (var i = 0; i < table.rows[0].cells.length; i++) {
        colWidths.push({ wch: 30 }); // wch is "width characters", 30 chars is roughly the width of 3 standard cells
    }
    ws['!cols'] = colWidths;

    // Append worksheet to workbook
    XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

    // Generate and download the Excel file
    XLSX.writeFile(wb, 'delivery_data.xlsx');
}
</script>


 @endsection
