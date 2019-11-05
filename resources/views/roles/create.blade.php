@extends('layouts.app')
@inject('perm','App\Models\Permission')
@inject('model','App\Models\Role')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>إنشاء رتبه</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="{{url('home')}}">الصفحه الرئيسية<i class="fab fa-dashcube"></i></a></li>
          <li class="breadcrumb-item active">إنشاء رتبه</li>
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
      'action'=>'RoleController@store'
      ]) !!}
      <div class="form-group">
         <label for="name">الإسم</label>
         {!! Form::text('name',null,[
         'class'=>'form-control col-sm-5'
         ]) !!}
      </div>
      <div class="form-group">
         <label for="display_name">الإسم المعروض</label>
         {!! Form::text('display_name',null,[
         'class'=>'form-control col-sm-5'
         ]) !!}
      </div>
      <div class="form-group">
         <label for="description">الوصف</label>
         {!! Form::textarea('description',null,[
         'class'=>'form-control col-sm-5'
         ]) !!}
      </div>
      <div class="form-group">
         <label for="name">الإذن</label>
       </br>
       <input id="select-all" type="checkbox"><label for='select-all'>إختيار الكل</label>
            <div class="row">
              @foreach($perm->all() as $permission)
              <div class="col-sm-3">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="permission_list[]" value="{{$permission->id}}">{{$permission->display_name}}
                  </label>
                </div>
              </div>

              @endforeach
            </div>
      </div>

      <div class="form-group">
        <button class="btn btn-info" type="submit">حفظ</button>
      </div>
      @push('scripts')
      <script>
      $("#select-all").click(function(){
      $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
      });
      </script>
       @endpush

    {!! Form::close() !!}
    </div>

  </div>
  <!-- /.card -->

</section>

@endsection
