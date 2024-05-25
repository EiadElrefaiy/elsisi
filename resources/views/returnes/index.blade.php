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
           <div class="col-12" dir="ltr">
             <a href="{{ route('add', ['view' => 'returnes.add']) }}" style="padding: 3px 15px;" type="button" class="btn btn-success text-white ">
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
             <th scope="col"></th>
           </tr>
         </thead>
         <tbody class="customtable">
           <tr>
             <td>2701</td>
             <td>طقم حمام</td>
             <td>3000 ج</td>
             <td>10</td>
             <td>3000 ج</td>
             <td><a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
           </tr>
           <tr>
             <td>2701</td>
             <td>طقم حمام</td>
             <td>3000 ج</td>
             <td>10</td>
             <td>3000 ج</td>
             <td><a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
           </tr>
           <tr>
             <td>2701</td>
             <td>طقم حمام</td>
             <td>3000 ج</td>
             <td>10</td>
             <td>3000 ج</td>
             <td><a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
           </tr>
           <tr>
             <td>2701</td>
             <td>طقم حمام</td>
             <td>3000 ج</td>
             <td>10</td>
             <td>3000 ج</td>
             <td><a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
           </tr>
           <tr>
             <td>2701</td>
             <td>طقم حمام</td>
             <td>3000 ج</td>
             <td>10</td>
             <td>3000 ج</td>
             <td><a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
           </tr>
         </tbody>
       </table>
     </div>
   </div>
  </div>
 </div>

 @endsection
