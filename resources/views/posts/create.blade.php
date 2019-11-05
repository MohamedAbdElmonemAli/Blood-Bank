@extends('layouts.app')
@inject('model','App\Models\Post')
@inject('category','App\Models\Category')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>إنشاء مقال</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="{{url('home')}}">الصفحه الرئيسية<i class="fab fa-dashcube"></i></a></li>
          <li class="breadcrumb-item active">إنشاء مقال</li>
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
      'action'=>'PostController@store',
      'files' => true
      ]) !!}
      <div class="form-group">
         <label for="title">العنوان</label>
         {!! Form::text('title',null,[
         'class'=>'form-control col-sm-5'
         ]) !!}
      </div>
      <div class="form-group">
         <label for="content">المحتوي</label>
         {!! Form::textarea('content',null,[
         'class'=>'form-control col-sm-5'
         ]) !!}
      </div>
      <div class="form-group">
         <label for="file">الصوره</label>
         {!! Form::file('image',null,[
         'class'=>'form-control col-sm-5'
         ]) !!}
      </div>
      <div class="form-group">
          <label for="category_id">القسم</label>
          {!!Form::select('category_id',$category->pluck('name','id')->toArray(),null,[
              'class' => 'form-control col-sm-5','placeholder'=>'من فضلك أدخل القسم الخاص بالمقال'
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