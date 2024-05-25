@extends('layouts.app')

@section('content')

<div class="row">
 <div class="col-md-12">
  <div class="card">
     <div class="card-body">
       <div class="row">
       <div class="col-sm-12">
         <h3 class="card-title mb-2">يومية المناديب</h3>
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
         <div class="input-group" dir="rtl">
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
     <div class="table-responsive">
       <table class="table">
         <thead class="thead-light">
           <tr>
             <th scope="col">المندوب</th>
             <th scope="col">الايرادات</th>
             <th scope="col">المصروفات</th>
             <th scope="col">الاجمالي</th>
             <th scope="col"></th>
           </tr>
         </thead>
         <tbody class="customtable">
           <tr>
             <td>سمير السيد سمير</td>
             <td>16510</td>
             <td>1000</td>
             <td>15510</td>
             <td><a style="color: #3e5569;" href="{{ route('index', ['table' => 'representatives', 'view' => 'representatices_days.day']) }}"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"></i></a></td>
           </tr>
           <tr>
             <td>سمير السيد سمير</td>
             <td>16510</td>
             <td>1000</td>
             <td>15510</td>
             <td><a style="color: #3e5569;" href="day_info.html"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"></i></a></td>
           </tr>
           <tr>
             <td>سمير السيد سمير</td>
             <td>16510</td>
             <td>1000</td>
             <td>15510</td>
             <td><a style="color: #3e5569;" href="day_info.html"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"></i></a></td>
           </tr>
           <tr>
             <td>سمير السيد سمير</td>
             <td>16510</td>
             <td>1000</td>
             <td>15510</td>
             <td><a style="color: #3e5569;" href="day_info.html"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"></i></a></td>
           </tr>
           <tr>
             <td>سمير السيد سمير</td>
             <td>16510</td>
             <td>1000</td>
             <td>15510</td>
             <td><a style="color: #3e5569;" href="day_info.html"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"></i></a></td>
           </tr>
           <tr>
             <td>سمير السيد سمير</td>
             <td>16510</td>
             <td>1000</td>
             <td>15510</td>
             <td><a style="color: #3e5569;" href="day_info.html"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"></i></a></td>
           </tr>
         </tbody>
       </table>
     </div>
   </div>
  </div>
 </div>
 @endsection