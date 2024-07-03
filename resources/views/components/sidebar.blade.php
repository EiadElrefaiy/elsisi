<aside class="left-sidebar" data-sidebarbg="skin5">
    <div style="flex: 1; height: 100vh; background-color: #1f262d;">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
              <li class="sidebar-item text-center">
                <a style="padding: 1px;" href="{{ route('edit', ['view' => auth()->check() ? 'management.edit' : 'representatives.edit' , 'table' => auth()->check() ? 'users' : 'representatives' , 'id' => auth()->check() ? auth()->user()->id : Auth::guard('representative')->user()->id ]) }}" aria-expanded="false">
                  <div class="admin-picture">
                  @php
                    $hide = '';
                    if(Auth::guard('representative')->check()){
                      $hide = 'hide';
                    }
                  @endphp

              @if(auth()->check())
                  @if(auth()->user()->image)
                      <img src="{{ asset(auth()->user()->image) }}" alt="User Picture">
                  @else
                      <img src="{{ asset('assets/images/businessman.png') }}" alt="User Picture">
                  @endif
                
                @else
                <img src="{{ asset('assets/images/businessman.png') }}" alt="User Picture">
              @endif
              </div>
              
               </a>
              @if(auth()->check())
                @if(auth()->user()->position == 1)
                <p class="admin-role" style="color: #a4a7ac;">الادمن</p>
                @else
                <p class="admin-role" style="color: #a4a7ac;">المشرف</p>
                @endif
              @else
              <p class="admin-role" style="color: #a4a7ac;">مندوب شحن</p>
              @endif

              </li>
              <hr>
              <li class="sidebar-item {{$hide}}">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/"
                  aria-expanded="false"
                  ><i class="mdi mdi-home"></i
                  ><span class="hide-menu">الرئبسية</span></a
                >
              </li>
              <li class="sidebar-item {{$hide}}">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{ route('index', ['table' => 'users', 'view' => 'management.index']) }}"
                  aria-expanded="false"
                  ><i class="mdi mdi-certificate"></i
                  ><span class="hide-menu">الادارة</span></a
                >
              </li>

              <li class="sidebar-item {{$hide}}">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{ route('index', ['table' => 'employees', 'view' => 'employees.index']) }}"
                  aria-expanded="false"
                  ><i class="mdi mdi-desktop-mac"></i
                  ><span class="hide-menu">الموظفين</span></a
                >
              </li>

              <li class="sidebar-item {{$hide}}">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{ route('index', ['table' => 'clients', 'view' => 'clients.index']) }}"
                  aria-expanded="false"
                  ><i class="mdi mdi-account-multiple"></i
                  ><span class="hide-menu">العملاء</span></a
                >
              </li>

              <li class="sidebar-item {{$hide}}">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{ route('index', ['table' => 'suppliers', 'view' => 'suppliers.index']) }}"
                  aria-expanded="false"
                  ><i class="fas fa-handshake"></i
                  ><span class="hide-menu">الموردين</span></a
                >
              </li>

              <li class="sidebar-item {{$hide}}">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{ route('index', ['table' => 'representatives', 'view' => 'representatives.index']) }}"
                  aria-expanded="false"
                  ><i class="mdi mdi-car"></i
                  ><span class="hide-menu">المناديب</span></a
                >
              </li>
              <li class="sidebar-item {{$hide}}">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{ route('index', ['table' => 'products', 'view' => 'products.index']) }}"
                  aria-expanded="false"
                  ><i class="mdi mdi-cart"></i
                  ><span class="hide-menu">المنتجات</span></a
                >
              </li>
              <li class="sidebar-item {{$hide}}">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{ route('index', ['table' => 'offers', 'view' => 'offers.index']) }}"
                  aria-expanded="false"
                  ><i class="mdi mdi-receipt"></i
                  ><span class="hide-menu">العروض</span></a
                >
              </li>


              @if(Auth::guard('representative')->check())
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{ route('index', ['table' => 'delivery', 'view' => 'delivery.index']) }}"
                  aria-expanded="false"
                  ><i class="mdi mdi-car"></i
                  ><span class="hide-menu">الشحن</span></a
                >
              </li>
              @endif

              @if(Auth::guard('representative')->check())
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{ route('index', ['table' => 'returns', 'view' => 'returns.index']) }}"
                  aria-expanded="false"
                  ><i class="mdi mdi-keyboard-return"></i
                  ><span class="hide-menu">المرتجعات</span></a
                >
              </li>
              @endif

              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{ route('index', ['table' => 'money', 'view' => 'money.index']) }}"
                  aria-expanded="false"
                  ><i class="mdi mdi-currency-usd"></i
                  ><span class="hide-menu">الحسابات</span></a
                >
              </li>


            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
       </div>
      </aside>
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Left Sidebar mobile - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <aside class="left-sidebar mobile" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
              <li class="sidebar-item text-right" style="position: absolute; top: 35px; right: 20px;">
                <a style="padding: 1px;" onclick="toggleSidebarVisibilityMobile();" aria-expanded="false" class="nav-toggler waves-effect waves-light d-block d-md-none"
                href="javascript:void(0)">
                  <i class="ti-menu ti-close text-white" style="color: #a5a8ab;"></i>
                 </a>
              </li>
              <li class="sidebar-item text-center">
              <a style="padding: 1px;" href="{{ route('edit', ['view' => auth()->check() ? 'management.edit' : 'representatives.edit' , 'table' => auth()->check() ? 'users' : 'representatives' , 'id' => auth()->check() ? auth()->user()->id : Auth::guard('representative')->user()->id ]) }}" aria-expanded="false">
                  <div class="admin-picture">
                  @if(auth()->check())
                  @if(auth()->user()->image)
                      <img src="{{ asset(auth()->user()->image) }}" alt="User Picture">
                  @else
                      <img src="{{ asset('assets/images/businessman.png') }}" alt="User Picture">
                  @endif
                
                @else
                <img src="{{ asset('assets/images/businessman.png') }}" alt="User Picture">
              @endif
                  </div>
                </a>
                <p class="admin-role" style="color: #a4a7ac;">المشرف</p>
              </li>
              <hr>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/"
                  aria-expanded="false"
                  ><i class="mdi mdi-home"></i
                  ><span class="hide-menu">الرئيسية</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{ route('index', ['table' => 'users', 'view' => 'management.index']) }}"
                  aria-expanded="false"
                  ><i class="mdi mdi-certificate"></i
                  ><span class="hide-menu">الادارة</span></a
                >
              </li>

              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{ route('index', ['table' => 'employees', 'view' => 'employees.index']) }}"
                  aria-expanded="false"
                  ><i class="mdi mdi-desktop-mac"></i
                  ><span class="hide-menu">الموظفين</span></a
                >
              </li>

              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{ route('index', ['table' => 'clients', 'view' => 'clients.index']) }}"
                  aria-expanded="false"
                  ><i class="mdi mdi-account-multiple"></i
                  ><span class="hide-menu">العملاء</span></a
                >
              </li>

              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{ route('index', ['table' => 'suppliers', 'view' => 'suppliers.index']) }}"
                  aria-expanded="false"
                  ><i class="fas fa-handshake"></i
                  ><span class="hide-menu">الموردين</span></a
                >
              </li>

              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{ route('index', ['table' => 'representatives', 'view' => 'representatives.index']) }}"
                  aria-expanded="false"
                  ><i class="mdi mdi-car"></i
                  ><span class="hide-menu">المناديب</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{ route('index', ['table' => 'products', 'view' => 'products.index']) }}"
                  aria-expanded="false"
                  ><i class="mdi mdi-cart"></i
                  ><span class="hide-menu">المنتجات</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{ route('index', ['table' => 'offers', 'view' => 'offers.index']) }}"
                  aria-expanded="false"
                  ><i class="mdi mdi-receipt"></i
                  ><span class="hide-menu">العروض</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{ route('index', ['table' => 'money', 'view' => 'money.index']) }}"
                  aria-expanded="false"
                  ><i class="mdi mdi-currency-usd"></i
                  ><span class="hide-menu">الحسابات</span></a
                >
              </li>
            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
