@extends('frontend.frontendLayout.app')
@section('content')
<body>
    <section class="blog-category-biography-post py-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header d-flex justify-content-between align-items-center">
                        <h3 class="section-title"><a href="{{ route('biography.index') }}">Biography</a></h3>
                    </div>
                </div>
            </div>
            <div class="loadMoreContent row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-4 py-3">
                @foreach($biography as $bio)
                    <div class="col">
                        <article class="blog-item shadow mb-4">
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
                                <p class="blog-item-age mb-0">{{ $bio->birth_date}}</p>
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

</body>
@endsection