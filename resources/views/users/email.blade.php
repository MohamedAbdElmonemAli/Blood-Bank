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
  <link rel="stylesheet" href="{{asset('dist/css/persian-datepicker.min.css')}}">


  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="hold-transition login-page">
<!-- Main content -->

  <div class="login-box">
      <div class="login-logo">
          <a href="{{ url('login') }}"><b>Blood</b>Bank</a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
          <p class="login-box-msg">Forget Password</p>
          @if(session()->has('success'))
              <div class="alert alert-success">
                  <h1>{{ session('success') }}</h1>
              </div>
          @endif
          <div class="card">
            <div class="card-body login-card-body">
          <form method="POST" action="{{ route('postResetPassword') }}">
              @csrf
  ​
              <div class="form-group row">
                  <label for="email" class="col-md-6 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
  ​
                  <div class="col-md-12">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
  ​
                  {{--@error('email')--}}
                  {{--<span class="invalid-feedback" role="alert">--}}
                  {{--<strong>{{ $message }}</strong>--}}
                  {{--</span>--}}
                  {{--@enderror--}}
                  </div>
              </div>
  ​
              <div class="row">
                  <!-- /.col -->
                  <div class="col-xs-4">
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Reset</button>
                  </div>
                  <!-- /.col -->
              </div>
          </form>
          <a href="{{ url('login') }}">Sign In</a>
        </div>
      </div>
  ​
          <!-- /.social-auth-links -->
  ​

  ​
</div>
      </div>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('dist/js/persian-datepicker.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>



</body>
</html>
