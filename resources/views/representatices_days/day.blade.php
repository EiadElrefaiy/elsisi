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
     <div class="col-6" dir="ltr">
         <div class="input-group" dir="rtl">
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
      </div>
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
           <tr>
             <td>2701</td>
             <td>سمير السيد سمير</td>
             <td>سيد عبد الرازق</td>
             <td>01064009414</td>
             <td>المنيا</td>
             <td>منطقة المعصرة اخر مصنع الصيد</td>
             <td>16000 ج</td>
             <td>20-04-2024</td>
             <td>20-04-2024</td>
             <td>الصعيد</td>
           </tr>
           <tr>
             <td>2701</td>
             <td>سمير السيد سمير</td>
             <td>سيد عبد الرازق</td>
             <td>01064009414</td>
             <td>المنيا</td>
             <td>منطقة المعصرة اخر مصنع الصيد</td>
             <td>16000 ج</td>
             <td>20-04-2024</td>
             <td>20-04-2024</td>
             <td>الصعيد</td>
           </tr>
           <tr>
             <td>2701</td>
             <td>سمير السيد سمير</td>
             <td>سيد عبد الرازق</td>
             <td>01064009414</td>
             <td>المنيا</td>
             <td>منطقة المعصرة اخر مصنع الصيد</td>
             <td>16000 ج</td>
             <td>20-04-2024</td>
             <td>20-04-2024</td>
             <td>الصعيد</td>
           </tr>
           <tr>
             <td colspan="9">الاجمالي</td>
             <td>32000 ج</td>
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
           <tr>
             <th scope="col">الوصف</th>
             <th scope="col">المبلغ</th>
             <th scope="col">التاريخ</th>
           </tr>
         </thead>
         <tbody class="customtable">
           <tr>
             <td>تسليم عرض رقم 2701</td>
             <td>8500 ج</td>
             <td>20-04-2024</td>
         </tr>
         <tr>
           <td>تسليم عرض رقم 2701</td>
           <td>8500 ج</td>
           <td>20-04-2024</td>
       </tr>
       <tr>
           <td>تسليم عرض رقم 2701</td>
           <td>8500 ج</td>
           <td>20-04-2024</td>
       </tr>
       <tr>
           <td>كاش</td>
           <td>400 ج</td>
           <td>20-04-2024</td>
       </tr>
       <tr>
           <td colspan="2">الاجمالي</td>
           <td>8500 ج</td>
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
           <tr>
               <th scope="col">الوصف</th>
               <th scope="col">المبلغ</th>
               <th scope="col">التاريخ</th>
             </tr>
           </thead>
         <tbody class="customtable">
           <tr>
               <td>بنزين</td>
               <td>700 ج</td>
               <td>20-04-2024</td>
           </tr>
           <tr>
               <td>كارتة</td>
               <td>35 ج</td>
               <td>20-04-2024</td>
           </tr>
           <tr>
               <td>مصروف</td>
               <td>75 ج</td>
               <td>20-04-2024</td>
           </tr>
           <tr>
               <td colspan="2">الاجمالي</td>
               <td>8500 ج</td>
           </tr>    
           <tr>
             <td colspan="2">الاجمالي</td>
             <td>450 ج</td>
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
                 <h3 class="card-title" style="margin-right: 10px;">الايرادات: 16510 ج</h3>
              </div>
              <div class="col-md-4">
                 <h3 class="card-title" style="margin-right: 10px;">المصروفات: 935 ج</h3>
              </div>
              <div class="col-md-4">
                 <h3 class="card-title" style="margin-right: 10px;">الاجمالي: 15510 ج</h3>
              </div>
            </div>      
         </div>
     </div>
  </div>
</div>
@endsection