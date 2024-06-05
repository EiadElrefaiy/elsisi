@extends('layouts.app')

@section('content')

<div class="row">
<div class="col-md-12">
 <div class="card">
     <div class="card-body">
       <div class="row">
       <div class="col-sm-6 col-6">
         <h3 class="card-title">العروض</h3>
       </div>

     <div class="table-responsive">
       <table class="table">
         <thead class="thead-light">
           <tr>
             <th scope="col">رقم العرض</th>
             <th scope="col">اسم العميل</th>
             <th scope="col">مندوب التوصيل</th>
             <th scope="col">رقم التليفون</th>
             <th scope="col">المحافظة</th>
             <th scope="col">العنوان</th>
             <th scope="col">الاجمالي</th>
             <th scope="col">تاريخ العرض</th>
             <th scope="col">تاريخ التسليم</th>
             <th scope="col">خط السير</th>
           </tr>
         </thead>
         <tbody class="customtable">
         @php
           $totalSum = 0;
         @endphp
         @foreach ($data as $item)
         @foreach ($item->deliveries as $delivery)
             @php
             if (Illuminate\Support\Str::contains($delivery->created_at, $formattedDate)){
              $totalSum += $delivery->offer->total;
             }
             @endphp
             @if (Illuminate\Support\Str::contains($delivery->created_at, $formattedDate))
                <tr id="dataRow_{{$item->id}}">
                    <td>{{$delivery->offer->offer_num}}</td>
                    <td>{{$delivery->representative->name}}</td>
                    <td>{{$delivery->offer->client->name}}</td>
                    <td>{{$delivery->offer->client->phone}}</td>
                    <td>{{$delivery->offer->client->state}}</td>
                    <td>{{$delivery->offer->client->address}}</td>
                    <td>{{$delivery->offer->total}} ج</td>
                    <td>{{$delivery->offer->created_at->format('Y-m-d')}}</td>
                    <td>{{$delivery->created_at->format('Y-m-d')}}</td>
                    <td>{{$delivery->line}}</td>
                </tr>
            @endif
           @endforeach
         @endforeach
           <tr>
             <td colspan="9">الاجمالي</td>
             <td>{{$totalSum}} ج</td>
           </tr>
         </tbody>
       </table>
     </div>
   </div>
</div>



<div class="col-md-12">
 <div class="card">
     <div class="card-body">      
<div class="row">
 <div class="col-md-6">
       <div class="row">
       <div class="col-6 mt-1">
           <h3 class="card-title" style="margin-right: 10px;">الايرادات</h3>
       </div>
   </div>
   <div class="table-responsive">
       <table class="table">
         <thead class="thead-light">
             <tr id="dataRow_{{$item->id}}">
             <th scope="col">الوصف</th>
             <th scope="col">المبلغ</th>
             <th scope="col">التاريخ</th>
           </tr>
         </thead>
         <tbody class="customtable">
         @php
           $totalRevenueSum = 0;
         @endphp
         @foreach ($data as $item)
           @foreach ($item->money->where("operation" , "revenue") as $revenue)
             @php
             if (Illuminate\Support\Str::contains($revenue->created_at, $formattedDate)){
              $totalRevenueSum += $revenue->price;
             }
             @endphp

             @if (Illuminate\Support\Str::contains($revenue->created_at, $formattedDate))
           <tr>
             <td>{{$revenue->description}}</td>
             <td>{{$revenue->price}} ج</td>
             <td>{{$revenue->created_at->format('Y-m-d')}}</td>
         </tr>
            @endif
           @endforeach
         @endforeach

       <tr>
           <td colspan="2">الاجمالي</td>
           <td>{{$totalRevenueSum}} ج</td>
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
   </div>
   <div class="table-responsive">
   <table class="table">
         <thead class="thead-light">
             <tr id="dataRow_{{$item->id}}">
             <th scope="col">الوصف</th>
             <th scope="col">المبلغ</th>
             <th scope="col">التاريخ</th>
           </tr>
         </thead>
         <tbody class="customtable">
         @php
           $totalExpenseSum = 0;
         @endphp
         @foreach ($data as $item)
           @foreach ($item->money->where("operation" , "expense") as $expense)
             @php
             if (Illuminate\Support\Str::contains($expense->created_at, $formattedDate)){
              $totalExpenseSum += $expense->price;
             }
             @endphp
             @if (Illuminate\Support\Str::contains($expense->created_at, $formattedDate))
           <tr>
             <td>{{$expense->description}}</td>
             <td>{{$expense->price}} ج</td>
             <td>{{$expense->created_at->format('Y-m-d')}}</td>
         </tr>
            @endif
           @endforeach
         @endforeach

       <tr>
           <td colspan="2">الاجمالي</td>
           <td>{{$totalExpenseSum}} ج</td>
       </tr>
       </tbody>
       </table>
     </div>

 </div>
</div>      
</div>      
</div>      
 </div>

 <div class="col-md-12">
     <div class="card">
         <div class="card-body">
             <div class="row">
              <div class="col-md-4">
                 <h3 class="card-title" style="margin-right: 10px;">الايرادات: {{$totalRevenueSum}} ج</h3>
              </div>
              <div class="col-md-4">
                 <h3 class="card-title" style="margin-right: 10px;">المصروفات: {{$totalExpenseSum}} ج</h3>
              </div>
              <div class="col-md-4">
                 <h3 class="card-title" style="margin-right: 10px;">الاجمالي: {{$totalRevenueSum - $totalExpenseSum}} ج</h3>
              </div>
            </div>      
         </div>
     </div>
  </div>
</div>
@endsection