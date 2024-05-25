@extends('layouts.app')

@section('content')

<div class="row">
 <div class="col-md-12">
 <div class="card">
     <div class="card-body">
       <div class="row">
       <div class="col-sm-12">
         <h3 class="card-title mb-2">المنتجات</h3>
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
         <a href="{{ route('add', ['view' => 'products.add']) }}" style="padding: 3px 15px;" type="button" class="btn btn-success text-white ">
           اضافة منتج &nbsp;<i class="mdi mdi-account-plus font-18"></i>
         </a>
       </div>
      </div>
     </div>
     <div class="table-responsive">
       <table class="table">
         <thead class="thead-light">
           <tr>
             <th scope="col">النوع</th>
             <th scope="col">السعر</th>
             <th scope="col">الكمية</th>
             <th scope="col"></th>
           </tr>
         </thead>
         <tbody class="customtable">
           <tr>
             <td>طقم حمام</td>
             <td>3000 ج</td>
             <td>10</td>
             <td><a style="color: #3e5569;" href="{{ route('edit', ['view' => 'products.edit']) }}"><i class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
           </tr>
           <tr>
             <td>طقم خلاط سوبر(3 قطع)</td>
             <td>1800 ج</td>
             <td>10</td>
             <td><a style="color: #3e5569;" href="product_info.html"><i class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
           </tr>
         </tbody>
       </table>
     </div>
   </div>
  </div>
 </div>
 @endsection
