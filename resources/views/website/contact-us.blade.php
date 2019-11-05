@extends('website/layout/master')

@section('content')
@push('title')
اتصل بنا
@endpush

      <section id="breedcrumb">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="Home.html">الرئيسية</a></li>
                              <li class="breadcrumb-item active " aria-current="page">تواصل معنا  </li>
                            </ol>
                          </nav>

              </div>
          </div>
          <div class="row some-breathing-room">

            <div class="col-md-6">
              @foreach($settings as $setting)
                <div class="call-us-div shadow">
                    <div class="div-bg"><p>اتصل بنا </p></div>
                    <img class="logo-in-call" src="{{asset('site/imgs/logo.png')}}">
                    <hr class="line">
                    <ul class="list-call">
                      <li>حول التطبيق:{{$setting->about_app}}</li>
                        <li>الجوال:{{$setting->phone}}</li>
                        <li>البريد الاكتروني :{{$setting->email}}</li>
                    </ul>
                    <p class="call-us-head2">تواصل معنا</p>
                    <div class="social-icons">
                            <a href="{{$setting->fb_link}}" target="_blank"><i class="fab fa-facebook-square hvr-forward"></i></a>
                            <a href="{{$setting->tw_link}}" target="_blank"><i class="fab fa-twitter-square hvr-forward"></i></a>
                            <a href="{{$setting->yt_link}}" target="_blank"><i class="fab fa-youtube-square hvr-forward"></i></a>
                            <a href="{{$setting->google_link}}" target="_blank"><i class="fab fa-google-plus-square hvr-forward"></i></a>
                            <a href="{{$setting->whats_link}}" target="_blank"><i class="fab fa-whatsapp-square hvr-forward"></i></a>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="col-md-6">
                    <div class="call-us-div shadow">
                            <div class="div-bg"><p>اتصل بنا </p></div>
        @include('flash::message')
        @include('partials.validationerrors')

          {!! Form::open([
           'action'=>['Front\MainController@contact'],
           'method'=>'post'
           ]) !!}
            <div class="form-group some-space">

                    <input type="text" name="name" class="form-control"  placeholder="الاسم">

                  </div>
            <div class="form-group">

              <input type="email" name="email" class="form-control"  placeholder="البريد الاكتروني">

            </div>
            <div class="form-group">

                    <input type="text" name="phone" class="form-control" placeholder="الجوال">

                  </div>
                  <div class="form-group">

                        <input type="text" name="subject" class="form-control" placeholder="عنوان الرساله">

                      </div>
                      <div class="form-group">

                        <textarea class="form-control" name="message"  placeholder="نص الرساله" rows="3"></textarea>
                        <small  class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
            <button type="submit" class="btn btn-send-call hvr-float">ارسال</button>
          {!! Form::close() !!}


              </div>

  </div>


</div>
</div>
</section>
@endsection
