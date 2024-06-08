<!DOCTYPE html>
<html>
<head>
    @php
        App::setLocale(Auth::user()->lang);
    @endphp
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="custdisplay" content="{{ Auth::user()->display }}">
  <title>{{ env('APP_NAME', 'TechBirds Solutions')}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="{{asset(env('Logo', 'logo/techbird/logo.png'))}}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
    <!-- shortcut -->
    <script src="{{asset('plugins/shortcut/shortcut.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    {{-- daterangepicker.css --}}
<script src="{{asset('plugins/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>

    <script>
        var dataTable = null;
        startshow();
        function startshow() {
            $('#loding').show();
        }

    </script>
@laravelPWA
</head>
<body class="hold-transition sidebar-mini layout-footer-fixed layout-fixed">

<style>
    .view{

        margin:0 auto;
        /* position:absolute; */
        /* background: black; */
        /* opacity: 0.5; */
        height: 100vh;
        width: 100%;
        z-index: 1000;

    }
    .viwein{
        padding-top: 50vh;
        width: 100%;
        text-align: center;
    }
</style>

<!-- Site wrapper -->
<div class="wrapper">
    <div class='container-fluid  h-100' style="position: absolute;background: black;opacity: 0.5;display: none;z-index: 1000;" id='loding'>
        <div class="view"  id='loding'>
            <div class="viwein"  style="opacity: 1;">
                <div class="spinner-grow text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-secondary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-success" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-danger" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-warning" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-info" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-light" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-dark" role="status">
                    <span class="sr-only">Loading...</span>
                </div>

            </div>
        </div>
    </div>
    <script>
        startshow();
        function startshow() {
            $('#loding').show();
        }

    </script>
    {{-- <div class='container-fluid  h-100' style="position: absolute;background: black;opacity: 0.5;display: none;z-index: 1000;" id='loding'>
        <div class="row h-100 justify-content-center align-items-center"  style="opacity: 1;">
            <div class="spinner-grow text-primary" role="status">
                <span class="sr-only">Loading...</span>
              </div>
              <div class="spinner-grow text-secondary" role="status">
                <span class="sr-only">Loading...</span>
              </div>
              <div class="spinner-grow text-success" role="status">
                <span class="sr-only">Loading...</span>
              </div>
              <div class="spinner-grow text-danger" role="status">
                <span class="sr-only">Loading...</span>
              </div>
              <div class="spinner-grow text-warning" role="status">
                <span class="sr-only">Loading...</span>
              </div>
              <div class="spinner-grow text-info" role="status">
                <span class="sr-only">Loading...</span>
              </div>
              <div class="spinner-grow text-light" role="status">
                <span class="sr-only">Loading...</span>
              </div>
              <div class="spinner-grow text-dark" role="status">
                <span class="sr-only">Loading...</span>
              </div>

        </div>
    </div> --}}

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button" id='minmenu'><i class="fas fa-bars"></i></a>
      </li>
      <li>
          <div id='temptimer'> </div>
      </li>

    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="mr-2 mt-2 text-primary" style="cursor: pointer;" data-toggle="dropdown" onclick="window.location='{{ url('/users/show') }}'" title="Profile">
            {{Auth::user()->fname.' '.Auth::user()->lname.' ('.Auth::user()->type.') '}}

            </a>
        </li>
        <li class="nav-item">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle mr-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-language" style="font-size: x-large;"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item @if(Auth::user()->lang=='en') active @endif" href="{{ url('/lang/en') }}">English</a>
                  <a class="dropdown-item @if(Auth::user()->lang=='si') active @endif" href="{{ url('/lang/si')}}">සිංහල</a>
                </div>
              </div>
          </li>
        <li class="nav-item">
            <span class="btn btn-success mr-2" data-toggle="dropdown" onclick="window.location='{{ url('/pos') }}'" title="Ctrl+9">
              <i class="fas fa-home" style="font-size: x-large;"></i>
            </span>
          </li>
        <li class="nav-item">
          <span class="btn btn-danger text-light" data-toggle="dropdown"
          onclick="$('#logout-form').submit();" title="Ctrl+0">
            <i class="fas fa-power-off" style="font-size: x-large;"></i>
        </span>
        </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/pos')}}" class="brand-link">
      <img src="{{asset(env('Logo', 'logo/techbird/logo.png'))}}"
           alt="SMS Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{env('APP_NAME', 'Student Management System')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{url('/payclassfee')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    {{__('language.nev.PayClassFee')}}
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('/enrollclass')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    {{__('language.nev.EnrollClass')}}
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('/attendance')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    {{__('language.nev.Attendance')}}
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('/expenses')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    {{__('language.nev.Expenses')}}
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('/students')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    {{__('language.nev.StudentManagement')}}
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('/classes')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    {{__('language.nev.ClassManagement')}}
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('/teachers')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    {{__('language.nev.TeachersManagement')}}
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('/users')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    {{__('language.nev.UserManagement')}}
                </p>
                </a>
            </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-boxes"></i>
              <p>
                {{__('language.nev.Report.Report')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/report/financial/full')}}" class="nav-link">
                  <i class="fas fa-dolly nav-icon"></i>
                  <p>{{__('language.nev.Report.FinancialFull')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/report/attendance/student')}}" class="nav-link">
                  <i class="fas fa-dolly nav-icon"></i>
                  <p>{{__('language.nev.Report.StudentAttendance')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/report/financial/salary')}}" class="nav-link">
                  <i class="fas fa-dolly nav-icon"></i>
                  <p>{{__('language.nev.Report.Salary')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/report/financial/class/fee')}}" class="nav-link">
                  <i class="fas fa-dolly nav-icon"></i>
                  <p>{{__('language.nev.Report.ClassFee')}}</p>
                </a>
              </li>



            </ul>
          </li>




        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.2
    </div>
    <strong>Copyright &copy; 2018-{{ now()->year }} <a href="http://techbirdssolutions.com/" target="_blank">TechBirds Solutions</a></strong>
            All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
<script src="{{asset('custom/timer/timer.js')}}"></script>
<script>

    shortcut.add("Ctrl+0",
        function(event) {
            event.preventDefault();
            $('#logout-form').submit();
        },
        { 'type':'keydown', 'propagate':true, 'target':document}
    );
    shortcut.add("Ctrl+9",
        function(event) {
            event.preventDefault();
            window.location="{{url('pos')}}";
        },
        { 'type':'keydown', 'propagate':true, 'target':document}
    );

    $(document).ready(function(){
        $(".nav-link").click(function(){
            $(window).trigger('resize');
        });
        $("#minmenu").click(function() {
            if(dataTable!=null){
                setTimeout(function () {
                    dataTable.columns.adjust();
                }, 300);
            }
        });
        $( window ).resize(function() {
            if(dataTable!=null){
                setTimeout(function () {
                    dataTable.columns.adjust();
                }, 300);
            }
        });
        //timer show
        // start_timer('#temptimer');
        setInterval(function(){
            $.get("{{url('/refreshcsrf')}}").done(function(data){
                $('meta[name="csrf-token"]').attr("content",data);
            });
        }, 300000);
        @if(Auth::user()->display!=null && Auth::user()->display!="")
            $.get('http://localhost:9091/display/clear?display={{Auth::user()->display}}').done(function(data){
                console.log(data);
            });
        @endif
    })


    window.addEventListener("load", function(){
        $('#loding').hide();
    });
    $(document).on("submit", "form", function(e){
        if(window.location.pathname!='/pos'){
            $('#loding').show();
        }

    });

</script>

</body>
</html>
