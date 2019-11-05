@extends('website/layout/master')
@section('content')
@inject('city','App\Models\City')
@inject('bloodtype','App\Models\BloodType')
@push('title')
طلبات التبرع
@endpush

<section id="breedcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                  <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="Home.html">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">طلبات التبرع</li>
                          </ol>
                        </nav>

            </div>
        </div>
        </div>

<h2 class="donations-head horizntal-line">طلبات التبرع </h2>

 <!-- Donations offers  -->
<section id="donations">

<div class="container custom-position">
  {!! Form::open([
   'action'=>['Front\MainController@donationsearch'],
   'method'=>'get'
   ]) !!}
<div class="row dropdown">
<div class="form-group col-md-5">
  {!!Form::select('city_id',$city->get()->pluck('name','id')->toArray(),null,[
     'class' => 'custom-select',
     'placeholder'=>'من فضلك إختار المدينه'
  ])!!}
</div>

<div class="form-group col-md-5">
  {!!Form::select('blood_type_id',$bloodtype->get()->pluck('name','id')->toArray(),null,[
       'class' => 'custom-select',
       'placeholder'=>'من فضلك ادخل فصيله الدم'
   ])!!}

</div>
<div class="col-md-2 search">
  <button type="submit" class="btn btn-default circle search-icon fas fa-search search-icon"></button>

</div>
</div>
{!! Form::close() !!}
@include('flash::message')


@foreach($rules as $rule)
<div class="row background-div ">
<div class="col-lg-2">
<div class="blood-type border-circle">
<div class="blood-txt">
  {{$rule->BloodType->name}}
</div>

</div>
</div>
<div class="col-lg-7">
<ul class="order-details">
  <li class="cutom-display">   اسم الحالة:</li>
  <span class="cutom-display">{{$rule->name}}</span> <br>

  <li class="cutom-display custom-padding" >  مستشفي:</li>
  <span class="cutom-display custom-padding">{{$rule->hospital_name}}</span> <br>
  <div class="adjust-position">  <li class="cutom-display ">  المدينة:</li>
    <span class="cutom-display ">{{$rule->City->name}}</span></div>


</ul>

</div>
<div class="col-lg-3">
    <a href="{{route('donationdetail',$rule->id)}}"><button class="btn more2-btn">التفاصيل </button></a>
</div>

</div>
@endforeach
<nav class="pagi" aria-label="Page navigation example" style="

            display: -webkit-box;
            text-align: -webkit-center;
            margin-top: 3rem;
        ">
<div class="pagination  pagination-mds">
{{$rules->render()}}
</div>
</nav>
</div>
</section>
@endsection
