<header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin5">
          <a onclick="login();"
            class="nav-toggler waves-effect waves-light d-block d-md-none"
            href="javascript:void(0)"
            ><i class="mdi mdi-logout" style="font-size: 20px;"></i></a>
            <a 
            class="nav-toggler waves-effect waves-light d-block d-md-none"
            href="javascript:void(0)"
            ><i style="visibility: hidden;" class="mdi mdi-bell" style="font-size: 20px;"></i></a>
           

            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="#">
              

              <!-- Logo icon -->
              <!--End Logo icon -->
              <!-- Logo text -->
              <span class="logo-text ms-2">
                <!-- dark Logo text -->
                <img
                  src="{{ asset('assets/images/logo-text.png') }}"
                  alt="homepage"
                  class="light-logo"
                  width="120"
                  style="visibility: hidden;"
                />
              </span>
              <!-- Logo icon -->
              <!-- <b class="logo-icon"> -->
              <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
              <!-- Dark Logo icon -->
              <!-- <img src="../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

              <!-- </b> -->
              <!--End Logo icon -->
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->

            <a  onclick="toggleSidebarVisibility();"
              class="nav-toggler waves-effect waves-light d-block d-md-none"
              href="javascript:void(0)"
              ><i class="ti-menu ti-close"></i></a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <div
            class="navbar-collapse collapse"
            data-navbarbg="skin5"
          >
          <li class="nav-item d-none d-lg-block">
            <a
              class="nav-link sidebartoggler waves-effect waves-light text-white"
              href="javascript:void(0)"
              data-sidebartype="mini-sidebar"
              ><i class="mdi mdi-menu font-24"></i
            ></a>
          </li>

            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-start me-auto" style="visibility: hidden;">
            </ul>
              <!-- ============================================================== -->
              <!-- Search -->
              <!-- ============================================================== -->
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-end">
              <!-- ============================================================== -->
              <!-- Comment -->
              <!-- ============================================================== -->
              <li dir="ltr" class="nav-item dropdown" id="timeDropdown" style="color: white; font-weight: bold; margin-left: 20px; margin-top: 21px;">
              </li>
              <li style="visibility: hidden;" class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <i class="mdi mdi-bell font-24"></i>
                </a>
              </li>
              
              <li     
              class="" 
              style="transform: rotate(180deg); margin-bottom:14px; margin-left:12px; color: #d2d4d5; cursor:pointer;"
              onclick="login();"
              onmouseover="this.style.color='#ffffff';"
              onmouseout="this.style.color='#d2d4d5';"
              >


                  <a
                  href="#"
                      style="color: #d2d4d5;"
                      class=""
                      
                      id="logout-link"
                      role=""
                      data-bs-toggle=""
                      aria-expanded="false"
                      onmouseover="this.style.color='#ffffff';"
                      onmouseout="this.style.color='#d2d4d5';"
                  >
                  </a>
                  
                  <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">
                  @csrf
                  <button type="submit">Logout</button>
              </form>

                  <i class="mdi mdi-logout font-24"></i>
                </a>
              </li>

              <!-- ============================================================== -->
              <!-- End Comment -->
              <!-- ============================================================== -->

            </ul>
          </div>
        </nav>
      </header>

      
      <script>
        function login(){
            // Show the form and submit it
            document.getElementById('logout-form').submit();
        }
    </script>
