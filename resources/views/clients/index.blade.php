@extends('layouts.app')
@inject('city','App\Models\City')
@inject('bloodtype','App\Models\BloodType')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>العملاء</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="{{url('home')}}">الصفحه الرئيسية<i class="fab fa-dashcube"></i></a></li>
          <li class="breadcrumb-item active">العملاء</li>
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
    @if(count($rules))
    <div class="card-header">
              <div class="card-tools col-md-8">
                {!! Form::open([
                  'action'=>['ClientController@search'],
                  'method'=>'get'
                  ]) !!}
               <div class="form-group ">
                   <label  for="city_id">المدينه</label>
                   {!!Form::select('city_id',$city->get()->pluck('name','id')->toArray(),null,[
                       'class' => 'form-control col-sm-5','placeholder'=>'من فضلك إختار المدينه'
                   ])!!}
                 </div>
               <div class="form-group">
                   <label for="blood_type_id">فصيله الدم</label>
                   {!!Form::select('blood_type_id',$bloodtype->get()->pluck('name','id')->toArray(),null,[
                       'class' => 'form-control col-sm-5','placeholder'=>'من فضلك ادخل فصيله الدم'
                   ])!!}
               </div>

                    <div class="input-group-append ">

                      <button type="submit" name="search" class="btn btn-default btn-sm"><i class="fas fa-search"></i></button>
                       {!! Form::close() !!}
                    </div>

                </div>
              </div>
     <div class="table-responsive">
       <table class="table table-bordered">
         <thead>
           <tr class="text-center">
             <th>#</th>
             <th>الإسم</th>
             <th>البريد الإلكتروني</th>
             <th>الهاتف</th>
             <th>تاريخ الميلاد</th>
             <th>أخر تاريخ للتبرع</th>
             <th>المدينه</th>
             <th>فصيله الدم</th>
             <th>الحاله</th>
             <th>الحذف</th>
           </tr>
         </thead>
         <tbody>
           @foreach($rules as $rule)
           <tr class="text-center">
             <td>{{$loop->iteration}}</td>
             <td>{{$rule->name}}</td>
             <td>{{$rule->email}}</td>
             <td>{{$rule->phone}}</td>
             <td>{{$rule->d_o_b}}</td>
             <td>{{$rule->last_date_of_donation}}</td>
             <td>{{optional($rule->city)->name}}</td>
             <td>{{optional($rule->blood_type)->name}}</td>
             <td>
               @if($rule->status==1)
               {!! Form::open([
                 'action'=>['ClientController@status',$rule->id]
                 ]) !!}
                 <button type='submit' class="btn btn-danger btn-xs">
                   <i class="fab fa-creative-commons-by"></i> مفعل</button>
                   {!! Form::close() !!}
                   @else
                   {!! Form::open([
                     'action'=>['ClientController@status',$rule->id]
                     ]) !!}
                     <button type='submit' class="btn btn-primary btn-xs">
                       <i class="fab fa-creative-commons-by"></i> غير مفعل</button>
                       {!! Form::close() !!}
                       @endif
             </td>

             <td>
               {!! Form::open([
                 'action'=>['ClientController@destroy',$rule->id],
                 'method'=>'delete'
                 ]) !!}
               <button class="btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i> حذف</button>
               {!! Form::close() !!}
             </td>

           </tr>
           @endforeach
         </tbody>
       </table>
     </div>

       @else
       <div class="alert alert-success" role="alert">
           No Data
       </div>
    @endif
    {{$rules->render()}}
    </div>

  </div>

  <!-- /.card -->

</section>

@endsection
