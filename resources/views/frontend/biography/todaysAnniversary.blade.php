@extends('frontend.frontendLayout.app')
@section('content')
<body>
    <section class="blog-category-biography-post py-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header d-flex justify-content-between align-items-center">
                        <h3 class="section-title"><a href="{{ route('biography.todaysAnniversary') }}">Today's Anniversary</a></h3>
                    </div>
                </div>
            </div>
            <div class="loadMoreContent row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-4 py-3">
                @foreach($today_anniversary as $today)
                    <div class="col">
                        <article class="blog-item shadow mb-4">
                            <div class="blog-item-thumb zoom image is-1by1">
                                <a href="{{ route('biography.viewBiographyDetail', $today->slug) }}">
                                    <img src="{{ (!empty($today->biography_photo))?url('uploads/biography-image/'.$today->biography_photo):url('uploads/biography-image/no-image.png') }}" alt="Conrad Hughes Hilton" class="img-fluid">
                                </a>
                                <div class="ribbon-item">
                                    <div class="ribbon-item-inner">
                                        {{ $today->relationship_status }}
                                    </div>
                                </div>
                            </div>
                            <div class="blog-item-main text-center text-center p-2">
                                <h4 class="blog-item-title"><a href="{{ route('biography.viewBiographyDetail', $today->slug) }}">{{ $today->title }}</a></h4>
                                <p class="blog-item-age mb-0">{{ $today->birth_date}}</p>
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