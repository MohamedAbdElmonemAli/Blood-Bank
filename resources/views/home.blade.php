@extends('layouts.app')
@inject('client','App\Models\Client')
@inject('user','App\User')
@inject('cities','App\Models\City')
@inject('posts','App\Models\Post')
@inject('categories','App\Models\Category')
@inject('governorates','App\Models\Governorate')
@inject('donationrequests','App\Models\DonationRequest')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>بنك الدم</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="{{url('admin/home')}}">الصفحه الرئيسية<i class="fab fa-dashcube"></i></a></li>
          <li class="breadcrumb-item active">بنك الدم</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="card">

    <div class="card-body">
      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif

      تم تسجيل دخولك بنجاح
    </div>
    <!-- /.card-body -->

    <!-- /.card-footer-->
  </div>
  <div class="row">
         <div class="col-12 col-sm-6 col-md-3">
           <div class="info-box mb-3">
             <span class="info-box-icon  bg-dark elevation-1"><a href="{{url(route('client.index'))}}" class="nav-link">
               <i class="fas fa-users"></i></a></span>

             <div class="info-box-content">
               <span class="info-box-text">العملاء</span>
               <span class="info-box-number">
                {{($client->count())}}
               </span>
             </div>
             <!-- /.info-box-content -->
           </div>
           <!-- /.info-box -->
         </div>
         <div class="col-12 col-sm-6 col-md-3">
           <div class="info-box mb-3">
             <span class="info-box-icon bg-info elevation-1"><a href="{{url(route('user.index'))}}" class="nav-link">
               <i class="fas fa-user-plus"></i></a></span>

             <div class="info-box-content">
               <span class="info-box-text">المستخدمين</span>
               <span class="info-box-number">
                {{($user->count())}}
               </span>
             </div>
             <!-- /.info-box-content -->
           </div>
           <!-- /.info-box -->
         </div>
         <!-- /.col -->
         <div class="col-12 col-sm-6 col-md-3">
           <div class="info-box mb-3">
             <span class="info-box-icon bg-danger elevation-1"><a href="{{url(route('donationrequests.index'))}}" class="nav-link">
               <i class="fas fa-bell"></i></a></span>

             <div class="info-box-content">
               <span class="info-box-text">طلبات التبرع</span>

               <span class="info-box-number"> {{($donationrequests->count())}}</span>
             </div>
             <!-- /.info-box-content -->
           </div>
           <!-- /.info-box -->
         </div>
         <!-- /.col -->

         <!-- fix for small devices only -->
         <div class="clearfix hidden-md-up"></div>

         <div class="col-12 col-sm-6 col-md-3">
           <div class="info-box mb-3">
             <span class="info-box-icon bg-success elevation-1"><a href="{{url(route('city.index'))}}" class="nav-link">
               <i class="fas fa-city"></i></a></span>

             <div class="info-box-content">
               <span class="info-box-text">المدن</span>
               <span class="info-box-number">{{$cities->count()}}</span>
             </div>
             <!-- /.info-box-content -->
           </div>
           <!-- /.info-box -->
         </div>
         <!-- /.col -->
         <div class="col-12 col-sm-6 col-md-3">
           <div class="info-box mb-3">
             <span class="info-box-icon bg-warning elevation-1"><a href="{{url(route('post.index'))}}" class="nav-link">
               <i class="fas fa-file"></i></a></span>

             <div class="info-box-content">
               <span class="info-box-text">المقالات</span>
               <span class="info-box-number">{{$posts->count()}}</span>
             </div>
             <!-- /.info-box-content -->
           </div>
           <!-- /.info-box -->
         </div>
         <div class="col-12 col-sm-6 col-md-3">
           <div class="info-box mb-3">
             <span class="info-box-icon bg-secondary elevation-1"><a href="{{url(route('governorate.index'))}}" class="nav-link">
               <i class="fas fa-university"></i></a></span>

             <div class="info-box-content">
               <span class="info-box-text">المحافظات</span>
               <span class="info-box-number">{{$governorates->count()}}</span>
             </div>
             <!-- /.info-box-content -->
           </div>
           <!-- /.info-box -->
         </div>
         <div class="col-12 col-sm-6 col-md-3">
           <div class="info-box mb-3">
             <span class="info-box-icon bg-primary elevation-1"><a href="{{url(route('category.index'))}}" class="nav-link">
               <i class="fas fa-file-alt"></i></a></span>

             <div class="info-box-content">
               <span class="info-box-text">الأقسام</span>
               <span class="info-box-number">{{$categories->count()}}</span>
             </div>
             <!-- /.info-box-content -->
           </div>
           <!-- /.info-box -->
         </div>
         <!-- /.col -->
       </div>
  <!-- Default box -->

  <!-- /.card -->

</section>

@endsection
