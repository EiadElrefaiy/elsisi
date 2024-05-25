@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
              <div class="col-md-3 col-6">
                <div class="row">
                  <div class="col-12">
                    <h3 class="card-title m-2"> الخصومات & المكافأت</h3>
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
                  <div class="col-12 mt-2">
                    <a href="add_attendance.html" style="padding: 3px 15px;" type="button" class="btn btn-cyan text-white ">
                      بحث
                    </a>
                  </div>                         
                </div>
              </div>
              <div class="col-md-6 d-none d-md-block">

              </div>
              <div class="col-md-3 col-6" >
                <div class="form-group row">
                  <div class="col-12">
                  <div class="input-group">
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
                <div class="col-6">
                    <h3 class="card-title m-2">الخصومات</h3>
                </div>
                <div class="col-6">
                    <div class="col-12 mb-2" dir="ltr">
                        <a href="{{ route('add', ['view' => 'procedures.discounts.add']) }}" style="padding: 3px 15px;" type="button" class="btn btn-success text-white ">
                            اضافة خصم &nbsp;<i class="mdi mdi-account-plus font-18"></i>
                        </a>
                    </div>
                </div>

                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">الموظف</th>
                                <th scope="col">المبلغ</th>
                                <th scope="col">الملاحظات</th>
                                <th scope="col">التاريخ</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="customtable">
                            <tr>
                                <td>محمد عبد المعطي</td>
                                <td>200 ج</td>
                                <td>يمكن اضافة اي ملاحظة</td>
                                <td>20-04-2024</td>
                                <td><a style="color: #3e5569;" href="{{ route('edit', ['view' => 'procedures.discounts.edit']) }}"><i
                                            class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i
                                            class="mdi mdi-delete"></i></a></td>
                            </tr>
                            <tr>
                                <td>محمد عبد المعطي</td>
                                <td>200 ج</td>
                                <td>يمكن اضافة اي ملاحظة</td>
                                <td>20-04-2024</td>
                                <td><a style="color: #3e5569;" href="attendance_info.html"><i
                                            class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i
                                            class="mdi mdi-delete"></i></a></td>
                            </tr>
                            <tr>
                                <td>محمد عبد المعطي</td>
                                <td>200 ج</td>
                                <td>يمكن اضافة اي ملاحظة</td>
                                <td>20-04-2024</td>
                                <td><a style="color: #3e5569;" href="attendance_info.html"><i
                                            class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i
                                            class="mdi mdi-delete"></i></a></td>
                            </tr>
                            <tr>
                                <td>محمد عبد المعطي</td>
                                <td>200 ج</td>
                                <td>يمكن اضافة اي ملاحظة</td>
                                <td>20-04-2024</td>
                                <td><a style="color: #3e5569;" href="attendance_info.html"><i
                                            class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i
                                            class="mdi mdi-delete"></i></a></td>
                            </tr>
                            <tr>
                                <td>محمد عبد المعطي</td>
                                <td>200 ج</td>
                                <td>يمكن اضافة اي ملاحظة</td>
                                <td>20-04-2024</td>
                                <td><a style="color: #3e5569;" href="attendance_info.html"><i
                                            class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i
                                            class="mdi mdi-delete"></i></a></td>
                            </tr>
                            <tr>
                                <td>محمد عبد المعطي</td>
                                <td>200 ج</td>
                                <td>يمكن اضافة اي ملاحظة</td>
                                <td>20-04-2024</td>
                                <td><a style="color: #3e5569;" href="attendance_info.html"><i
                                            class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i
                                            class="mdi mdi-delete"></i></a></td>
                        </tr>
                  </tbody>
                </table>
              </div>
          </div>
          <div class="col-md-6">
            <div class="row">
                <div class="col-6">
                    <h3 class="card-title m-2">المكافأت</h3>
                </div>
                <div class="col-6">
                    <div class="col-12 mb-2" dir="ltr">
                        <a href="{{ route('add', ['view' => 'procedures.rewards.add']) }}" style="padding: 3px 15px;" type="button" class="btn btn-success text-white ">
                            اضافة مكافأة &nbsp;<i class="mdi mdi-account-plus font-18"></i>
                        </a>
                    </div>
                </div>
            </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">الموظف</th>
                                <th scope="col">المبلغ</th>
                                <th scope="col">الملاحظات</th>
                                <th scope="col">التاريخ</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="customtable">
                            <tr>
                                <td>محمد عبد المعطي</td>
                                <td>200 ج</td>
                                <td>يمكن اضافة اي ملاحظة</td>
                                <td>20-04-2024</td>
                                <td><a style="color: #3e5569;" href="{{ route('edit', ['view' => 'procedures.rewards.edit']) }}"><i
                                            class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i
                                            class="mdi mdi-delete"></i></a></td>
                            </tr>
                            <tr>
                                <td>محمد عبد المعطي</td>
                                <td>200 ج</td>
                                <td>يمكن اضافة اي ملاحظة</td>
                                <td>20-04-2024</td>
                                <td><a style="color: #3e5569;" href="attendance_info.html"><i
                                            class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i
                                            class="mdi mdi-delete"></i></a></td>
                            </tr>
                            <tr>
                                <td>محمد عبد المعطي</td>
                                <td>200 ج</td>
                                <td>يمكن اضافة اي ملاحظة</td>
                                <td>20-04-2024</td>
                                <td><a style="color: #3e5569;" href="attendance_info.html"><i
                                            class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i
                                            class="mdi mdi-delete"></i></a></td>
                            </tr>
                            <tr>
                                <td>محمد عبد المعطي</td>
                                <td>200 ج</td>
                                <td>يمكن اضافة اي ملاحظة</td>
                                <td>20-04-2024</td>
                                <td><a style="color: #3e5569;" href="attendance_info.html"><i
                                            class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i
                                            class="mdi mdi-delete"></i></a></td>
                            </tr>
                            <tr>
                                <td>محمد عبد المعطي</td>
                                <td>200 ج</td>
                                <td>يمكن اضافة اي ملاحظة</td>
                                <td>20-04-2024</td>
                                <td><a style="color: #3e5569;" href="attendance_info.html"><i
                                            class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i
                                            class="mdi mdi-delete"></i></a></td>
                            </tr>
                            <tr>
                                <td>محمد عبد المعطي</td>
                                <td>200 ج</td>
                                <td>يمكن اضافة اي ملاحظة</td>
                                <td>20-04-2024</td>
                                <td><a style="color: #3e5569;" href="attendance_info.html"><i
                                            class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i
                                            class="mdi mdi-delete"></i></a></td>
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
