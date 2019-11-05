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
                              <li class="breadcrumb-item"><a href="">المقالات</a></li>
                            </ol>
                          </nav>

              </div>
          </div>
          <div class="row">
            @foreach($articles as $article)
        <div class="col-md-12">

        <img class="article-img shadow p-3 mb-5 " src="{{asset($article->image)}}">
            <div class="artilce-head">

                <p class="article-name">{{$article->title}} </p>
            </div>
            <div class="article-content shadow">
                <p class="content">{{$article->content}}</p>
                <img class="share-icon custom-position" src="{{asset('site/imgs/social-share-symbol.png')}}">
                <p class="custom-position2">شارك هذه المقاله :</p>
                <div class="social-share">
                  <i class="fab fa-facebook-square"></i>
                  <i class="fab fa-twitter-square"></i>

                  <i class="fab fa-google-plus-square"></i>


                </div>

            </div>
        </div>
        @endforeach
          </div>

      </div>
</section>
@endsection
