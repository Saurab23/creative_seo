@extends('frontend.frontendLayout.app')
@section('content')

<body>
    <!-- Recent Post Start -->
    <section class="recent-post">
        <div class="container-fluid p-0">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 row-cols-lg-4 g-0">
                @foreach($articles as $article)
                <div class="col">
                    <article class="recent-post-item mb-4">
                        <div class="recent-post-item-thumb zoom image is-4by5">
                            <a href="{{ route('article.viewDetail',$article->slug) }}">
                                <img src="{{ (!empty($article->featured_photo))?url('uploads/article-featured-image/'.$article->featured_photo):url('uploads/article-featured-image/no-image.png') }}" class="img-fluid" alt="Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!">
                            </a>
                            <div class="recent-post-item-cat">
                                <a href="#">BFF Goals</a>
                            </div>
                        </div>
                        <div class="recent-post-item-main text-center pt-3 pb-2 px-4 pt-3 pb-2 px-4">
                            <h4 class="recent-post-item-title"><a href="#">{{ $article->title}}</a></h4>
                            <div class="recent-post-item-meta">
                                <span class="recent-post-item-meta-author">{{($article->articleUser!=null)?$article->articleUser->name:'N/A'}}</span>
                                <i class="fa-solid fa-minus"></i>
                                <span class="recent-post-item-meta-date">{{ $article->created_at}}</span>
                            </div>

                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Recent Post End -->

    <div class="home-google-ads py-2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="img/ads.PNG" alt="ads" class="img-fluid">
                </div>
            </div>
        </div>
    </div>


    <!-- Anniversary Start -->
    <section class="anniversary today-anniversary pt-5 pb-4">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 g-4">
                <div class="col">
                    <!-- Today Anniversary Start-->
                    <div class="today-anniversary">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-header d-flex justify-content-between align-items-center">
                                    <h3 class="section-title"><a href="{{ route('biography.todaysAnniversary') }}">Today's Anniversary</a></h3>
                                    <h3 class="section-view-more"><a href="{{ route('biography.todaysAnniversary') }}">View More</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 py-2">
                            @foreach($today_anniversary as $today)
                            <div class="col">
                                <article class="blog-item mb-4">
                                    <div class="blog-item-thumb zoom image is-1by1">
                                        <a href="{{ route('biography.viewBiographyDetail',$today->slug) }}">
                                            <img src="{{ (!empty($today->biography_photo))?url('uploads/biography-image/'.$today->biography_photo):url('uploads/biography-image/no-image.png') }}" alt="Conrad Hughes Hilton" class="img-fluid">
                                        </a>
                                        <div class="ribbon-item">
                                            <div class="ribbon-item-inner">
                                                {{$today->relationship_status}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-item-main text-center">
                                        <h4 class="blog-item-title py-2"><a href="{{ route('biography.viewBiographyDetail',$today->slug) }}">{{$today->title}}</a></h4>
                                    </div>
                                </article>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Today Anniversary End-->
                </div>
                <div class="col">
                    <!-- Upcoming Anniversary Start -->
                    <div class="upcoming-anniversary">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-header d-flex justify-content-between align-items-center">
                                    <h3 class="section-title"><a href="{{ route('biography.upcomingAnniversary') }}">Upcoming Anniversary</a></h3>
                                    <h3 class="section-view-more"><a href="{{ route('biography.upcomingAnniversary') }}">View More</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 py-2">
                            @foreach($upcoming_anniversary as $coming)
                            <div class="col">
                                <article class="blog-item mb-4">
                                    <div class="blog-item-thumb zoom image is-1by1">
                                        <a href="{{ route('biography.viewBiographyDetail', $coming->slug) }}">
                                            <img src="{{ (!empty($coming->biography_photo))?url('uploads/biography-image/'.$coming->biography_photo):url('uploads/biography-image/no-image.png') }}" alt="Conrad Hughes Hilton" class="img-fluid">
                                        </a>
                                        <div class="ribbon-item">
                                            <div class="ribbon-item-inner">
                                                {{$coming->relationship_status}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-item-main text-center">
                                        <h4 class="blog-item-title py-2"><a href="{{ route('biography.viewBiographyDetail', $coming->slug) }}">{{$coming->title}}</a></h4>
                                    </div>
                                </article>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Upcoming Anniversary End -->
                </div>
            </div>
        </div>
    </section>
    <!-- Anniversary End-->

    <!--  Biography Start -->
    <section class="biography py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header d-flex justify-content-between align-items-center">
                        <h3 class="section-title"><a href="#">View all Biography</a></h3>
                        <h3 class="section-view-more"><a href="#">View More</a></h3>
                    </div>
                </div>
            </div>
            <div class="loadMoreContent row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 py-2">
                @foreach($biography as $bio)
                <div class="col">
                    <article class="blog-item shadow mb-3">
                        <div class="blog-item-thumb zoom image is-1by1">
                            <a href="">
                                <img src="{{ (!empty($bio->biography_photo))?url('uploads/biography-image/'.$bio->biography_photo):url('uploads/biography-image/no-image.png') }}" alt="Conrad Hughes Hilton" class="img-fluid">
                            </a>
                            <div class="ribbon-item">
                                <div class="ribbon-item-inner">
                                    {{ $bio->relationship_status }}
                                </div>
                            </div>
                        </div>
                        <div class="blog-item-main text-center text-center p-2">
                            <h4 class="blog-item-title"><a href="">{{ $bio->title }}</a></h4>
                            <p class="blog-item-age mb-0">{{ $bio->birth_date }}</p>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col text-center">
                    <!-- Load More Button -->
                    <a name="loadMoreBtn" id="loadMoreBtn" class="d-inline-block load-more-btn">Load More</a>
                </div>
            </div>
        </div>
    </section>
    <!--  Biography Start -->

</body>
@endsection