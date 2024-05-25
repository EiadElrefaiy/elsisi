@extends('layouts.app')

@section('content')

<div class="row">
 <div class="col-md-12">
   <div class="card">
     <div class="card-body">
       <div class="row">
       <div class="col-sm-7 col-6">
         <h3 class="card-title mb-2">العروض</h3>
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
         <a href="{{ route('add', ['view' => 'offers.add']) }}" style="padding: 3px 15px;" type="button" class="btn btn-success text-white ">
           اضافة عرض &nbsp;<i class="mdi mdi-account-plus font-18"></i>
         </a>
       </div>

       <div class="col-12 mt-4">
        <div class="row">
         <div class="col-md-2 col-6" dir="rtl">
           <label for="checkbox1">عدد العروض : 100</label>
         </div>
         <div class="col-md-2 col-6" dir="rtl">
           <label for="checkbox1">العروض المتسلمة : 100</label>
         </div>
         <div class="col-md-2 col-6" dir="rtl">
           <label for="checkbox1">العروض قيد الشحن : 100</label>
         </div>
         <div class="col-md-2 col-6" dir="rtl">
           <label for="checkbox1">العروض المرفوضة : 100</label>
         </div>
         <div class="col-md-2 col-6" dir="rtl">
           <label for="checkbox1">عروض بها مرتجع : 100</label>
         </div>
        </div>
       </div>
       
       <div class="col-12 mt-4">
        <div class="row">
         <div class="col-md-2 col-6" dir="rtl">
           <input type="radio" id="radio" name="radio">
           <label for="radio">كل العروض</label>
         </div>
         <div class="col-md-2 col-6" dir="rtl">
           <input type="radio" id="radio" name="radio">
           <label for="radio">العروض المتسلمة</label>
         </div>
         <div class="col-md-2 col-6" dir="rtl">
           <input type="radio" id="radio" name="radio">
           <label for="radio">العروض قيد الشحن</label>
         </div>
         <div class="col-md-2 col-6" dir="rtl">
           <input type="radio" id="radio" name="radio">
           <label for="radio">العروض المرفوضة</label>
         </div>
         <div class="col-md-2 col-6" dir="rtl">
           <input type="radio" id="radio" name="radio">
           <label for="radio">عروض بها مرتجع</label>
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
             <th scope="col">اسم العرض</th>
             <th scope="col">اسم العميل</th>
             <th scope="col">رقم التليفون</th>
             <th scope="col">الاجمالي</th>
             <th scope="col">تاريخ العرض</th>
             <th scope="col">تاريخ التسليم</th>
             <th scope="col">الحالة</th>
             <th scope="col">حالة الدفع</th>
             <th scope="col"></th>
           </tr>
         </thead>
         <tbody class="customtable">
           <tr>
             <td>2701</td>
             <td>عرض اليجانس ابيض</td>
             <td>سمير السيد سمير</td>
             <td>01064009414</td>
             <td>10000 ج</td>
             <td>20-04-2024</td>
             <td>20-04-2024</td>
             <td><span class="badge bg-warning">قيد الشحن</span></td>
             <td><span class="badge bg-success">مدفوع</span></td>
             <td><a style="color: #3e5569;" href="{{ route('offer_print', ['view' => 'offer_print']) }}"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a> &nbsp;&nbsp; <a style="color: #3e5569;" href="{{ route('edit', ['view' => 'offers.edit']) }}"><i class="mdi mdi-pencil"></i></a></td>
           </tr>
           <tr>
             <td>2701</td>
             <td>عرض اليجانس ابيض</td>
             <td>سمير السيد سمير</td>
             <td>01064009414</td>
             <td>10000 ج</td>
             <td>20-04-2024</td>
             <td>20-04-2024</td>
             <td><span class="badge bg-success">تم التسليم</span></td>
             <td><span class="badge bg-success">مدفوع</span></td>
             <td><a style="color: #3e5569;" href="pages-invoice.html"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a> &nbsp;&nbsp; <a style="color: #3e5569;" href="offer_info.html"><i class="mdi mdi-pencil"></i></a></td>
           </tr>
           <tr>
             <td>2701</td>
             <td>عرض اليجانس ابيض</td>
             <td>سمير السيد سمير</td>
             <td>01064009414</td>
             <td>10000 ج</td>
             <td>20-04-2024</td>
             <td>20-04-2024</td>
             <td><span class="badge bg-success">تم التسليم</span></td>
             <td><span class="badge bg-success">مدفوع</span></td>
             <td><a style="color: #3e5569;" href="pages-invoice.html"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a> &nbsp;&nbsp; <a style="color: #3e5569;" href="offer_info.html"><i class="mdi mdi-pencil"></i></a></td>
           </tr>
           <tr>
             <td>2701</td>
             <td>عرض اليجانس ابيض</td>
             <td>سمير السيد سمير</td>
             <td>01064009414</td>
             <td>10000 ج</td>
             <td>20-04-2024</td>
             <td>20-04-2024</td>
             <td><span class="badge bg-warning">قيد الشحن</span></td>
             <td><span class="badge bg-success">مدفوع</span></td>
             <td><a style="color: #3e5569;" href="pages-invoice.html"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a> &nbsp;&nbsp; <a style="color: #3e5569;" href="offer_info.html"><i class="mdi mdi-pencil"></i></a></td>
           </tr>
           <tr>
             <td>2701</td>
             <td>عرض اليجانس ابيض</td>
             <td>سمير السيد سمير</td>
             <td>01064009414</td>
             <td>10000 ج</td>
             <td>20-04-2024</td>
             <td>20-04-2024</td>
             <td><span class="badge bg-warning">قيد الشحن</span></td>
             <td><span class="badge bg-warning">عند الاستلام</span></td>
             <td><a style="color: #3e5569;" href="pages-invoice.html"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a> &nbsp;&nbsp; <a style="color: #3e5569;" href="offer_info.html"><i class="mdi mdi-pencil"></i></a></td>
           </tr>
           <tr>
             <td>2701</td>
             <td>عرض اليجانس ابيض</td>
             <td>سمير السيد سمير</td>
             <td>01064009414</td>
             <td>10000 ج</td>
             <td>20-04-2024</td>
             <td>20-04-2024</td>
             <td><span class="badge bg-danger">طلب ملغي</span></td>
             <td><span class="badge bg-danger">ملغي</span></td>
             <td><a style="color: #3e5569;" href="offer_info.html"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a> &nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-pencil"></i></a></td>
           </tr>
           <tr>
             <td>الاجمالي</td>
             <td>15000 ج</td>
           </tr>
         </tbody>
       </table>
     </div>
   </div>
  </div>
</div>
 @endsection
