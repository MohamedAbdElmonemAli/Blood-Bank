@extends('website/layout/master')

@section('content')
@push('title')
إعاده تعيين كلمه السر
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
          <div class="row">
        <div class="col-md-12">
            <div class="article-content shadow">
                <p class="content">
                    <img  class="log-logo" src="{{asset('site/imgs/logo.png')}}">
                    <form method="POST" action="{{ route('postNewPassword') }}">
                        @csrf
                      <div class="form-group row" style="margin-bottom:0px;">​
                          <div class="col-md-12">
                              <input id="email" type="email" placeholder="البريد الإلكتروني" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
​
                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
​
                      <div class="form-group row" style="margin-bottom:0px;">​
                          <div class="col-md-12">
                              <input id="password" placeholder="كلمه السر" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
​
                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
​
                      <div class="form-group row" style="margin-bottom:0px;">​
                          <div class="col-md-12">
                              <input id="password-confirm" placeholder="تأكيد كلمه السر" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                          </div>
                      </div>
​
                        <div class="form-btns" style="margin-top:30px;">
                             <button type="submit" class="btn btn-login">إعاده تعيين كلمه السر </button>
                         </div>

                    </form>
            </div>
        </div>
          </div>
      </div>
</section>
@endsection
