<!doctype html>
@extends('website/layout/master')

@section('content')
@inject('blood_type','App\Models\BloodType')
@inject('governorate','App\Models\Governorate')
@push('title')
إنشاء طلب تبرع
@endpush



     <!-- breedcrumb-->

      <section id="breedcrumb">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="Home.html">الرئيسية</a></li>
                              <li class="breadcrumb-item active" aria-current="page">إنشاء طلب تبرع</li>
                            </ol>
                          </nav>

              </div>
          </div>
          <div class="row">
        <div class="col-md-12 signup-form">
          @include('partials.validationerrors')

            {!! Form::open([
              'action' => ['Front\MainController@postdonation'],
              'method' => 'post'
              ])!!}
                <div class="form-row">
                  <input type="text" name="name" class="form-control" placeholder="الاسم" >
                    <input type="text" name="age" class="form-control" placeholder="العمر" >
                    <input type="text" name="email" class="form-control"  placeholder="البريد الاكتروني" >
                </div>
                <div class="form-row">
                  <input type="text" name="hospital_name" class="form-control"  placeholder="إسم المستشفي"   >
                  <input type="text" name="hospital_address" class="form-control"  placeholder="عنوان المستشفي" >
                  <input type="text" name="phone" class="form-control"  placeholder="رقم الهاتف">
                  <input type="text" name="bags_num" class="form-control"  placeholder="عدد أكياس الدم المطلوبه">

                    {!!Form::select('governorate_id',$governorate->pluck('name','id')->toArray(),null,[
                        'class' => 'custom-select custom-select-lg mb-3 mt-3 custom-width',
                        'id' => 'governorates',
                        'placeholder'=>'المحافظه'
                    ])!!}

                    {!!Form::select('city_id',[],null,[
                        'class' => 'custom-select custom-select-lg mb-3 mt-3 custom-width',
                        'id' => 'cities',
                        'placeholder'=>'المدينه'
                    ])!!}

                    {!!Form::select('blood_type_id',$blood_type->pluck('name','id')->toArray(),null,[
                    'class' => 'custom-select custom-select-lg mb-3 mt-3 custom-width',
                    'id' => 'blood_types',
                    'placeholder'=>'فصيله الدم'
                    ])!!}


                    <input type="text" name="latitude" class="form-control"  placeholder="خطوط الطول">
                    <input type="text" name="langitude" class="form-control"  placeholder="خطوط العرض">
                    <textarea  name="notes" class="form-control"  placeholder="من فضلك أدخل ملاحظاتك"></textarea>



                </div>
                <button class="btn btn-create shadow" type="submit">إرسال  </button>
              {!! Form::close() !!}

              <script>
              // Example starter JavaScript for disabling form submissions if there are invalid fields
              (function() {
                'use strict';
                window.addEventListener('load', function() {
                  // Fetch all the forms we want to apply custom Bootstrap validation styles to
                  var forms = document.getElementsByClassName('needs-validation');
                  // Loop over them and prevent submission
                  var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                      if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                      }
                      form.classList.add('was-validated');
                    }, false);
                  });
                }, false);
              })();
              </script>

        </div>

          </div>
      </div>
</section>
@push('scripts')
<script>
$("#governorates").change(function(e){
  e.preventDefault();
  var governorate_id = $("#governorates").val();
  if(governorate_id)
  {
    $.ajax({
      url : '{{url('api/V1/cities?governorate_id=')}}'+governorate_id,
      type : 'get',
      success :function(data){
        if(data.status == 1){
          $("#cities").empty();
          $("#cities").append('<option value="">المدينه</option>');
          $.each(data.data,function(index, city){
            $("#cities").append('<option value="'+city.id+'">'+city.name+'</option>');

          });
        }
      },
      error : function (jqXhr, textStatus, errorMessage){
        alert(errorMessage);
      }
    });
  }else{
    $("#cities").empty();
    $("#cities").append('<option value="">المدينه</option>');
  }
});

// $("#cities").change(function(e){
//   e.preventDefault();
//   var city_id = $("#cities").val();
//   if(city_id)
//   {
//     $.ajax({
//       url : '{{url('api/V1/clients?city_id=')}}'+city_id,
//       type : 'get',
//       success :function(data){
//         if(data.status == 1){
//           $("#clients").empty();
//           $("#clients").append('<option value="">من فضلك إختار العميل</option>');
//           $.each(data.data,function(index, client){
//             $("#clients").append('<option value="'+client.id+'">'+client.name+'</option>');
//
//           });
//         }
//       },
//       error : function (jqXhr, textStatus, errorMessage){
//         alert(errorMessage);
//       }
//     });
//   }else{
//     $("#clients").empty();
//     $("#clients").append('<option value="">من فضلك إختار العميل</option>');
//   }
// });
//
// $("#blood_types").change(function(e){
//   e.preventDefault();
//   var blood_type_id = $("#blood_types").val();
//   if(blood_type_id)
//   {
//     $.ajax({
//       url : '{{url('api/V1/clients?blood_type_id=')}}'+blood_type_id,
//       type : 'get',
//       success :function(data){
//         if(data.status == 1){
//           $("#clients").empty();
//           $("#clients").append('<option value="">من فضلك إختار العميل</option>');
//           $.each(data.data,function(index, client){
//             $("#clients").append('<option value="'+client.id+'">'+client.name+'</option>');
//
//           });
//         }
//       },
//       error : function (jqXhr, textStatus, errorMessage){
//         alert(errorMessage);
//       }
//     });
//   }else{
//     $("#clients").empty();
//     $("#clients").append('<option value="">من فضلك إختار العميل</option>');
//   }
// });

</script>
@endpush
@endsection
