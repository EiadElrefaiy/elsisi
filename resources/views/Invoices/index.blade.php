@extends('layouts.app')

@section('content')

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
         <a href="{{ route('add', ['view' => 'invoices.add']) }}" style="padding: 3px 15px;" type="button" class="btn btn-success text-white ">
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
           <tr>
             <td>2701</td>
             <td>سمير السيد سمير</td>
             <td>01064009414</td>
             <td>منطقة المعصرة اخر مصنع الصيد</td>
             <td>16000 ج</td>
             <td>14000 ج</td>
             <td>2000 ج</td>
             <td>20-04-2024</td>
             <td><span class="badge bg-warning">متبقي له</span></td>
             <td><a style="color: #3e5569;" href="{{ route('edit', ['view' => 'invoices.edit']) }}"><i class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
           </tr>
           <tr>
             <td>2701</td>
             <td>سمير السيد سمير</td>
             <td>01064009414</td>
             <td>منطقة المعصرة اخر مصنع الصيد</td>
             <td>16000 ج</td>
             <td>14000 ج</td>
             <td>2000 ج</td>
             <td>20-04-2024</td>
             <td><span class="badge bg-success">مكتمل</span></td>
             <td><a style="color: #3e5569;" href="invoice_info.html"><i class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
           </tr>
           <tr>
             <td>2701</td>
             <td>سمير السيد سمير</td>
             <td>01064009414</td>
             <td>منطقة المعصرة اخر مصنع الصيد</td>
             <td>16000 ج</td>
             <td>14000 ج</td>
             <td>2000 ج</td>
             <td>20-04-2024</td>
             <td><span class="badge bg-warning">متبقي له</span></td>
             <td><a style="color: #3e5569;" href="invoice_info.html"><i class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
           </tr>
           <tr>
             <td>2701</td>
             <td>سمير السيد سمير</td>
             <td>01064009414</td>
             <td>منطقة المعصرة اخر مصنع الصيد</td>
             <td>16000 ج</td>
             <td>14000 ج</td>
             <td>2000 ج</td>
             <td>20-04-2024</td>
             <td><span class="badge bg-success">مكتمل</span></td>
             <td><a style="color: #3e5569;" href="invoice_info.html"><i class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
           </tr>
           <tr>
             <td>2701</td>
             <td>سمير السيد سمير</td>
             <td>01064009414</td>
             <td>منطقة المعصرة اخر مصنع الصيد</td>
             <td>16000 ج</td>
             <td>14000 ج</td>
             <td>2000 ج</td>
             <td>20-04-2024</td>
             <td><span class="badge bg-warning">متبقي له</span></td>
             <td><a style="color: #3e5569;" href="invoice_info.html"><i class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
           </tr>
           <tr>
             <td>2701</td>
             <td>سمير السيد سمير</td>
             <td>01064009414</td>
             <td>منطقة المعصرة اخر مصنع الصيد</td>
             <td>16000 ج</td>
             <td>14000 ج</td>
             <td>2000 ج</td>
             <td>20-04-2024</td>
             <td><span class="badge bg-success">مكتمل</span></td>
             <td><a style="color: #3e5569;" href="invoice_info.html"><i class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
           </tr>
           <tr>
             <td colspan="2">الاجمالي</td>
             <td>32000 ج</td>
             <td colspan="2">المدفوع</td>
             <td>22000 ج</td>
             <td colspan="2">المتبقي</td>
             <td>10000 ج</td>
           </tr>
         </tbody>
       </table>
     </div>
   </div>
  </div>
 </div>
 @endsection
