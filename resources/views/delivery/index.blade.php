@extends('layouts.app')

@section('content')

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
           <tr>
             <td>2701</td>
             <td>عرض اليجانس ابيض</td>
             <td>سمير السيد سمير</td>
             <td>سيد عبد الرازق</td>
             <td>01064009414</td>
             <td>المنيا</td>
             <td>20-04-2024</td>
             <td>الصعيد</td>
             <td>20000 ج</td>
             <td>200 ج</td>
             <td>20200 ج</td>
             <td><span class="badge bg-success">تم التسليم</span></td>
             <td><a style="color: #3e5569;" href="{{ route('edit', ['view' => 'offer.edit']) }}"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="offer_info.html"><i class="mdi mdi-pencil"></i></a></td>
             <td><a style="color: #3e5569;" href="{{ route('edit', ['view' => 'delivery.edit']) }}"><i class="mdi mdi-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
           </tr>
           <tr>
             <td>2701</td>
             <td>عرض اليجانس ابيض</td>
             <td>سمير السيد سمير</td>
             <td>سيد عبد الرازق</td>
             <td>01064009414</td>
             <td>المنيا</td>
             <td>20-04-2024</td>
             <td>الصعيد</td>
             <td>20000 ج</td>
             <td>200 ج</td>
             <td>20200 ج</td>
             <td><span class="badge bg-success">تم التسليم</span></td>
             <td><a style="color: #3e5569;" href="pages-invoice.html"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="offer_info.html"><i class="mdi mdi-pencil"></i></a></td>
                                 <td><a style="color: #3e5569;" href="add_delivery.html"><i class="mdi mdi-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
           </tr>
           <tr>
             <td>2701</td>
             <td>عرض اليجانس ابيض</td>
             <td>سمير السيد سمير</td>
             <td>سيد عبد الرازق</td>
             <td>01064009414</td>
             <td>المنيا</td>
             <td>20-04-2024</td>
             <td>الصعيد</td>
             <td>20000 ج</td>
             <td>200 ج</td>
             <td>20200 ج</td>
             <td><span class="badge bg-warning">قيد الشحن</span></td>
             <td><a style="color: #3e5569;" href="pages-invoice.html"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="offer_info.html"><i class="mdi mdi-pencil"></i></a></td>
             <td><a style="color: #3e5569;" href="add_delivery.html"><i class="mdi mdi-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
           </tr>
           <tr>
             <td>2701</td>
             <td>عرض اليجانس ابيض</td>
             <td>سمير السيد سمير</td>
             <td>سيد عبد الرازق</td>
             <td>01064009414</td>
             <td>المنيا</td>
             <td>20-04-2024</td>
             <td>الصعيد</td>
             <td>20000 ج</td>
             <td>200 ج</td>
             <td>20200 ج</td>
             <td><span class="badge bg-warning">قيد الشحن</span></td>
             <td><a style="color: #3e5569;" href="pages-invoice.html"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="offer_info.html"><i class="mdi mdi-pencil"></i></a></td>
             <td><a style="color: #3e5569;" href="add_delivery.html"><i class="mdi mdi-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
           </tr>
           <tr>
             <td>2701</td>
             <td>عرض اليجانس ابيض</td>
             <td>سمير السيد سمير</td>
             <td>سيد عبد الرازق</td>
             <td>01064009414</td>
             <td>المنيا</td>
             <td>20-04-2024</td>
             <td>الصعيد</td>
             <td>20000 ج</td>
             <td>200 ج</td>
             <td>20200 ج</td>
             <td><span class="badge bg-success">تم التسليم</span></td>
             <td><a style="color: #3e5569;" href="pages-invoice.html"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="offer_info.html"><i class="mdi mdi-pencil"></i></a></td>
             <td><a style="color: #3e5569;" href="add_delivery.html"><i class="mdi mdi-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
           </tr>
           <tr>
             <td>2701</td>
             <td>عرض اليجانس ابيض</td>
             <td>سمير السيد سمير</td>
             <td>سيد عبد الرازق</td>
             <td>01064009414</td>
             <td>المنيا</td>
             <td>20-04-2024</td>
             <td>الصعيد</td>
             <td>20000 ج</td>
             <td>200 ج</td>
             <td>20200 ج</td>
             <td><span class="badge bg-danger">طلب مرفوض</span></td>
             <td><a style="color: #3e5569;" href="pages-invoice.html"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="offer_info.html"><i class="mdi mdi-pencil"></i></a></td>
             <td><a style="color: #3e5569;" href="add_delivery.html"><i class="mdi mdi-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
           </tr>
           <tr>
             <td colspan="10">الاجمالي</td>
             <td>32000 ج</td>
           </tr>
         </tbody>
       </table>
     </div>
   </div>
  </div>
 </div>
 @endsection
