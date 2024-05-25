@extends('layouts.app')

@section('content')
<div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <a href="{{ route('index', ['table' => 'returns', 'view' => 'returnes.index']) }}">
                <div class="card card-hover">
                  <div class="box bg-danger text-center">
                    <h1 class="font-light text-white">
                      <i class="mdi mdi-keyboard-return"></i>
                    </h1>
                    <h4 class="text-white">المرتجعات</h4>
                  </div>
                </div>  
              </a>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <a href="{{ route('index', ['table' => 'delivery', 'view' => 'representatices_days.index']) }}">
                <div class="card card-hover">
                  <div class="box bg-success text-center">
                    <h1 class="font-light text-white">
                      <i class="mdi mdi-currency-usd"></i>
                    </h1>
                    <h4 class="text-white">يوميات المناديب</h4>
                  </div>
                </div>  
              </a>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <a href="{{ route('index', ['table' => 'clients', 'view' => 'clients.index']) }}">
              <div class="card card-hover">
                <div class="box bg-cyan text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-account-multiple"></i>
                  </h1>
                  <h4 class="text-white">العملاء</h4>
                </div>
              </div>
              </a>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
             <a href="{{ route('index', ['table' => 'suppliers', 'view' => 'suppliers.index']) }}">
              <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light text-white">
                    <i class="fas fa-handshake"></i>
                  </h1>
                  <h4 class="text-white">الموردين</h4>
                </div>
              </div>
             </a>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <a href="{{ route('index', ['table' => 'representatives', 'view' => 'representatives.index']) }}">
              <div class="card card-hover">
                <div class="box bg-warning text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-car"></i>
                  </h1>
                  <h4 class="text-white">المناديب</h4>
                </div>
              </div>
             </a>
            </div>

            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <a href="{{ route('index', ['table' => 'employees', 'view' => 'employees.index']) }}">
              <div class="card card-hover">
                <div class="box bg-info text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-desktop-mac"></i>
                  </h1>
                  <h4 class="text-white">الموظفين</h4>
                </div>
              </div>
              </a>
            </div>
            <!-- Column -->
            
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
             <a href="{{ route('index', ['table' => 'offers', 'view' => 'offers.index']) }}">
              <div class="card card-hover">
                <div class="box bg-cyan text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-receipt"></i>
                  </h1>
                  <h4 class="text-white">العروض</h4>
                </div>
              </div>
             </a>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
             <a href="{{ route('index', ['table' => 'delivery', 'view' => 'delivery.index']) }}">
              <div class="card card-hover">
                <div class="box bg-info text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-car"></i>
                  </h1>
                  <h4 class="text-white">الشحن</h4>
                </div>
              </div>
             </a>
            </div>

            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <a href="{{ route('index', ['table' => 'products', 'view' => 'products.index']) }}">
              <div class="card card-hover">
                <div class="box bg-warning text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-cart"></i>
                  </h1>
                  <h4 class="text-white">المنتجات</h4>
                </div>
              </div>
             </a>
            </div>

            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
             <a href="{{ route('index', ['table' => 'invoices', 'view' => 'invoices.index']) }}">
              <div class="card card-hover">
                <div class="box bg-info text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-receipt"></i>
                  </h1>
                  <h4 class="text-white">فواتير الموردين</h4>
                </div>
              </div>
             </a>
            </div>

            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
             <a href="{{ route('index', ['view' => 'procedures.index']) }}">
              <div class="card card-hover">
                <div class="box bg-danger text-center">
                  <h1 class="font-light text-white">
                    <i class="fas fa-pencil-alt"></i>
                  </h1>
                  <h4 class="text-white">خصومات / مكافأت</h4>
                </div>
              </div>
             </a>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
             <a href="{{ route('index', ['view' => 'attendance.index']) }}">
              <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light text-white">
                    <i class=" far fa-id-card"></i>
                  </h1>
                  <h4 class="text-white">حضور / انصراف</h4>
                </div>
              </div>
              </a>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- Sales chart -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-md-12">
                  <div class="row">
                    <!-- column -->
                    <div class="col-lg-6">
                      <table class="calendar" id="calendar">
                        <caption id="monthYear">April 2024</caption>
                        <thead>
                          <tr>
                            <th>السبت</th>
                            <th>الأحد</th>
                            <th>الإثنين</th>
                            <th>الثلاثاء</th>
                            <th>الأربعاء</th>
                            <th>الخميس</th>
                            <th>الجمعة</th>
                           </tr>
                        </thead>
                        <tbody id="calendarBody">
                          <!-- Calendar days will be generated here -->
                        </tbody>
                      </table>
                    </div>
                    <div class="col-lg-6">
                      <div class="row">
                        <div class="col-4">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-account fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1">2540</h5>
                            <small class="font-light">عدد الموظفين</small>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-cart fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1">9540</h5>
                            <small class="font-light">عدد المنتجات</small>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-car fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1">100</h5>
                            <small class="font-light">عدد المناديب</small>
                          </div>
                        </div>
                        <div class="col-6 mt-3">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-receipt fs-3 font-16"></i>
                            <h5 class="mb-0 mt-1">120</h5>
                            <small class="font-light">عدد العروض</small>
                          </div>
                        </div>
                        <div class="col-6 mt-3">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-currency-usd fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1">656</h5>
                            <small class="font-light">اجمالي المبيعات</small>
                          </div>
                        </div>
                        <div class="col-12 mt-3">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-account-multiple fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1">2540</h5>
                            <small class="font-light">عدد العملاء</small>
                          </div>
                        </div>

                      </div>
                    </div>
                    <!-- column -->
                  </div>
            </div>
          </div>


@endsection
