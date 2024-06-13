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
                    <h3 class="card-title m-2"> الخصومات & المكافأت</h3>
                    <div class="input-group">
                      <div class="input-group-append">
                        <span class="input-group-text" style="padding: 9.5px;" id="basic-addon2"
                          ><i class=" fas fa-search"></i></span>
                      </div>
                      <input
                        id="searchText"
                        type="text"
                        class="form-control"
                        placeholder="بحث"
                        aria-label="Recipient 's username"
                        aria-describedby="basic-addon2"
                      />
                    </div>       
                  </div>
                  <div class="col-12 mt-2">
                    <a href="#" id="searchButton" style="padding: 3px 15px;" type="button" class="btn btn-cyan text-white ">
                      بحث
                    </a>
                  </div>                         
                </div>
              </div>
              <div class="col-md-6 d-none d-md-block">

              </div>
              <div class="col-md-3 col-6" >
                <div class="form-group row">
                  <div class="col-12">
                  <div class="input-group">
                    <label
                    for="lname"
                    class="col-sm-3 text-end control-label col-form-label"
                    >من</label>
                    <input
                      value="{{date('m/d/Y')}}"
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
                      value="{{date('m/d/Y')}}"
                      id ="to_date"
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
           </div>
          </div>
        <div class="row">
          <div class="col-md-6">
            <div class="row">
                <div class="col-6">
                    <h3 class="card-title m-2">الخصومات</h3>
                </div>
                <div class="col-6">
                    <div class="col-12 mb-2" dir="ltr">
                        <a href="{{ route('add', ['view' => 'procedures.discounts.add']) }}" style="padding: 3px 15px;" type="button" class="btn btn-success text-white ">
                            اضافة خصم &nbsp;<i class="mdi mdi-account-plus font-18"></i>
                        </a>
                    </div>
                </div>

                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">الموظف</th>
                                <th scope="col">المبلغ</th>
                                <th scope="col">الملاحظات</th>
                                <th scope="col">التاريخ</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="customtable discounts">
                                @php
                                $totalDiscount = 0;
                                @endphp

                                @foreach ($data->where("operation", "discount") as $item)
                                @php
                                $totalDiscount += $item->price;
                                @endphp
                                <tr id="dataRow_{{ $item->id }}" class="dataRow">
                                <td>{{ $item->employee ? $item->employee->name : 'لا يوجد'}}</td>
                                <td class="price">{{ $item->price }} ج</td>
                                <td>{{ $item->description }}</td>
                                <td class="date">{{ $item->created_at->format('Y-m-d') }}</td>
                                <td><a style="color: #3e5569;" href="{{ route('edit', ['view' => 'procedures.discounts.edit','table' => 'procedures' , 'id' => $item->id]) }}"><i class="mdi mdi-grease-pencil"></i></a>
                                &nbsp;&nbsp;   

                                <a style="color: #3e5569;" href="javascript:void(0);" onclick="showConfirmDeleteModal('{{ $item->id }}', 'procedures')">
                                    <i class="mdi mdi-delete"></i>
                                </a>
                              </td>
                            </tr>
                            @endforeach

                            <tr>
                                <td colspan="4">الاجمالي</td>
                                <td id="totalDiscount">{{ $totalDiscount }} ج</td>
                            </tr>

                  </tbody>
                </table>
              </div>
          </div>
          <div class="col-md-6">
            <div class="row">
                <div class="col-6">
                    <h3 class="card-title m-2">المكافأت</h3>
                </div>
                <div class="col-6">
                    <div class="col-12 mb-2" dir="ltr">
                        <a href="{{ route('add', ['view' => 'procedures.rewards.add']) }}" style="padding: 3px 15px;" type="button" class="btn btn-success text-white ">
                            اضافة مكافأة &nbsp;<i class="mdi mdi-account-plus font-18"></i>
                        </a>
                    </div>
                </div>
            </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">الموظف</th>
                                <th scope="col">المبلغ</th>
                                <th scope="col">الملاحظات</th>
                                <th scope="col">التاريخ</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="customtable rewards">
                                @php
                                $totalReward = 0;
                                @endphp

                                @foreach ($data->where("operation", "reward") as $item)
                                @php
                                $totalReward += $item->price;
                                @endphp
                                <tr id="dataRow_{{ $item->id }}" class="dataRow">
                                <td>{{ $item->employee ? $item->employee->name : 'لا يوجد'}}</td>
                                <td class="price">{{ $item->price }} ج</td>
                                <td>{{ $item->description }}</td>
                                <td class="date">{{ $item->created_at->format('Y-m-d') }}</td>
                                <td><a style="color: #3e5569;" href="{{ route('edit', ['view' => 'procedures.rewards.edit' , 'id'=> $item->id , 'table'=>'procedures']) }}"><i class="mdi mdi-grease-pencil"></i></a>
                                &nbsp;&nbsp;   

                                <a style="color: #3e5569;" href="javascript:void(0);" onclick="showConfirmDeleteModal('{{ $item->id }}', 'procedures')">
                                    <i class="mdi mdi-delete"></i>
                                </a>
                              </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4">الاجمالي</td>
                                <td id="totalReward">{{ $totalReward }} ج</td>
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
        var query = $('#searchText').val().toLowerCase();
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();

        var fromDate = new Date(from_date);
        var toDate = new Date(to_date);

        var totalDiscount = 0;
        var totalReward = 0;

        $('.dataRow').each(function() {
            var date = $(this).find('.date').text();
            var rowDate = new Date(date);

            var textMatch = $(this).text().toLowerCase().indexOf(query) !== -1;
            var dateMatch = rowDate >= fromDate && rowDate <= toDate;

            if (textMatch && dateMatch) {
                $(this).show();
                if ($(this).parent().hasClass('discounts')) {
                    totalDiscount += parseFloat($(this).find('.price').text());
                } else if ($(this).parent().hasClass('rewards')) {
                    totalReward += parseFloat($(this).find('.price').text());
                }
            } else {
                $(this).hide();
            }
        });

        // Update total values
        $('#totalDiscount').text(totalDiscount.toFixed(2));
        $('#totalReward').text(totalReward.toFixed(2));
    });
});
  </script>

@endsection
