<nav class="navbar navbar-expand-lg navbar-light bg-light">
   <a class="nav-logo " href="{{route('homepage')}}"><img class="logo" src="{{asset('site/imgs/logo.png')}}"></a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarText">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item active">
         @auth('client')
         <a class="nav-link " href="{{route('homepage')}}">الرئيسية   </a>
         @else
         <a class="nav-link " href="{{route('loginsite')}}">الرئيسية   </a>
         @endauth
         <span class="test"></span>



       </li>

       <li class="nav-item">
         @auth('client')
         <a class="nav-link border-left" href="{{route('allarticles')}}">المقالات</a>
         @else
         <a class="nav-link border-left" href="{{route('loginsite')}}">المقالات</a>
         @endauth
       </li>
       <li class="nav-item">
         @auth('client')
           <a class="nav-link border-left" href="{{route('donations')}}">طلبات التبرع</a>
            @else
            <a class="nav-link border-left" href="{{route('loginsite')}}">طلبات التبرع</a>
            @endauth
         </li>
         <li class="nav-item">
           @auth('client')
             <a class="nav-link border-left" href="{{route('how_we_are')}}">من نحن</a>
            @else
            <a class="nav-link border-left" href="{{route('loginsite')}}">من نحن</a>
            @endauth
           </li>
           <li class="nav-item">
             @auth('client')
               <a class="nav-link border-left" href="{{route('setting')}}">اتصل بنا </a>
               @else
               <a class="nav-link border-left" href="{{route('loginsite')}}">اتصل بنا</a>
               @endauth
             </li>

     </ul>
     <span class="navbar-text">
     @auth('client')
     <span class="navbar-text">
      <a href="{{route('donationrequest')}}"><button class="btn login-btn shadow">طلب تبرع</button></a>
     </span>
     @else
      <a  class="new-account"href="{{route('register')}}">انشاء حــساب جديد</a>
      <a href="{{route('loginsite')}}"><button class="btn login-btn shadow">دخول</button></a>
      @endauth
     </span>
   </div>
 </nav>
