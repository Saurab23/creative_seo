@extends('frontend.frontendLayout.app')
@section('content')
<body>
    <!-- Recent Post Start -->
    <section class="recent-post mb-5">
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
                                <i class="bi bi-dash-lg"></i>
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

    <!-- Anniversary Start -->
    <section class="anniversary today-anniversary pt-5 pb-4">
        <div class="container">
            <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-2 g-5">
                <div class="col">
                    <!-- Today Anniversary Start-->
                    <div class="today-anniversary">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-header d-flex justify-content-between align-items-center">
                                    <h3 class="section-title"><a href="#">Today's Anniversary</a></h3>
                                    <h3 class="section-view-more"><a href="#">View More</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 py-2">
                            <div class="col">
                                <article class="blog-item mb-4">
                                    <div class="blog-item-thumb zoom image is-1by1">
                                        <a href="">
                                            <img src="./img/Lou-Diamond-Phillips.jpg" alt="" class="img-fluid">
                                        </a>
                                        <div class="ribbon-item">
                                            <div class="ribbon-item-inner">
                                                Married
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-item-main text-center text-center">
                                        <h4 class="blog-item-title py-2"><a href="">Lou Diamond Phillips</a></h4>
                                    </div>
                                </article>
                            </div>
                            <div class="col">
                                <article class="blog-item mb-4">
                                    <div class="blog-item-thumb zoom image is-1by1">
                                        <a href="">
                                            <img src="./img/Lou-Diamond-Phillips.jpg" alt="" class="img-fluid">
                                        </a>
                                        <div class="ribbon-item">
                                            <div class="ribbon-item-inner">
                                                Married
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-item-main text-center">
                                        <h4 class="blog-item-title py-2"><a href="">Lou Diamond Phillips</a></h4>
                                    </div>
                                </article>
                            </div>
                            <div class="col">
                                <article class="blog-item mb-4">
                                    <div class="blog-item-thumb zoom image is-1by1">
                                        <a href="">
                                            <img src="./img/Lou-Diamond-Phillips.jpg" alt="" class="img-fluid">
                                        </a>
                                        <div class="ribbon-item">
                                            <div class="ribbon-item-inner">
                                                Married
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-item-main text-center">
                                        <h4 class="blog-item-title py-2"><a href="">Lou Diamond Phillips</a></h4>
                                    </div>
                                </article>
                            </div>
                            <div class="col">
                                <article class="blog-item mb-4">
                                    <div class="blog-item-thumb zoom image is-1by1">
                                        <a href="">
                                            <img src="./img/Lou-Diamond-Phillips.jpg" alt="" class="img-fluid">
                                        </a>
                                        <div class="ribbon-item">
                                            <div class="ribbon-item-inner">
                                                Married
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-item-main text-center">
                                        <h4 class="blog-item-title py-2"><a href="">Lou Diamond Phillips</a></h4>
                                    </div>
                                </article>
                            </div>
                            <div class="col">
                                <article class="blog-item mb-4">
                                    <div class="blog-item-thumb zoom image is-1by1">
                                        <a href="">
                                            <img src="./img/Lou-Diamond-Phillips.jpg" alt="" class="img-fluid">
                                        </a>
                                        <div class="ribbon-item">
                                            <div class="ribbon-item-inner">
                                                Married
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-item-main text-center">
                                        <h4 class="blog-item-title py-2"><a href="">Lou Diamond Phillips</a></h4>
                                    </div>
                                </article>
                            </div>
                            <div class="col">
                                <article class="blog-item mb-4">
                                    <div class="blog-item-thumb zoom image is-1by1">
                                        <a href="">
                                            <img src="./img/Lou-Diamond-Phillips.jpg" alt="" class="img-fluid">
                                        </a>
                                        <div class="ribbon-item">
                                            <div class="ribbon-item-inner">
                                                Married
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-item-main text-center">
                                        <h4 class="blog-item-title py-2"><a href="">Lou Diamond Phillips</a></h4>
                                    </div>
                                </article>
                            </div>
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
                                    <h3 class="section-title"><a href="#">Upcoming Anniversary</a></h3>
                                    <h3 class="section-view-more"><a href="#">View More</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 py-2">
                            <div class="col">
                                <article class="blog-item mb-4">
                                    <div class="blog-item-thumb zoom image is-1by1">
                                        <a href="">
                                            <img src="./img/Claire-Holt.jpg" alt="Claire Holt" class="img-fluid">
                                        </a>
                                        <div class="ribbon-item">
                                            <div class="ribbon-item-inner">
                                                Married
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-item-main text-center">
                                        <h4 class="blog-item-title py-2"><a href="">Claire Holt</a></h4>
                                    </div>
                                </article>
                            </div>
                            <div class="col">
                                <article class="blog-item mb-4">
                                    <div class="blog-item-thumb zoom image is-1by1">
                                        <a href="">
                                            <img src="./img/Claire-Holt.jpg" alt="Claire Holt" class="img-fluid">
                                        </a>
                                        <div class="ribbon-item">
                                            <div class="ribbon-item-inner">
                                                Married
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-item-main text-center">
                                        <h4 class="blog-item-title py-2"><a href="">Claire Holt</a></h4>
                                    </div>
                                </article>
                            </div>
                            <div class="col">
                                <article class="blog-item mb-4">
                                    <div class="blog-item-thumb zoom image is-1by1">
                                        <a href="">
                                            <img src="./img/Claire-Holt.jpg" alt="" class="img-fluid">
                                        </a>
                                        <div class="ribbon-item">
                                            <div class="ribbon-item-inner">
                                                Married
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-item-main text-center">
                                        <h4 class="blog-item-title py-2"><a href="">Claire Holt</a></h4>
                                    </div>
                                </article>
                            </div>
                            <div class="col">
                                <article class="blog-item mb-4">
                                    <div class="blog-item-thumb zoom image is-1by1">
                                        <a href="">
                                            <img src="./img/Claire-Holt.jpg" alt="" class="img-fluid">
                                        </a>
                                        <div class="ribbon-item">
                                            <div class="ribbon-item-inner">
                                                Married
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-item-main text-center">
                                        <h4 class="blog-item-title py-2"><a href="">Claire Holt</a></h4>
                                    </div>
                                </article>
                            </div>
                            <div class="col">
                                <article class="blog-item mb-4">
                                    <div class="blog-item-thumb zoom image is-1by1">
                                        <a href="">
                                            <img src="./img/Claire-Holt.jpg" alt="" class="img-fluid">
                                        </a>
                                        <div class="ribbon-item">
                                            <div class="ribbon-item-inner">
                                                Married
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-item-main text-center">
                                        <h4 class="blog-item-title py-2"><a href="">Claire Holt</a></h4>
                                    </div>
                                </article>
                            </div>
                            <div class="col">
                                <article class="blog-item mb-4">
                                    <div class="blog-item-thumb zoom image is-1by1">
                                        <a href="">
                                            <img src="./img/Claire-Holt.jpg" alt="" class="img-fluid">
                                        </a>
                                        <div class="ribbon-item">
                                            <div class="ribbon-item-inner">
                                                Married
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-item-main text-center">
                                        <h4 class="blog-item-title py-2"><a href="">Claire Holt</a></h4>
                                    </div>
                                </article>
                            </div>
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
            <div class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 py-2">
                <div class="col">
                    <article class="blog-item shadow mb-3">
                        <div class="blog-item-thumb zoom image is-1by1">
                            <a href="">
                                <img src="./img/Conrad-Hughes-Hilton.jpg" alt="Conrad Hughes Hilton" class="img-fluid">
                            </a>
                            <div class="ribbon-item">
                                <div class="ribbon-item-inner">
                                    Married
                                </div>
                            </div>
                        </div>
                        <div class="blog-item-main text-center text-center p-2">
                            <h4 class="blog-item-title"><a href="">Conrad Hughes Hilton</a></h4>
                            <p class="blog-item-age mb-0">( 28 years old )</p>
                        </div>
                    </article>
                </div>
                <div class="col">
                    <article class="blog-item shadow mb-3">
                        <div class="blog-item-thumb zoom image is-1by1">
                            <a href="">
                                <img src="./img/Conrad-Hughes-Hilton.jpg" alt="Conrad Hughes Hilton" class="img-fluid">
                            </a>
                            <div class="ribbon-item">
                                <div class="ribbon-item-inner">
                                    Married
                                </div>
                            </div>
                        </div>
                        <div class="blog-item-main text-center text-center p-2">
                            <h4 class="blog-item-title"><a href="">Conrad Hughes Hilton</a></h4>
                            <p class="blog-item-age mb-0">( 28 years old )</p>
                        </div>
                    </article>
                </div>
                <div class="col">
                    <article class="blog-item shadow mb-3">
                        <div class="blog-item-thumb zoom image is-1by1">
                            <a href="">
                                <img src="./img/Conrad-Hughes-Hilton.jpg" alt="Conrad Hughes Hilton" class="img-fluid">
                            </a>
                            <div class="ribbon-item">
                                <div class="ribbon-item-inner">
                                    Married
                                </div>
                            </div>
                        </div>
                        <div class="blog-item-main text-center text-center p-2">
                            <h4 class="blog-item-title"><a href="">Conrad Hughes Hilton</a></h4>
                            <p class="blog-item-age mb-0">( 28 years old )</p>
                        </div>
                    </article>
                </div>
                <div class="col">
                    <article class="blog-item shadow mb-3">
                        <div class="blog-item-thumb zoom image is-1by1">
                            <a href="">
                                <img src="./img/Conrad-Hughes-Hilton.jpg" alt="Conrad Hughes Hilton" class="img-fluid">
                            </a>
                            <div class="ribbon-item">
                                <div class="ribbon-item-inner">
                                    Married
                                </div>
                            </div>
                        </div>
                        <div class="blog-item-main text-center text-center p-2">
                            <h4 class="blog-item-title"><a href="">Conrad Hughes Hilton</a></h4>
                            <p class="blog-item-age mb-0">( 28 years old )</p>
                        </div>
                    </article>
                </div>
                <div class="col">
                    <article class="blog-item shadow mb-3">
                        <div class="blog-item-thumb zoom image is-1by1">
                            <a href="">
                                <img src="./img/Conrad-Hughes-Hilton.jpg" alt="Conrad Hughes Hilton" class="img-fluid">
                            </a>
                            <div class="ribbon-item">
                                <div class="ribbon-item-inner">
                                    Married
                                </div>
                            </div>
                        </div>
                        <div class="blog-item-main text-center text-center p-2">
                            <h4 class="blog-item-title"><a href="">Conrad Hughes Hilton</a></h4>
                            <p class="blog-item-age mb-0">( 28 years old )</p>
                        </div>
                    </article>
                </div>
                <div class="col">
                    <article class="blog-item shadow mb-3">
                        <div class="blog-item-thumb zoom image is-1by1">
                            <a href="">
                                <img src="./img/Conrad-Hughes-Hilton.jpg" alt="Conrad Hughes Hilton" class="img-fluid">
                            </a>
                            <div class="ribbon-item">
                                <div class="ribbon-item-inner">
                                    Married
                                </div>
                            </div>
                        </div>
                        <div class="blog-item-main text-center text-center p-2">
                            <h4 class="blog-item-title"><a href="">Conrad Hughes Hilton</a></h4>
                            <p class="blog-item-age mb-0">( 28 years old )</p>
                        </div>
                    </article>
                </div>
                <div class="col">
                    <article class="blog-item shadow mb-3">
                        <div class="blog-item-thumb zoom image is-1by1">
                            <a href="">
                                <img src="./img/Conrad-Hughes-Hilton.jpg" alt="Conrad Hughes Hilton" class="img-fluid">
                            </a>
                            <div class="ribbon-item">
                                <div class="ribbon-item-inner">
                                    Married
                                </div>
                            </div>
                        </div>
                        <div class="blog-item-main text-center text-center p-2">
                            <h4 class="blog-item-title"><a href="">Conrad Hughes Hilton</a></h4>
                            <p class="blog-item-age mb-0">( 28 years old )</p>
                        </div>
                    </article>
                </div>
                <div class="col">
                    <article class="blog-item shadow mb-3">
                        <div class="blog-item-thumb zoom image is-1by1">
                            <a href="">
                                <img src="./img/Conrad-Hughes-Hilton.jpg" alt="Conrad Hughes Hilton" class="img-fluid">
                            </a>
                            <div class="ribbon-item">
                                <div class="ribbon-item-inner">
                                    Married
                                </div>
                            </div>
                        </div>
                        <div class="blog-item-main text-center text-center p-2">
                            <h4 class="blog-item-title"><a href="">Conrad Hughes Hilton</a></h4>
                            <p class="blog-item-age mb-0">( 28 years old )</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!--  Biography End -->
</body>
@endsection