@extends('website/layout/master')

@section('content')
@push('title')
المقالات
@endpush

      <section id="breedcrumb" style="padding-bottom: 2rem;">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{route('homepage')}}">الرئيسية</a></li>
                              <li class="breadcrumb-item"><a href="{{route('allarticles')}}">المقالات</a></li>

                              <li class="breadcrumb-item active" aria-current="page">{{$detail->title}}</li>

                            </ol>
                          </nav>

              </div>
          </div>
          <div class="row">
        <div class="col-md-12">


        <img class="article-img shadow p-3 mb-5 " src="{{asset($detail->image)}}">
            <div class="artilce-head">
                <p class="article-name">{{$detail->title}} </p>
            </div>
            <div class="article-content shadow">
                <p class="content">{{$detail->content}}</p>
                <img class="share-icon custom-position" src="{{asset('site/imgs/social-share-symbol.png')}}">
                <p class="custom-position2">شارك هذه المقاله :</p>
                <div class="social-share">
                  <i class="fab fa-facebook-square"></i>
                  <i class="fab fa-twitter-square"></i>

                  <i class="fab fa-google-plus-square"></i>


                </div>

            </div>

        </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <section id="articles">
                <h2 class="articles-relative">مقالات ذات صلة  </h2>
                <div class="container custom" style="direction: ltr">
                  <div class="owl-carousel owl-theme" id="owl-articles">
                    @foreach($posts as $post)
                    <div class="item">
                      <div class="card" style="width: 22rem;">
                        <i id="{{$post->id}}" onclick="toggleFavourite(this)"  class="fab fa-gratipay
                        {{$post->is_favourite ? 'second-heart':'first-heart'}}
                        "></i>
                        <img class="card-img-top" src="{{asset($post->image)}}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">{{$post->title}} </h5>
                          <p class="card-text">{{str_limit($post->content,100)}}</p>
                          <a href="{{route('postdetail',$post->id)}}"><button class="btn details-btn">التفاصيل </button></a>
                        </div>
                      </div>


                    </div>
              @endforeach
                  </div>

                </div>
                </section>


            </div>

          </div>
      </div>
</section>
@push('scripts')
<script>
function toggleFavourite(heart) {
  var post_id = heart.id;
  $.ajax({
    url : '{{url(route('toggle-favourite'))}}',
    type : 'POST',
    data : {_token :"{{csrf_token()}}",post_id:post_id},
    success :function(data){
      console.log(data);
      var currentClass = $(heart).attr('class');
      if (currentClass.includes('first')) {
          $(heart).removeClass('first-heart').addClass('second-heart');
      } else {
          $(heart).removeClass('second-heart').addClass('first-heart');
      }
    },
    error : function (jqXhr, textStatus, errorMessage){
      alert(errorMessage);
    }

  });

}
</script>
@endpush

@endsection
