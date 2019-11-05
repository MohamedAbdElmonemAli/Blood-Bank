@extends('website/layout/master')

@section('content')
@push('title')
البريد الإلكتروني
@endpush

     <!-- breedcrumb-->

      <section id="breedcrumb">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                             <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="Home.html">الرئيسية</a></li>
                              <li class="breadcrumb-item active" aria-current="page">إعاده تعيين كلمه السر </li>
                            </ol>
                          </nav>

              </div>
          </div>
          <div class="login-box">
                  <div class="card">
                    <div class="card-body login-card-body">
                  <form method="POST" action="{{ route('postResetPassword') }}">
                      @csrf
          ​
                      <div class="form-group row" style="margin-top:50px;">          ​
                          <div class="col-md-12">
                              <input id="email" type="email" placeholder="البريد الإلكتروني" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          ​
                          {{--@error('email')--}}
                          {{--<span class="invalid-feedback" role="alert">--}}
                          {{--<strong>{{ $message }}</strong>--}}
                          {{--</span>--}}
                          {{--@enderror--}}
                          </div>
                      </div>
    ​              <div class="form-btns" style="margin-top:0px;">
                      <button type="submit" class="btn btn-login">إعاده تعيين كلمه السر </button>
                      <a href="{{ route('loginsite') }}" class="btn btn-new">دخول </a>
                  </div>

                  </form>
                </div>
              </div>
        </div>
              </div>
</section>
@endsection
