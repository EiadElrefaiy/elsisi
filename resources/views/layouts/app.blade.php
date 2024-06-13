<!DOCTYPE html>
<html dir="rtl" lang="en">
  <head>
  <meta charset="utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="elsisi"
    />
    <meta
      name="description"
      content="elsisi"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>Elsisi</title>
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="{{URL::asset('assets/images/favicon.png')}}"
    />

    <link
    rel="stylesheet"
    type="text/css"
    href="{{URL::asset('assets/libs/select2/dist/css/select2.min.css')}}"
    />

    <link
    rel="stylesheet"
    type="text/css"
    href="{{URL::asset('assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}"
    />

    <!-- Bootstrap Timepicker CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css" rel="stylesheet">

    <!-- Bootstrap Timepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>

    <!-- Custom CSS -->
    <link href="{{URL::asset('assets/libs/flot/css/float-chart.css')}}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{URL::asset('dist/css/style.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('dist/css/app.css')}}" rel="stylesheet" />

        <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/6.9.96/css/materialdesignicons.min.css" rel="stylesheet" />
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
  <div class="preloader">
      <img src="{{URL::asset('assets/images/logo-text.png')}}">
  </div>
  <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->


      @include('components.headbar')



      <!-- ============================================================== -->
      <!-- End Topbar header -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->




      @include('components.sidebar')




      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="Pagewrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">







        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">



          @yield('content')


          <!-- ============================================================== -->
          <!-- Sales chart -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Recent comment and chats -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
          All Rights Reserved by EiadElrefaiy. Designed and Developed by
          <a href="https://www.facebook.com/eyadasem.elrefay">EiadElrefaiy</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>


    <script src="{{URL::asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="{{URL::asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="{{URL::asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
        <script src="{{URL::asset('assets/extra-libs/sparkline/sparkline.js')}}"></script>
        <!--Wave Effects -->
        <script src="{{URL::asset('dist/js/waves.js')}}"></script>
        <!--Menu sidebar -->
        <script src="{{URL::asset('dist/js/sidebarmenu.js')}}"></script>
        <!--Custom JavaScript -->
        <script src="{{URL::asset('dist/js/custom.min.js')}}"></script>
        <!-- This Page JS -->
        <script src="{{URL::asset('assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>
        <script src="{{URL::asset('dist/js/pages/mask/mask.init.js')}}"></script>
        <script src="{{URL::asset('assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
        <script src="{{URL::asset('assets/libs/select2/dist/js/select2.min.js')}}"></script>
        <script src="{{URL::asset('assets/libs/jquery-asColor/dist/jquery-asColor.min.js')}}"></script>
        <script src="{{URL::asset('assets/libs/jquery-asGradient/dist/jquery-asGradient.js')}}"></script>
        <script src="{{URL::asset('assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js')}}"></script>
        <script src="{{URL::asset('assets/libs/jquery-minicolors/jquery.minicolors.min.js')}}"></script>
        <script src="{{URL::asset('assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{URL::asset('assets/libs/quill/dist/quill.min.js')}}"></script>

        <script src="{{URL::asset('dist/js/pages/home.js')}}"></script>
        <script>
          $(".select2").select2();  
            /*colorpicker*/
            $(".demo").each(function () {
              //
              $(this).minicolors({
                control: $(this).attr("data-control") || "hue",
                position: $(this).attr("data-position") || "bottom left",

                change: function (value, opacity) {
                  if (!value) return;
                  if (opacity) value += ", " + opacity;
                  if (typeof console === "object") {
                    console.log(value);
                  }
                },
                theme: "bootstrap",
              });
            });
            /*datwpicker*/
            jQuery(".mydatepicker").datepicker();
            jQuery("#datepicker-autoclose").datepicker({
              autoclose: true,
              todayHighlight: true,
            });
            var quill = new Quill("#editor", {
              theme: "snow",
            });

            </script>
            
                <script>
                    // Example JavaScript code to manipulate the time input
                    document.getElementById('myTimePicker').addEventListener('change', function(event) {
                      // Do something when the value of the time input changes
                      console.log('Selected time:', event.target.value);
                    });
                </script>

                <script>
                    document.getElementById('uploadButton').addEventListener('click', function() {
                      document.getElementById('fileInput').click();
                  });

                  document.getElementById('fileInput').addEventListener('change', function() {
                      const file = this.files[0];
                      if (file) {
                          const reader = new FileReader();
                          reader.onload = function(e) {
                              document.getElementById('adminImage').src = e.target.result;
                          };
                          reader.readAsDataURL(file);
                      }
                  });
          </script>
