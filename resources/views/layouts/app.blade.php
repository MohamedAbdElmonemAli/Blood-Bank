<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>بنك الدم</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/bootstrap-rtl.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/custom-style.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-gray-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">

      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('admin/home')}}" class="nav-link">الصفحه الرئيسية</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url(route('contact.index'))}}" class="nav-link">اتصل بنا</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->

    <!-- Right navbar links -->

      <ul class="navbar-nav mr-auto ">
      <div class="pull-left">
          <a href="{{ route('logout') }}" style="color: white"
         onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
          <i class="btn btn-danger btn-sm"> تسجيل الخروج</i>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST"
            style="display: none;">
          {{ csrf_field() }}
      </form>
      </div>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('admin/home')}}" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.jpg')}}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">بنك الدم</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
                 <a href="{{url(route('governorate.index'))}}" class="nav-link">
                    <p>المحافظات</p> <i class="nav-icon fas fa-university"></i>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="{{url(route('city.index'))}}" class="nav-link">
                    <p>المدن</p>  <i class="nav-icon fas fa-city"></i>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="{{url(route('post.index'))}}" class="nav-link">
                      <p>المقالات</p>  <i class="fas fa-file"></i>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="{{url(route('category.index'))}}" class="nav-link">
                    <p>الأقسام</p>  <i class="fas fa-file-alt"></i>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="{{url(route('client.index'))}}" class="nav-link">
                     <p>العملاء</p>  <i class="fas fa-users"></i>
                 </a>
               </li>
                 <li class="nav-item">
                   <a href="{{url(route('user.index'))}}" class="nav-link">
                       <p>المستخدمين</p>  <i class="fas fa-user-plus"></i>
                   </a>
                 </li>
                 <li class="nav-item">
                 <a href="{{url(route('role.index'))}}" class="nav-link">
                    <p>رتب المستخدمين</p>  <i class="fas fa-user-tag"></i>
                 </a>
               </li>
               <li class="nav-item">
               <a href="{{url('admin/reset')}}" class="nav-link">
                  <p>تغيير كلمه المرور</p>  <i class="fas fa-unlock"></i>
               </a>
             </li>
                 <li class="nav-item">
                   <a href="{{url(route('donationrequests.index'))}}" class="nav-link">
                       <p>طلبات التبرع</p>  <i class="fas fa-bell"></i>
                   </a>
                 </li>
                <li class="nav-item">
                  <a href="{{url(route('setting.index'))}}" class="nav-link">
                      <p>الإعدادات</p>  <i class="fas fa-cogs"></i>
                  </a>
                </li>
                  <li class="nav-item">
                  <a href="{{url(route('contact.index'))}}" class="nav-link">
                      <p>اتصل بنا</p>  <i class="fas fa-phone"></i>
                  </a>
                </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->

@yield('content')
    <!-- Main content -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.0-rc.1
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/jquery/jquery.slim.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>

@stack('scripts')

</script>
</body>
</html>
