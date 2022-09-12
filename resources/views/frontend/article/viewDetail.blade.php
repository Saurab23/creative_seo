@extends('frontend.frontendLayout.app')
@section('content')
<body>
    <section class="blog-single-post py-4">
        <div class="container">
            <div class="row">
                <div class="co1-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="blog-single-post-header">
                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                            <ol class="breadcrumb mb-2">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Creative Seo</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('article.category.view', $article->categories[0]->slug) }}">{{ $article->categories[0]->category_name}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $article->title }}</li>
                            </ol>
                        </nav>
                        <h2 class="blog-single-post-title">{{ $article->title }}</h2>
                        <div class="blog-single-post-meta mb-4">
                            <span class="blog-single-post-meta-date">
                                Posted on&nbsp;<span>{{ $article->created_at }}</span>
                            </span>
                            <span class="blog-single-post-meta-author">
                                &nbsp;by&nbsp;<span>{{($article->articleUser!=null)?$article->articleUser->name:'N/A'}}</span>
                            </span>
                            <span class="blog-single-post-meta-cats">
                                in&nbsp;
                                @foreach($article->categories as $categories)
                                <a href="#">{{ $categories->category_name }}</a>
                                @endforeach
                            </span>
                        </div>
                    </div>
                    <div class="blog-single-post-main">
                        <div class="blog-single-post-thumb zoom mx-auto w-100 mb-4">
                            <img src="{{ (!empty($article->featured_photo))?url('uploads/article-featured-image/'.$article->featured_photo):url('uploads/no-image.png') }}" alt="Brooklyn Beckham" class="img-fluid">
                        </div>
                    </div>
                    <div class="blog-single-post-content py-4">
                        <p>{!! $article->content !!}</p>
                    </div>
                    <div class="blog-single-post-tags">
                        Tags:
                        @foreach($article->tags as $tags)
                            <a href="#" class="btn btn-outline-danger">{{ $tags->tag_name }}</a>
                        @endforeach
                    </div>
                    <div class="blog-single-post-related py-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-header">
                                    <h3 class="section-title">Recent Articles</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-3 row-cols-lg-3">
                            @foreach($allArticle as $article)
                            <div class="col">
                                <article class="recent-post-item mb-4 mb-sm-4 mb-md-md-0 mb-lg-0 shadow">
                                    <div class="recent-post-item-thumb zoom image is-4by5">
                                        <a href="{{ route('article.viewDetail',$article->slug) }}">
                                            <img src="{{ (!empty($article->featured_photo))?url('uploads/article-featured-image/'.$article->featured_photo):url('uploads/no-image.png') }}" alt="Brooklyn Beckham" class="img-fluid">
                                        </a>
                                        <div class="recent-post-item-cat">
                                            <a href="#">{{ $article->tags[0]->tag_name }}</a>
                                        </div>
                                    </div>
                                    <div class="recent-post-item-main">
                                        <h4 class="recent-post-item-title"><a href="{{ route('article.viewDetail',$article->slug) }}">{{ $article->title }}</a></h4>
                                    </div>
                                </article>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="co1-12 col-sm-12 col-md-4 col-lg-4">
                    <div id="singleSidebar" class="sidebar-section single-sidebar">
                        <div class="blog-single-post-sidebar sidebar-inner">
                            <section class="blog-sidebar-cat blog-sidebar-cat-1">
                                <div class="section-header">
                                    <h3 class="section-title">Entertainment</h3>
                                </div>
                                <div class="blog-sidebar-cat-list">
                                    @foreach($category as $articles)

                                    <article class="blog-sidebar-cat-content d-flex mb-4">
                                        <div class="blog-sidebar-cat-thumb zoom">
                                            <img src="{{ (!empty($articles->featured_photo))?url('uploads/article-featured-image/'.$articles->featured_photo):url('uploads/article-featured-image/no-image.png') }}" alt="Conrad Hughes Hilton" class="img-fluid">
                                        </div>
                                        <div class="blog-sidebar-cat-main">
                                            <h4 class="blog-sidebar-cat-title"><a href="{{ route('article.viewDetail',$articles->slug) }}">{{ $articles->title}}</a></h4>
                                            <div class="blog-sidebar-cat-meta">
                                                <span class="blog-sidebar-cat-meta-author me-2"><i class="fa-solid fa-user me-1"></i>{{ ($articles->articleUser!=null)?$articles->articleUser->name:'N/A'}}</span>
                                                <span class="blog-sidebar-cat-meta-date"><i class="fa-solid fa-clock me-1"></i>{{ $articles->updated_at}}</span>
                                            </div>
                                        </div>
                                    </article>
                                    @endforeach
                                </div>
                            </section>
                            <section class="blog-sidebar-biography">
                                <div class="section-header d-flex justify-content-between align-items-center">
                                    <h3 class="section-title"><a href="{{ route('biography.index') }}">Biography</a></h3>
                                    <h3 class="section-view-more"><a href="{{ route('biography.index') }}">View More</a></h3>
                                </div>
                                <div class="blog-sidebar-biography-list">
                                    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 py-2">
                                        @foreach($biography as $bio)
                                        <div class="col">
                                            <article class="blog-sidebar-biography-item mb-4">
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
                                                <div class="blog-item-main text-center text-center">
                                                    <h4 class="blog-item-title py-2"><a href="">{{ $bio->title }}</a></h4>
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
        </div>
    </section>
</body>
@endsection