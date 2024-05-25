@extends('layouts.app')

@section('content')

<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-sm-7 col-6">
              <h3 class="card-title m-2">الحسابات</h3>
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
           </div>
          </div>
        <div class="row">
          <div class="col-md-6">
                <div class="row">
                <div class="col-6 mt-1">
                    <h3 class="card-title" style="margin-right: 10px;">الايرادات</h3>
                </div>
                <div class="col-6 mb-2" dir="ltr">
                    <a href="{{ route('add', ['view' => 'money.revenues.add']) }}" style="padding: 3px 15px;" type="button" class="btn btn-success text-white ">
                    اضافة ايراد &nbsp;<i class="mdi mdi-account-plus font-18"></i>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">الوصف</th>
                      <th scope="col">المبلغ</th>
                      <th scope="col">التاريخ</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody class="customtable">
                    <tr>
                      <td>تسليم عرض رقم 2701</td>
                      <td>8500 ج</td>
                      <td>20-04-2024</td>
                      <td><a style="color: #3e5569;" href="{{ route('edit', ['view' => 'money.revenues.edit']) }}"><i class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
                  </tr>
                  <tr>
                    <td>تسليم عرض رقم 2701</td>
                    <td>8500 ج</td>
                    <td>20-04-2024</td>
                    <td><a style="color: #3e5569;" href="revenue_info.html"><i class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
                </tr>
                <tr>
                    <td>تسليم عرض رقم 2701</td>
                    <td>8500 ج</td>
                    <td>20-04-2024</td>
                    <td><a style="color: #3e5569;" href="revenue_info.html"><i class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
                </tr>
                <tr>
                    <td>تسليم عرض رقم 2701</td>
                    <td>8500 ج</td>
                    <td>20-04-2024</td>
                    <td><a style="color: #3e5569;" href="revenue_info.html"><i class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
                </tr>
                <tr>
                    <td>تسليم عرض رقم 2701</td>
                    <td>8500 ج</td>
                    <td>20-04-2024</td>
                    <td><a style="color: #3e5569;" href="revenue_info.html"><i class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
                </tr>
                <tr>
                    <td>تسليم عرض رقم 2701</td>
                    <td>8500 ج</td>
                    <td>20-04-2024</td>
                    <td><a style="color: #3e5569;" href="revenue_info.html"><i class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
                </tr>
                <tr>
                    <td colspan="3">الاجمالي</td>
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
                <div class="col-6 mb-2" dir="ltr">
                    <a href="{{ route('add', ['view' => 'money.expenses.add']) }}" style="padding: 3px 15px;" type="button" class="btn btn-success text-white ">
                    اضافة مصروف &nbsp;<i class="mdi mdi-account-plus font-18"></i>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                  <thead class="thead-light">
                    <tr>
                        <th scope="col">الوصف</th>
                        <th scope="col">المبلغ</th>
                        <th scope="col">التاريخ</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                  <tbody class="customtable">
                    <tr>
                        <td>فاتورة رقم 2701</td>
                        <td>8500 ج</td>
                        <td>20-04-2024</td>
                        <td><a style="color: #3e5569;" href="{{ route('edit', ['view' => 'money.expenses.edit']) }}"><i class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
                    </tr>
                    <tr>
                        <td>فاتورة رقم 2701</td>
                        <td>8500 ج</td>
                        <td>20-04-2024</td>
                        <td><a style="color: #3e5569;" href="expense_info.html"><i class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
                    </tr>
                    <tr>
                        <td>فاتورة رقم 2701</td>
                        <td>8500 ج</td>
                        <td>20-04-2024</td>
                        <td><a style="color: #3e5569;" href="expense_info.html"><i class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
                    </tr>
                    <tr>
                        <td>فاتورة رقم 2701</td>
                        <td>8500 ج</td>
                        <td>20-04-2024</td>
                        <td><a style="color: #3e5569;" href="expense_info.html"><i class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
                    </tr>
                    <tr>
                        <td>فاتورة رقم 2701</td>
                        <td>8500 ج</td>
                        <td>20-04-2024</td>
                        <td><a style="color: #3e5569;" href="expense_info.html"><i class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
                    </tr>
                    <tr>
                        <td>فاتورة رقم 2701</td>
                        <td>8500 ج</td>
                        <td>20-04-2024</td>
                        <td><a style="color: #3e5569;" href="expense_info.html"><i class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a></td>
                    </tr>
                    <tr>
                        <td colspan="3">الاجمالي</td>
                        <td>8500 ج</td>
                    </tr>    
                  </tbody>
                </table>
              </div>

          </div>
        </div>      


      </div>
  </div>

</div>
@endsection
