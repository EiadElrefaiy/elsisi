@extends('layouts.app')

@section('content')

<button type="button" id="submitFormButton" class="btn btn-primary m-2 w-25 hide" data-table="invoices"></button>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-7 col-6">
            <h3 class="card-title mb-2">الفواتير</h3>
          </div>
          <div class="col-sm-5 col-6" dir="ltr">
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
                <span class="input-group-text" style="padding: 9.5px;" id="basic-addon2"><i class="fas fa-search"></i></span>
              </div>
              <input id="searchInput" type="text" class="form-control" placeholder="بحث" aria-label="Recipient's username" aria-describedby="basic-addon2" />
            </div>
          </div>
          <div class="col-6 mt-2" dir="ltr">
            <a href="{{ route('add', ['view' => 'invoices.add']) }}" style="padding: 3px 15px;" type="button" class="btn btn-success text-white">
              اضافة فاتورة &nbsp;<i class="mdi mdi-account-plus font-18"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">رقم الفاتورة</th>
              <th scope="col">اسم المورد</th>
              <th scope="col">رقم التليفون</th>
              <th scope="col">العنوان</th>
              <th scope="col">الاجمالي</th>
              <th scope="col">المدفوع</th>
              <th scope="col">المتبقي</th>
              <th scope="col">تاريخ العرض</th>
              <th scope="col">الحالة</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody class="customtable">
            @foreach ($data as $item)
            <tr id="dataRow_{{ $item['id'] }}">
              <td>{{ $item->invoice_num}}</td>
              <td>{{ $item->supplier ?  $item->supplier->name : 'لا يوجد' }}</td>
              <td>{{$item->supplier ?  $item->supplier->phone : 'لا يوجد' }}</td>
              <td>{{$item->supplier ?  $item->supplier->address : 'لا يوجد' }}</td>
              <td>{{ $item->total }}</td>
              <td>{{ $item->payed }}</td>
              <td>{{ $item->total - $item->payed}}</td>
              <td class="date-cell">{{ $item->created_at->format('Y-m-d') }}</td>
              <td>
                <span class="badge {{ $item->total - $item->payed == 0 ? 'bg-success' : 'bg-warning' }}">
                {{ $item->total - $item->payed == 0 ? 'خالص' : 'متبقي له' }}
                </span>
              </td>
              <td>
                <a style="color: #3e5569;" href="{{ route('edit', ['view' => 'invoices.edit', 'table' => 'invoices' , 'id' => $item['id'] ]) }}"><i class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; 
                <a style="color: #3e5569;" href="javascript:void(0);" onclick="showConfirmDeleteModal('{{ $item['id'] }}', 'invoices')"><i class="mdi mdi-delete"></i></a>
              </td>
            </tr>
            @endforeach
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
document.addEventListener('DOMContentLoaded', function() {
  var radios = document.querySelectorAll('input[name="invoice_status"]');
  var fromDateInput = document.getElementById('from_date');
  var toDateInput = document.getElementById('to_date');

  function search() {
    var query = document.getElementById('searchInput').value.toLowerCase();
    var fromDate = fromDateInput.value;
    var toDate = toDateInput.value;
    var rows = document.querySelectorAll('.customtable tr');
    var hasResults = false;

    var fromDateObj = fromDate ? new Date(fromDate) : null;
    var toDateObj = toDate ? new Date(toDate) : null;

    if (fromDateObj) fromDateObj.setHours(0, 0, 0, 0);
    if (toDateObj) toDateObj.setHours(23, 59, 59, 999);

    var noResultsRow = document.querySelector('.no-results');
    if (noResultsRow) {
      noResultsRow.remove();
    }

    rows.forEach(function(row) {
      var match = false;
      var dateMatch = true;

      row.querySelectorAll('td').forEach(function(cell) {
        if (cell.textContent.toLowerCase().indexOf(query) !== -1) {
          match = true;
        }
      });

      if (fromDateObj || toDateObj) {
        var dateCell = row.querySelector('.date-cell');
        if (dateCell) {
          var rowDate = new Date(dateCell.textContent);
          rowDate.setHours(12, 0, 0, 0);

          if (fromDateObj && rowDate < fromDateObj) {
            dateMatch = false;
          }
          if (toDateObj && rowDate > toDateObj) {
            dateMatch = false;
          }
        }
      }

      if (match && dateMatch) {
        row.style.display = '';
        hasResults = true;
      } else {
        row.style.display = 'none';
      }
    });

    if (!hasResults) {
      var table = document.querySelector('.customtable');
      noResultsRow = document.createElement('tr');
      noResultsRow.classList.add('no-results');
      noResultsRow.innerHTML = '<td class="text-center" colspan="10">لا توجد نتائج</td>';
      table.appendChild(noResultsRow);
    }
  }

  document.getElementById('searchInput').addEventListener('input', search);
  fromDateInput.addEventListener('change', search);
  toDateInput.addEventListener('change', search);
});
</script>

@endsection
