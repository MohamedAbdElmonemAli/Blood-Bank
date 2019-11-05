@extends('layouts.app')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>تعديل الإعدادات</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="{{url('home')}}">الصفحه الرئيسية<i class="fab fa-dashcube"></i></a></li>
          <li class="breadcrumb-item active">تعديل الإعدادات</li>
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
@include('partials.validationerrors')
    <div class="card-body ">
    {!! Form::model($model,[
      'action'=>['SettingController@update',$model->id],
      'method'=>'put'
      ]) !!}
      <div class="form-group">
         <label for="name">حول التطبيق</label>
         {!! Form::text('about_app',null,[
         'class'=>'form-control col-sm-5'
         ]) !!}
      </div>
      <div class="form-group">
         <label for="name">الهاتف</label>
         {!! Form::text('phone',null,[
         'class'=>'form-control col-sm-5'
         ]) !!}
      </div>
      <div class="form-group">
         <label for="name">البريد الإلكتروني</label>
         {!! Form::text('email',null,[
         'class'=>'form-control col-sm-5'
         ]) !!}
      </div>
      <div class="form-group">
         <label for="name"><i class="fab fa-facebook-square fa-lg" style="margin: 0 5px; color: #48759C;"></i></label>
         {!! Form::text('fb_link',null,[
         'class'=>'form-control col-sm-5'
         ]) !!}
      </div>
      <div class="form-group">
         <label for="name"><i class="fab fa-twitter-square fa-lg" style="margin: 0 5px; color: #49C8DE;"></i></label>
         {!! Form::text('tw_link',null,[
         'class'=>'form-control col-sm-5'
         ]) !!}
      </div>
      <div class="form-group">
         <label for="name"><i class="fab fa-instagram fa-lg" style="margin: 0 5px; color: #DE5849;"></i></label>
         {!! Form::text('ins_link',null,[
         'class'=>'form-control col-sm-5'
         ]) !!}
      </div>
      <div class="form-group">
         <label for="name"><i class="fab fa-youtube fa-lg" style="margin: 0 5px; color: red;"></i></label>
         {!! Form::text('yt_link',null,[
         'class'=>'form-control col-sm-5'
         ]) !!}
      </div>
      <div class="form-group">
         <label for="name"><i class="fab fa-whatsapp fa-lg " style="margin: 0 5px; color: green;"></i></label>
         {!! Form::text('whats_link',null,[
         'class'=>'form-control col-sm-5'
         ]) !!}
      </div>
      <div class="form-group">
         <label for="name"><i class="fab fa-google fa-lg" style="margin: 0 5px; color:blue;"></i></label>
         {!! Form::text('google_link',null,[
         'class'=>'form-control col-sm-5'
         ]) !!}
      </div>
      <div class="form-group">
        <button class="btn btn-info" type="submit">تعديل</button>
      </div>

    {!! Form::close() !!}
    </div>

  </div>
  <!-- /.card -->

</section>

@endsection
