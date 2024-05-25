@extends('layouts.app')

@section('content')

<div class="row">
            <div class="col-md-12" dir="rtl">
                <div class="row">
                <div class="col-md-12">
                    <div class="card">

                    @include('clients.form')

                </div>      
               </div>
              </div>
           </div>
           <button type="button" class="btn btn-primary m-2">
            حفظ البيانات
        </button>


        <div class="col-md-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                              <div class="row">
                              <div class="col-sm-12">
                                <div class="row">

                                  <div class="col-6">
                                    <h3 class="card-title m-2">عروض العميل</h3>
                                  </div>
                                  <div class="col-6">
                                    <div class="col-12 mb-2" dir="ltr">
                                      <a href="{{ route('add', ['view' => 'offers.add']) }}" style="padding: 3px 15px;" type="button" class="btn btn-success text-white ">
                                        اضافة عرض &nbsp;<i class="mdi mdi-account-plus font-18"></i>
                                      </a>
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>
                              <div class="col-4 mt-2">
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
                             </div>
                            </div>
                            <div class="table-responsive">
                              <table class="table">
                                <thead class="thead-light">
                                  <tr>
                                    <th scope="col">الكود</th>
                                    <th scope="col">اسم العرض</th>
                                    <th scope="col">الاجمالي</th>
                                    <th scope="col">المدفوع</th>
                                    <th scope="col">المتبقي</th>
                                    <th scope="col">تاريخ العرض</th>
                                    <th scope="col">تاريخ التسليم</th>
                                    <th scope="col">الحالة</th>
                                    <th scope="col">حالة الدفع</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                  </tr>
                                </thead>
                                <tbody class="customtable">
                                  <tr>
                                    <td>2701</td>
                                    <td>سمير السيد سمير</td>
                                    <td>16000 ج</td>
                                    <td>14000 ج</td>
                                    <td>2000 ج</td>
                                    <td>20-04-2024</td>
                                    <td>20-04-2024</td>
                                    <td><span class="badge bg-warning">قيد الشحن</span></td>
                                    <td><span class="badge bg-success">مدفوع</span></td>
                                    <td><a style="color: #3e5569;" href="{{ route('edit', ['view' => 'offers.edit']) }}"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a> &nbsp;&nbsp; <a style="color: #3e5569;" href="offer_info.html"><i class="mdi mdi-pencil"></i></a></td>
                                    </tr>
                                  <tr>
                                    <td>2701</td>
                                    <td>سمير السيد سمير</td>
                                    <td>16000 ج</td>
                                    <td>14000 ج</td>
                                    <td>2000 ج</td>
                                    <td>20-04-2024</td>
                                    <td>20-04-2024</td>
                                    <td><span class="badge bg-warning">قيد الشحن</span></td>
                                    <td><span class="badge bg-success">مدفوع</span></td>
                                    <td><a style="color: #3e5569;" href="pages-invoice.html"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a> &nbsp;&nbsp; <a style="color: #3e5569;" href="offer_info.html"><i class="mdi mdi-pencil"></i></a></td>
                                                  </tr>
                                  <tr>
                                    <td>2701</td>
                                    <td>سمير السيد سمير</td>
                                    <td>16000 ج</td>
                                    <td>14000 ج</td>
                                    <td>2000 ج</td>
                                    <td>20-04-2024</td>
                                    <td>20-04-2024</td>
                                    <td><span class="badge bg-warning">قيد الشحن</span></td>
                                    <td><span class="badge bg-success">مدفوع</span></td>
                                    <td><a style="color: #3e5569;" href="pages-invoice.html"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a> &nbsp;&nbsp; <a style="color: #3e5569;" href="offer_info.html"><i class="mdi mdi-pencil"></i></a></td>
                                    </tr>
                                  <tr>
                                    <td>2701</td>
                                    <td>سمير السيد سمير</td>
                                    <td>16000 ج</td>
                                    <td>14000 ج</td>
                                    <td>2000 ج</td>
                                    <td>20-04-2024</td>
                                    <td>20-04-2024</td>
                                    <td><span class="badge bg-warning">قيد الشحن</span></td>
                                    <td><span class="badge bg-success">مدفوع</span></td>
                                    <td><a style="color: #3e5569;" href="pages-invoice.html"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a> &nbsp;&nbsp; <a style="color: #3e5569;" href="offer_info.html"><i class="mdi mdi-pencil"></i></a></td>
                                    </tr>
                                  <tr>
                                    <td>2701</td>
                                    <td>سمير السيد سمير</td>
                                    <td>16000 ج</td>
                                    <td>14000 ج</td>
                                    <td>2000 ج</td>
                                    <td>20-04-2024</td>
                                    <td>20-04-2024</td>
                                    <td><span class="badge bg-warning">قيد الشحن</span></td>
                                    <td><span class="badge bg-success">مدفوع</span></td>
                                    <td><a style="color: #3e5569;" href="pages-invoice.html"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a> &nbsp;&nbsp; <a style="color: #3e5569;" href="offer_info.html"><i class="mdi mdi-pencil"></i></a></td>
                                    </tr>
                                  <tr>
                                    <td>2701</td>
                                    <td>سمير السيد سمير</td>
                                    <td>16000 ج</td>
                                    <td>14000 ج</td>
                                    <td>2000 ج</td>
                                    <td>20-04-2024</td>
                                    <td>20-04-2024</td>
                                    <td><span class="badge bg-warning">قيد الشحن</span></td>
                                    <td><span class="badge bg-success">مدفوع</span></td>
                                    <td><a style="color: #3e5569;" href="pages-invoice.html"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a> &nbsp;&nbsp; <a style="color: #3e5569;" href="offer_info.html"><i class="mdi mdi-pencil"></i></a></td>
                                    </tr>
                                    <tr>
                                      <td>الاجمالي</td>
                                      <td>32000 ج</td>
                                      <td>المدفوع</td>
                                      <td>22000 ج</td>
                                      <td>المتبقي</td>
                                      <td>10000 ج</td>
                                    </tr>  
                                </tbody>
                              </table>
                            </div>
                          </div>
                      </div>

</div>

@endsection
