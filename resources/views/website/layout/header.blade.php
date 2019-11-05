<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css"
    integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

   <!-- custom CSS -->
   <link rel="stylesheet" href="{{asset('site/css/owl.carousel.min.css')}}">
   <link rel=stylesheet href="{{asset('site/css/owl.theme.default.min.css')}}">
   <link rel="stylesheet" href="{{asset('site/css/hover-min.css')}}">
       <link rel="stylesheet" href="{{asset('site/css/style.css')}}">
       
     <!-- custom font -->
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">

    <title>@stack('title')</title>
  </head>
  <body>
     <!-- top nav section -->
    <section id="top-nav">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
              <div class="lang">
                  <span><a href="#" id="arabic">عربى</a></span>
                  <span><a href="#" id="en">EN</a></span>
                </div>
          </div>
          <div class="col-md-4">
           <div class="social-media">
              <i class="fab fa-facebook-f"></i>
              <i class="fab fa-instagram"></i>
              <i class="fab fa-twitter"></i>
              <i class="fab fa-whatsapp"></i>

           </div>

          </div>
          <div class="col-md-6">
              <div class="contact">
                  @auth('client')
                  <p class="email"> {{auth()->guard('client')->user()->email}}</p>
                  <i class="fas fa-envelope-square email "></i>
                  <p class="phone">   {{auth()->guard('client')->user()->phone}}</p>
                  <i class="fas fa-phone-volume phone hvr-buzz"></i>
                  <a href="{{route('logoutsite')}}"><button class="btn login-btn btn-sm col-md-1">خروج</button></a>
                  @else
                  <span class="navbar-text">
                   <a  class="new-account2"href="{{route('register')}}">انشاء حــساب جديد</a>
                   <a href="{{route('loginsite')}}"><button class="btn login-btn">دخول</button></a>
                   </span>
                   @endauth
                </div>

            </div>
        </div>

      </div>
    </section>
