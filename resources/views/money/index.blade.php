@extends('layouts.app')

@section('content')
<button type="button" id="submitFormButton" class="btn btn-primary m-2 w-25 hide" data-table="products"></button>
<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-sm-7 col-6">
              <h3 class="card-title m-2">الحسابات</h3>
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
                      id="from_date"
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
                      id="to_date"
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

          <div class="col-12" dir="rtl">
              <a id="searchButton" href="javascript:void(0);" style="padding: 3px 15px;" type="button" class="btn btn-info text-white">
                  بحث
              </a>
           </div>

           </div>
          </div>
        <div class="row">
          <div class="col-md-6">
                <div class="row">
                <div class="col-6 mt-1">
                    <h3 class="card-title" style="margin-right: 10px;">الايرادات</h3>
                </div>
                <div class="col-6 mb-2" dir="ltr">
                    <a href="{{ route('add', ['view' => 'money.revenues.add']) }}" style="padding: 3px 15px;" type="button" class="btn btn-success text-white ">
                    اضافة ايراد &nbsp;<i class="mdi mdi-account-plus font-18"></i>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">الوصف</th>
                      <th scope="col">المبلغ</th>
                      <th scope="col">التاريخ</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody class="customtable">
                  @php
                  $total = 0;
                  @endphp

                  @foreach ($data->where("operation", "revenue") as $item)
                  @php
                  $total += $item->price;
                  @endphp
                  <tr id="dataRow_{{ $item->id }}" class="dataRow">
                      <td>{{ $item->description }}</td>
                      <td>{{ $item->price }} ج</td>
                      <td class="date">{{ $item->created_at->format('Y/m/d') }}</td>
                      <td><a style="color: #3e5569;" href="{{ route('edit', ['view' => 'money.revenues.edit' , 'table' => 'money' , 'id' => $item->id]) }}"><i class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="javascript:void(0);" onclick="showConfirmDeleteModal('{{ $item->id }}', 'money')"><i class="mdi mdi-delete"></i></a></td>
                  </tr>
                  @endforeach

                  <tr>
                      <td colspan="3">الاجمالي</td>
                      <td>{{ $total }} ج</td>
                  </tr>
                </tbody>
                </table>
              </div>

          </div>
          <div class="col-md-6">
            <div class="row">
                <div class="col-6 mt-1">
                    <h3 class="card-title" style="margin-right: 10px;">المصروفات</h3>
                </div>
                <div class="col-6 mb-2" dir="ltr">
                    <a href="{{ route('add', ['view' => 'money.expenses.add']) }}" style="padding: 3px 15px;" type="button" class="btn btn-success text-white ">
                    اضافة مصروف &nbsp;<i class="mdi mdi-account-plus font-18"></i>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                  <thead class="thead-light">
                    <tr>
                        <th scope="col">الوصف</th>
                        <th scope="col">المبلغ</th>
                        <th scope="col">التاريخ</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                  <tbody class="customtable">
                  @php
                  $total = 0;
                  @endphp

                  @foreach ($data->where("operation", "expense") as $item)
                  @php
                  $total += $item->price;
                  @endphp
                  <tr id="dataRow_{{ $item->id }}" class="dataRow">
                      <td>{{ $item->description }}</td>
                      <td>{{ $item->price }} ج</td>
                      <td class="date">{{ $item->created_at->format('Y/m/d') }}</td>
                      <td><a style="color: #3e5569;" href="{{ route('edit', ['view' => 'money.expenses.edit' , 'table' => 'money' , 'id' => $item->id]) }}"><i class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="javascript:void(0);" onclick="showConfirmDeleteModal('{{ $item->id }}', 'money')"><i class="mdi mdi-delete"></i></a></td>
                  </tr>
                  @endforeach

                  <tr>
                      <td colspan="3">الاجمالي</td>
                      <td>{{ $total }} ج</td>
                  </tr>
                  </tbody>
                </table>
              </div>

          </div>
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
    $(document).ready(function() {
        $('#searchButton').on('click', function() {
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();

            var fromDate = new Date(from_date);
            var toDate = new Date(to_date);

            $('.dataRow').each(function() {
                var date = $(this).find('.date').text();
                var rowDate = new Date(date);

                if (rowDate >= fromDate && rowDate <= toDate) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
  </script>

@endsection
