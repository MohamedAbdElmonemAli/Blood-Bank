@extends('layouts.app')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>المقالات</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item"><a href="{{url('home')}}">الصفحه الرئيسية<i class="fab fa-dashcube"></i></a></li>
          <li class="breadcrumb-item active">المقالات</li>
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
      <a href="{{url(route('post.create'))}}" class="btn btn-primary" style="margin-bottom:10px;"><i class="fas fa-plus"></i> إنشاء مقال جديد</a>
      @include('flash::message')
    @if(count($rules))

     <div class="table-responsive">
       <table class="table table-bordered">
         <thead>
           <tr class="text-center">
             <th>#</th>
             <th>العنوان</th>
             <th>المحتوي</th>
             <th>الصوره</th>
             <th>القسم</th>
             <th>عرض المقال</th>
             <th>التعديل</th>
             <th>الحذف</th>
           </tr>
         </thead>
         <tbody>
           @foreach($rules as $rule)
           <tr class="text-center">
             <td>{{$loop->iteration}}</td>
             <td>{{$rule->title}}</td>
             <td>{{$rule->content}}</td>
             <td>
              <img src="{{asset($rule->image)}}" class="img-rounded"  width="75px">
             </td>
             <td>{{optional($rule->Category)->name}}</td>
             <td>
               <a href="{{url(route('post.show',$rule->id))}}" class="btn btn-success btn-xs"><i class="far fa-eye"></i> عرض</a>
             </td>
             <td>
               <a href="{{url(route('post.edit',$rule->id))}}" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i> تعديل</a>
             </td>
             <td>
               {!! Form::open([
                 'action'=>['PostController@destroy',$rule->id],
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
