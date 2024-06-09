@extends('layouts.app')

@section('content')

<div class="row">

<div class="col-md-12">
 <div class="card">
     <div class="card-body">
         <div class="row">
             <div class="col-sm-7 col-6">
               <h3 class="card-title m-2">المرتجعات</h3>
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

           <div class="col-6">
           <a id="searchButton" href="javascript:void(0);" style="padding: 3px 15px;" type="button" class="btn btn-info text-white">
               بحث
           </a>
           </div>

           <div class="col-6" dir="ltr">
             <a href="{{ route('add', ['view' => 'returns.add']) }}" style="padding: 3px 15px;" type="button" class="btn btn-success text-white">
               اضافة مرتجع &nbsp;<i class="mdi mdi-account-plus font-18"></i>
             </a>
           </div>

         </div>
     </div>
     <div class="table-responsive">
       <table class="table">
         <thead class="thead-light">
           <tr>
             <th scope="col">العرض</th>
             <th scope="col">المنتج</th>
             <th scope="col">السعر</th>
             <th scope="col">الكمية</th>
             <th scope="col">الاجمالي</th>
             <th scope="col">التاريخ</th>
             <th scope="col"></th>
           </tr>
         </thead>
         <tbody class="customtable" id="tableBody">
          
        @php
         if(Auth::guard('representative')->check()){
          $list = $deliveries->where("representative_id" , Auth::guard('representative')->user()->id)->pluck("offer_id");
         }
        @endphp

         @foreach ( Auth::guard('representative')->check() ? $data->whereIn("offer_id" , $list) : $data as $item)
            <tr id="dataRow_{{ $item->id }}" class="dataRow">
             <td>{{$item->offer->offer_num}}</td>
             <td>{{$item->product->name}}</td>
             <td>{{$item->price}} ج</td>
             <td>{{$item->quantity}}</td>
             <td>{{$item->price * $item->quantity}} ج</td>
             <td class="date">{{ $item->created_at->format('Y/m/d') }}</td>
             <td>                      
              <a style="color: #3e5569;" href="javascript:void(0);" onclick="showConfirmDeleteModal('{{ $item->id }}', 'returns')">
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
