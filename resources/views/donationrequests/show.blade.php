@extends('layouts.app')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>تفاصيل الطلب</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="{{url('home')}}">الصفحه الرئيسية<i class="fab fa-dashcube"></i></a></li>
          <li class="breadcrumb-item active">تفاصيل الطلب</li>
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

		      <div class="panel-body">

		        <div class="col-md-9">

		      <p><b style="color:#48759C;">الإسم : </b><b>{{$rules->name}}</b></p>
              <p><b style="color:#48759C;">العمر : </b><b>{{$rules->age}}</b></p>
		      <p><b style="color:#48759C;">الهاتف : </b><b>{{$rules->phone}}</b></p>
              <p><b style="color:#48759C;">إسم المستشفي : </b><b>{{$rules->hospital_name}}</b></p>
              <p><b style="color:#48759C;">عنوان المستشفي : </b><b>{{$rules->hospital_address}}</b></p>
              <p><b style="color:#48759C;">العميل : </b><b>{{optional($rules->client)->name}}</b></p>
              <p><b style="color:#48759C;">المدينه : </b><b>{{optional($rules->city)->name}}</b></p>
              <p><b style="color:#48759C;">فصيله الدم : </b><b>{{optional($rules->bloodtype)->name}}</b></p>
		      <p><b style="color:#48759C;">عدد الأكياس : </b><b>{{$rules->bags_num}}</b></p>
              <p><b style="color:#48759C;">الملاحظات : </b><b>{{$rules->notes}}</b></p>
		        </div>


		      </div>

           <div class="col-md-12">
             <hr/>
             <a href="{{url(route('donationrequests.index'))}}" class="btn btn-primary pull-left"> عوده للخلف <i class="fas fa-backward"></i></a>
           </div>
		      </div>
		    </div>
</article>


  </div>

  <!-- /.card -->

</section>

@endsection
