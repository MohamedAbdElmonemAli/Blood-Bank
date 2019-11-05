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

      @include('flash::message')



    <div class="col-md-6">
           <!-- Box Comment -->
           <div class="card card-widget">
             <div class="card-header">

                 <span class="username">{{$rules->title}}</span><br/>
                 <span class="description">{{$rules->created_at}}</span>

               <!-- /.user-block -->
               <div class="card-tools float-sm-left">
                 <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Mark as read">
                   <i class="far fa-heart"></i></button>
                 <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                 </button>
                 <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                 </button>
               </div>
               <!-- /.card-tools -->
             </div>
             <!-- /.card-header -->
             <div class="card-body">
               <img src="../{{$rules->image}}" class="img-rounded"  alt="photo" width="400px" height="400px"/>

               <p>{{$rules->content}}</p>

             </div>
             <!-- /.card-body -->


           </div>
           <div class="col-md-12">
             <hr/>
             <a href="{{url(route('post.index'))}}" class="btn btn-primary pull-left"> عوده للخلف <i class="fas fa-backward"></i></a>
           </div>
           <!-- /.card -->
         </div>



    </div>

  </div>

  <!-- /.card -->

</section>

@endsection
