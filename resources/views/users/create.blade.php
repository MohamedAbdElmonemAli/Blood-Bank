@extends('layouts.app')
@inject('model','App\User')
@inject('roles','App\Models\Role')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>إنشاء مستخدم</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="{{url('home')}}">الصفحه الرئيسية<i class="fab fa-dashcube"></i></a></li>
          <li class="breadcrumb-item active">إنشاء مستخدم</li>
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
      'action'=>'UserController@store'
      ]) !!}
      <div class="form-group">
         <label for="name">الإسم</label>
         {!! Form::text('name',null,[
         'class'=>'form-control col-sm-5',
         'placeholder'=>'Username'
         ]) !!}
      </div>
      <div class="form-group">
         <label for="email">البريد الإلكتروني</label>
         {!! Form::email('email',null,[
         'class'=>'form-control col-sm-5',
         'placeholder'=>'Email'
         ]) !!}
      </div>
      <div class="form-group">
         <label for="password">كلمه المرور</label>
         {!! Form::password('password',[
         'class'=>'form-control col-sm-5',
         'placeholder'=>'Password'
         ]) !!}
      </div>
      <div class="form-group">
         <label for="password_confirmation">تأكيد كلمه المرور</label>
         {!! Form::password('password_confirmation',[
         'class'=>'form-control col-sm-5',
         'placeholder'=>'Password_Confirmation'
         ]) !!}
      </div>
      <div class="form-group">
          <label for="roles_list">رتبه المستخدمين</label>
          {!!Form::select('roles_list',$roles->pluck('display_name','id')->toArray(),null,[
          'class' => 'form-control col-sm-5','placeholder'=>'من فضلك اختار الرتبه'
          ])!!}
      </div>
      <div class="form-group">
        <button class="btn btn-info" type="submit">حفظ</button>
      </div>

    {!! Form::close() !!}
    </div>

  </div>
  <!-- /.card -->

</section>

@endsection
