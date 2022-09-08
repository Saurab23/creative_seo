@extends('frontend.frontendLayout.app')
@section('content')

<body>
    <section class="blog-single-biography-post py-4">
        <div class="container">
            <div class="row">
                <div class="co1-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="blog-single-post-header">
                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                            <ol class="breadcrumb mb-2">
                                <li class="breadcrumb-item"><a href="#">Creative SEO</a></li>
                                <li class="breadcrumb-item"><a href="#">Biography</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $biography->title }}</li>
                            </ol>
                        </nav>
                        <h2 class="blog-single-post-title lh-1">{{ $biography->title }}<span class="text-muted opacity-25 ps-2 ps-2">Biography<i class="fa-solid fa-circle-check ps-2"></i></span></h2>
                        <h5 class="blog-single-post-subtitle text-muted opacity-50 lh-1">(Actor)</h5>
                        <div class="blog-single-post-meta mb-4">
                            <span class="blog-single-post-meta-date">
                                Posted on&nbsp;<span>{{ $biography->updated_at }}</span>
                            </span>
                            <span class="blog-single-post-meta-author">
                                &nbsp;by&nbsp;<span>{{ ($biography->createdBy!=null)?$biography->createdBy->name:'N/A'}}</span>
                            </span>
                            <span class="blog-single-post-meta-cats">
                                in&nbsp;
                                <a href="{{ route('biography.index') }}">Biography</a>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                            <div id="leftSidebar" class="sidebar-section left-Sidebar">
                                <div class="blog-single-post-sidebar sidebar-inner">
                                    <div class="blog-single-biography-details">
                                        <figure class="mb-0">
                                            <div class="blog-item-thumb zoom image is-1by1 mb-0">
                                                <a href="#">
                                                    <img src="{{ (!empty($biography->biography_photo))?url('uploads/biography-image/'.$biography->biography_photo):url('uploads/biography-image/no-image.png') }}" alt="Conrad Hughes Hilton" class="img-fluid">
                                                </a>
                                                <div class="ribbon-item">
                                                    <div class="ribbon-item-inner">
                                                        {{ $biography->relationship_status }}
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="figure-caption text-center py-1"><span>Source:-</span>&nbsp;The Famous People</div> --}}
                                        </figure>
                                        <section class="blog-single-biography-facts">
                                            <h5 class="mb-0 py-2">Quick Facts of <span>{{ $biography->title }}</span></h5>
                                            <table class="facts">
                                                <tbody>
                                                    <tr>
                                                        <th>Age:</th>
                                                            @php
                                                                $birthday = $biography->birth_date;
                                                                $age = Carbon\Carbon::parse($birthday)->diff(Carbon\Carbon::now())->format('%y years, %m months and %d days');
                                                            @endphp
                                                        <td><a href="">{{ $age }}</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Birth Date:</th>
                                                        <td><a href="">{{ $biography->birth_date }}</a></td>
                                                    </tr>
                                                    @foreach($biography->quickfact as $quickFact)
                                                    <tr>
                                                        <th>{{ $quickFact->title }}:</th>
                                                        <td><a href="#">{{ $quickFact->content }}</a></td>
                                                    </tr>
                                                    @endforeach
                                                    
                                                    
                                                    
                                                    <tr>
                                                        <th colspan="2">
                                                            <h3 class="stats">Social Media</h3>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>Facebook Profile/Page:</th>
                                                        <td>
                                                            <a href="https://www.facebook.com" target="_blank" rel="nofollow">
                                                                <i class="fa-brands fa-facebook-f"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Twitter Profile:</th>
                                                        <td>
                                                            <a href="https://twitter.com" target="_blank" rel="nofollow">
                                                                <i class="fa-brands fa-twitter"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Instagram Profile:</th>
                                                        <td>
                                                            <a href="https://www.instagram.com/explore" target="_blank" rel="nofollow">
                                                                <i class="fa-brands fa-instagram"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tiktok Profile:</th>
                                                        <td>
                                                            <a href="https://tiktok.com/" target="_blank" rel="nofollow">
                                                                <i class="fa-brands fa-tiktok"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Youtube Profile:</th>
                                                        <td>
                                                            <a href="https://www.youtube.com" target="_blank" rel="nofollow">
                                                                <i class="fa-brands fa-youtube"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Wikipedia Profile:</th>
                                                        <td>
                                                            <a href="https://en.wikipedia.org/w/" target="_blank" rel="nofollow">
                                                                <i class="fa-brands fa-wikipedia-w"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>IMDB Profile:</th>
                                                        <td>
                                                            <a href="https://www.imdb.com" target="_blank" rel="nofollow">
                                                                <i class="fa-brands fa-imdb"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Official Website:</th>
                                                        <td>
                                                            <a href="https://www.google.com/" target="_blank" rel="nofollow">
                                                                <i class="fa-solid fa-link"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <a href="#" class="viewmore">View more / View fewer</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-7 col-lg-7">
                            <div class="blog-biography-single-post-relationship pb-2">
                                <h5>Relationship Facts of <span>{{ $biography->title }}</span></h5>
                                {!! $biography->relationship_fact !!}
                            </div>
                            <div class="blog-biography-single-post-anniversary py-2">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="aniversary-button">
                                        <a href="{{ route('biography.todaysAnniversary') }}">Today's Anniversary</a>
                                    </div>
                                    <div class="aniversary-button">
                                        <a href="{{ route('biography.todaysAnniversary') }}">Upcoming Anniversary</a>
                                    </div>
                                </div>
                            </div>

                            <div class="blog-biography-single-post-birthday py-2">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="birthday-button">
                                        <a href="#">Today's Birthday</a>
                                    </div>
                                    <div class="birthday-button">
                                        <a href="#">Tomorrow's Birthday</a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-biography-single-post-shorttext py-2 my-2">
                                <h3>More about the relationship</h3>
                                <p>{!! $biography->more_about_relationship !!}</p>
                            </div>

                            <div class="blog-biography-single-post-content py-2 my-2">
                                <div class="blog-biography-tab-header">
                                    <h5>Inside Biography <span id="blog_biography_toggle">[hide]</span> </h5>
                                    <ul class="blog-biography-tab-header-list">
                                        @foreach($biography->tableofcontent as $tableofcontent)
                                        <li><a href="#{{ $tableofcontent->question }}">{{ $tableofcontent->question }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="blog-biography-tab-content">
                                    @foreach($biography->tableofcontent as $tableofcontent)
                                    <article id="{{ $tableofcontent->question }}" class="blog-biography-tab-content-list">
                                        <h4>{{ $tableofcontent->question }}</h4>
                                        <p>{!! $tableofcontent->answer !!}</p>
                                    </article>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-single-post-tags pt-4 pb-2">
                        Tags:
                        @foreach($biography->tags as $tags)
                            <a href="#" class="btn btn-outline-danger">{{ $tags->tag_name }}</a>
                        @endforeach
                    </div>
                    <section class="blog-biography-related-post blog-sidebar-cat py-3">
                        <div class="section-header">
                            <h3 class="section-title">Recent Post on <span>{{ $biography->title }}</span></h3>
                        </div>
                        <div class="blog-sidebar-cat-list">
                            <article class="blog-sidebar-cat-content d-flex">
                                <div class="blog-sidebar-cat-thumb zoom">
                                    <img src="{{ (!empty($biography->biography_photo))?url('uploads/biography-image/'.$biography->biography_photo):url('uploads/biography-image/no-image.png') }}" alt="Conrad Hughes Hilton" class="img-fluid">
                                </div>
                                <div class="blog-sidebar-cat-main">
                                    <h4 class="blog-sidebar-cat-title"><a href="">Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!</a></h4>
                                    <div class="blog-sidebar-cat-meta">
                                        <span class="blog-sidebar-cat-meta-author me-2"><i class="fa-solid fa-user me-1"></i>admin</span>
                                        <span class="blog-sidebar-cat-meta-date"><i class="fa-solid fa-clock me-1"></i>August 15, 2022</span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </section>
                </div>
                <div class="co1-12 col-sm-12 col-md-12 col-lg-4">
                    <div id="rightSidebar" class="sidebar-section right-sidebar">
                        <div class="blog-single-post-sidebar sidebar-inner">
                            <section class="blog-sidebar-cat blog-sidebar-cat-1 pb-4">
                                <div class="section-header">
                                    <h3 class="section-title">Entertainment</h3>
                                </div>
                                <div class="blog-sidebar-cat-list">
                                    <article class="blog-sidebar-cat-content d-flex mb-4">
                                        <div class="blog-sidebar-cat-thumb zoom">
                                            <img src="./img/Brooklyn-Beckham.jpg" alt="Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!" class="img-fluid">
                                        </div>
                                        <div class="blog-sidebar-cat-main">
                                            <h4 class="blog-sidebar-cat-title"><a href="">Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!</a></h4>
                                            <div class="blog-sidebar-cat-meta">
                                                <span class="blog-sidebar-cat-meta-author me-2"><i class="fa-solid fa-user me-1"></i>admin</span>
                                                <span class="blog-sidebar-cat-meta-date"><i class="fa-solid fa-clock me-1"></i>August 15, 2022</span>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </section>
                            <section class="blog-sidebar-biography pb-4">
                                <div class="section-header d-flex justify-content-between align-items-center">
                                    <h3 class="section-title"><a href="{{ route('biography.index') }}">Biography</a></h3>
                                    <h3 class="section-view-more"><a href="#">View More</a></h3>
                                </div>
                                <div class="blog-sidebar-biography-list">
                                    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 py-2">
                                        @foreach($sidebar_biography as $sidebar)
                                        <div class="col">
                                            <article class="blog-sidebar-biography-item mb-4">
                                                <div class="blog-item-thumb zoom image is-1by1">
                                                    <a href="{{ route('biography.viewBiographyDetail', $sidebar->slug) }}">
                                                        <img src="{{ (!empty($sidebar->biography_photo))?url('uploads/biography-image/'.$sidebar->biography_photo):url('uploads/biography-image/no-image.png') }}" alt="Conrad Hughes Hilton" class="img-fluid">

                                                    </a>
                                                    <div class="ribbon-item">
                                                        <div class="ribbon-item-inner">
                                                            {{ $sidebar->relationship_status }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="blog-item-main text-center text-center">
                                                    <h4 class="blog-item-title py-2"><a href="{{ route('biography.viewBiographyDetail', $sidebar->slug) }}">{{ $sidebar->title }}</a></h4>
                                                </div>
                                            </article>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog-single-recent-biography mt-4">
                <div class="row">
                    <div class="col-12">
                        <div class="section-header d-flex justify-content-between align-items-center">
                            <h3 class="section-title"><a>Recent Biography</a></h3>
                        </div>
                    </div>
                </div>
                <div class="loadMoreContent row row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-lg-4 py-2">
                    @foreach($recent_biography as $recent)
                    <div class="col">
                        <article class="blog-item shadow mb-3">
                            <div class="blog-item-thumb zoom image is-1by1">
                                <a href="{{ route('biography.viewBiographyDetail', $recent->slug) }}">
                                    <img src="{{ (!empty($recent->biography_photo))?url('uploads/biography-image/'.$recent->biography_photo):url('uploads/biography-image/no-image.png') }}" alt="Conrad Hughes Hilton" class="img-fluid">
                                </a>
                                <div class="ribbon-item">
                                    <div class="ribbon-item-inner">
                                        {{ $recent->relationship_status }}
                                    </div>
                                </div>
                            </div>
                            <div class="blog-item-main text-center text-center p-2">
                                <h4 class="blog-item-title"><a href="{{ route('biography.viewBiographyDetail', $recent->slug) }}">{{ $recent->title }}</a></h4>
                                @php
                                    $birthday = $biography->birth_date;
                                    $age = Carbon\Carbon::parse($birthday)->diff(Carbon\Carbon::now())->format('%y years');
                                @endphp
                                <p class="blog-item-age mb-0">{{ $age }}</p>
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
        </div>
    </section>
 
</body>

@endsection