@extends('layouts.app')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>الإعدادات</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="{{url('home')}}">الصفحه الرئيسية<i class="fab fa-dashcube"></i></a></li>
          <li class="breadcrumb-item active">الإعدادات</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">


  <!-- Default box -->
  <div class="card">
    <div class="card-header">

      <div class="card-tools float-sm-left">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>

    <div class="card-body">
      @include('flash::message')

      <article class="col-lg-9">
      <div class="col-md-1"></div>
    	   <div class="col-md-10">

		      <div class="panel panel-info">
		      <div class="panel-heading"></div>
          @foreach($rules as $rule)
		      <div class="panel-body">

		        <div class="col-md-9">

		        	<p><b>حول التطبيق : {{$rule->about_app}}</b></p>
		        	<p><b>الهاتف : {{$rule->phone}}</b></p>
		        	<p><b>البريد الإلكتروني : {{$rule->email}}</b></p>
		        	<p><b>روابط التواصل : <a href="{{$rule->fb_link}}" target="_blank" style="margin: 0 5px; color: #48759C;" ><i class="fab fa-facebook-square fa-lg"></i></a>
                    <a href="{{$rule->tw_link}}" target="_blank" style="margin: 0 5px; color: #49C8DE;" ><i class="fab fa-twitter-square fa-lg"></i></a>
                    <a href="{{$rule->ins_link}}" target="_blank"  style="margin: 0 5px; color: #DE5849;"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="{{$rule->yt_link}}" target="_blank" style="margin: 0 5px; color: red;"><i class="fab fa-youtube fa-lg"></i></a>
                    <a href="{{$rule->whats_link}}" target="_blank" style="margin: 0 5px; color: green;" ><i class="fab fa-whatsapp fa-lg"></i></a>
                    <a href="{{$rule->google_link}}" target="_blank" style="margin: 0 5px; color:blue;"><i class="fab fa-google fa-lg"></i></a>
                  </b></p>
		        </div>

		        <div class="col-md-12">
		        	<hr/>
		        	<p><b>تعديل البيانات :</b></p>
              <a href="{{url(route('setting.edit',$rule->id))}}" class="btn btn-danger pull-left"><i class="fas fa-edit"></i> تعديل البيانات</a>
		        </div>
		      </div>
           @endforeach
		      </div>
		    </div>
</article>


  </div>

  <!-- /.card -->

</section>

@endsection
