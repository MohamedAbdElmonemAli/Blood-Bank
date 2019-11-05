@extends('website/layout/master')

@section('content')
@push('title')
تسجيل الدخول
@endpush

     <!-- breedcrumb-->

      <section id="breedcrumb">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="Home.html">الرئيسية</a></li>
                              <li class="breadcrumb-item active" aria-current="page">تسجيل الدخول </li>
                            </ol>
                          </nav>

              </div>
          </div>
          <div class="row">
        <div class="col-md-12">
            <div class="article-content shadow">
                <p class="content">
                    <img  class="log-logo" src="{{asset('site/imgs/logo.png')}}">
                    {!! Form::open([
                      'action' => ['Front\AuthController@login'],
                      'method' => 'post'
                      ]) !!}
                            <div class="form-group">
                              <input type="text" id="phone" class="form-control" name="phone"  placeholder="الجوال">
                            </div>
                            <div class="form-group">
                              <input type="password" id="password" class="form-control" name="password" placeholder="كلمة المرور">
                            </div>
                            <div class="form-check ">
                              <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                <input type="checkbox" name="remember" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label" for="customControlInline">تذكرني</label>
                              </div>
                            </div>
                            @if (Route::has('password.request'))
                            <div class="did-u-forget clearfix">
                              <a class="forget-pass" href="{{ route('postResetPassword') }}"><p class="forget ">هل نسيت كلمة المرور</p></a>
                              <img class="complian forget"src="{{asset('site/imgs/complain.png')}}">
                             </div>
                               @endif
                             @include('flash::message')
                            <div class="form-btns">
                            <button type="submit" class="btn btn-login">دخول </button>
                            <a href="{{route('register')}}" class="btn btn-new">انشاء حساب جديد </a>
                        </div>
                    {!! Form::close() !!}
            </div>
        </div>
          </div>
      </div>
</section>
@endsection
