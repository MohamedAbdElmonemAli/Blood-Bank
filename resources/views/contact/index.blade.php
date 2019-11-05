@extends('layouts.app')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>اتصل بنا</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="{{url('home')}}">الصفحه الرئيسية<i class="fab fa-dashcube"></i></a></li>
          <li class="breadcrumb-item active">اتصل بنا</li>
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
    
     <div class="table-responsive">
       <table class="table table-bordered">
         <thead>
           <tr class="text-center">
             <th>#</th>
             <th>الإسم</th>
             <th>البريد الإلكتروني</th>
             <th>الهاتف</th>
             <th>الموضوع</th>
             <th>الرساله</th>
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
             <td>{{$rule->subject}}</td>
             <td>{{$rule->message}}</td>
             <td>
               {!! Form::open([
                 'action'=>['ContactController@destroy',$rule->id],
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
