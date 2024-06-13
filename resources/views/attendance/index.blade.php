@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
              <div class="col-md-3 col-6">
                <div class="row">
                  <div class="col-12">
                    <h3 class="card-title m-2">الحضور / الغياب</h3>
                    <div class="input-group">
                      <div class="input-group-append">
                        <span class="input-group-text" style="padding: 9.5px;" id="basic-addon2">
                          <i class="fas fa-search"></i>
                        </span>
                      </div>
                      <input
                        id="searchText"
                        type="text"
                        class="form-control"
                        placeholder="بحث"
                        aria-label="Recipient's username"
                        aria-describedby="basic-addon2"
                      />
                    </div>       
                  </div>
                  <div class="col-12 mt-2">
                    <a href="#" id="searchButton" style="padding: 3px 15px;" type="button" class="btn btn-cyan text-white">
                      بحث
                    </a>
                  </div>                         
                </div>
              </div>
              <div class="col-md-6 d-none d-md-block"></div>
              <div class="col-md-3 col-6">
                <div class="form-group row">
                  <div class="col-12">
                    <div class="input-group">
                      <label for="lname" class="col-sm-3 text-end control-label col-form-label">من</label>
                      <input
                        id="from_date"
                        type="text"
                        class="form-control mydatepicker"
                        placeholder="mm/dd/yyyy"
                      />
                      <div class="input-group-append">
                        <span class="input-group-text h-100"><i class="mdi mdi-calendar"></i></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mt-1">
                    <div class="input-group" dir="rtl">
                      <label for="lname" class="col-sm-3 text-end control-label col-form-label">الى</label>
                      <input
                        id="to_date"
                        type="text"
                        class="form-control mydatepicker"
                        placeholder="mm/dd/yyyy"
                      />
                      <div class="input-group-append">
                        <span class="input-group-text h-100"><i class="mdi mdi-calendar"></i></span>
                      </div>
                    </div>
                  </div>
                </div> 
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-6">
                <h3 class="card-title m-2">الحضور</h3>
              </div>
              <div class="col-6">
                <div class="col-12 mb-2" dir="ltr">
                  <a href="{{ route('add', ['view' => 'attendance.attendance.add']) }}" style="padding: 3px 15px;" type="button" class="btn btn-success text-white">
                    اضافة حضور &nbsp;<i class="mdi mdi-account-plus font-18"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">الموظف</th>
                      <th scope="col">ساعة الحضور</th>
                      <th scope="col">ساعة الانصراف</th>
                      <th scope="col">عدد الساعات</th>
                      <th scope="col">التاريخ</th>
                      <th scope="col">ملاحظات</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody class="customtable">
                    @php
                    $totalHours = 0;
                    $totalDays = 0;
                    @endphp
                    @foreach ($data->where("operation", "attendance") as $item)
                        @php
                            $from = \Carbon\Carbon::parse($item->from);
                            $to = \Carbon\Carbon::parse($item->to);
                            $diffInMinutes = $to->diffInMinutes($from);
                            $diffInHours = round($diffInMinutes / 60, 2);
                            $totalHours += $diffInHours;
                            $totalDays++;
                        @endphp
                        <tr id="dataRow_{{ $item->id }}" class="dataRow attendance-row">
                            <td class="name">{{ $item->employee ? $item->employee->name : 'لا يوجد'}}</td>
                            <td dir="ltr">{{ $from->format('h:i A') }}</td>
                            <td dir="ltr">{{ $to->format('h:i A') }}</td>
                            <td class="hours">{{ $diffInHours }} ساعة</td>
                            <td class="date">{{ $item->created_at->format('Y-m-d') }}</td>
                            <td>{{ isset($item->notes) ? $item->notes : '____________' }}</td>
                            <td>
                                <a style="color: #3e5569;" href="{{ route('edit', ['view' => 'attendance.attendance.edit' , 'table' => 'attendance' , 'id' => $item->id]) }}">
                                    <i class="mdi mdi-grease-pencil"></i>
                                </a>&nbsp;&nbsp;
                                <a style="color: #3e5569;" href="javascript:void(0);" onclick="showConfirmDeleteModal('{{ $item->id }}', 'attendance')">
                                    <i class="mdi mdi-delete"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    <tr id="attendanceTotals">
                      <td colspan="2">عدد ايام الحضور</td>
                      <td id="totalDays">{{ $totalDays }} يوم</td>
                      <td colspan="2">اجمالي الساعات</td>
                      <td id="totalHours">{{ $totalHours }} ساعة</td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="col-6">
                <h3 class="card-title m-2">الغياب</h3>
              </div>
              <div class="col-6">
                <div class="col-12 mb-2" dir="ltr">
                  <a href="{{ route('add', ['view' => 'attendance.abcense.add']) }}" style="padding: 3px 15px;" type="button" class="btn btn-success text-white">
                    اضافة غياب &nbsp;<i class="mdi mdi-account-plus font-18"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">الموظف</th>
                      <th scope="col">التاريخ</th>
                      <th scope="col">ملاحظات</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody class="customtable">
                    @php
                    $totalAbsenceDays = 0;
                    $totalHolidaysDays = 0;
                    @endphp
                    @foreach ($data->where("operation", "absence") as $item)
                      @php
                      if (Illuminate\Support\Str::contains($item->notes, 'اجازة')){
                          $totalHolidaysDays++;
                      }
                      $totalAbsenceDays++;
                      @endphp
                      <tr id="dataRow_{{ $item->id }}" class="dataRow absence-row">
                          <td class="name">{{ $item->employee ? $item->employee->name : 'لا يوجد'}}</td>
                          <td class="date">{{ $item->created_at->format('Y-m-d') }}</td>
                          <td>{{ isset($item->notes) ? $item->notes : '____________' }}</td>
                          <td>
                            <a style="color: #3e5569;" href="javascript:void(0);" onclick="showConfirmDeleteModal('{{ $item->id }}', 'attendance')"><i class="mdi mdi-delete"></i></a>
                          </td>
                      </tr>
                    @endforeach
                    <tr id="absenceTotals">
                      <td colspan="1">عدد ايام الغياب</td>
                      <td id="totalAbsenceDays">{{ $totalAbsenceDays }} يوم</td>
                      <td colspan="1">عدد الاجازات</td>
                      <td id="totalHolidaysDays">{{ $totalHolidaysDays }} يوم</td>
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
            var searchText = $('#searchText').val().toLowerCase();

            var fromDate = from_date ? new Date(from_date) : null;
            var toDate = to_date ? new Date(to_date) : null;

            var totalHours = 0;
            var totalDays = 0;
            var totalAbsenceDays = 0;
            var totalHolidaysDays = 0;

            $('.dataRow').each(function() {
                var date = $(this).find('.date').text();
                var name = $(this).find('.name').text().toLowerCase();
                var rowDate = new Date(date);

                var dateInRange = true;
                if (fromDate && toDate) {
                    dateInRange = rowDate >= fromDate && rowDate <= toDate;
                } else if (fromDate) {
                    dateInRange = rowDate >= fromDate;
                } else if (toDate) {
                    dateInRange = rowDate <= toDate;
                }

                var nameMatches = searchText === '' || name.includes(searchText);

                if (dateInRange && nameMatches) {
                    $(this).show();

                    if ($(this).hasClass('attendance-row')) {
                        // Update attendance totals
                        var hours = parseFloat($(this).find('.hours').text());
                        totalHours += hours;
                        totalDays++;
                    } else if ($(this).hasClass('absence-row')) {
                        // Update absence totals
                        totalAbsenceDays++;
                        if ($(this).find('td').eq(2).text().includes('اجازة')) {
                            totalHolidaysDays++;
                        }
                    }
                } else {
                    $(this).hide();
                }
            });

            // Update attendance totals row
            $('#attendanceTotals').html('<td colspan="2">عدد ايام الحضور</td><td>' + totalDays + ' يوم</td><td colspan="2">اجمالي الساعات</td><td>' + totalHours.toFixed(2) + ' ساعة</td>  <td></td>');

            // Update absence totals row
            $('#absenceTotals').html('<td colspan="1">عدد ايام الغياب</td><td>' + totalAbsenceDays + ' يوم</td><td colspan="1">عدد الاجازات</td><td>' + totalHolidaysDays + ' يوم</td>');
        });
    });
</script>

@endsection
