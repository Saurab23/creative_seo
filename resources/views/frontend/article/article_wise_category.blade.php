@extends('frontend.frontendLayout.app')
@section('content')

<body>

    <section class="blog-category-post py-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header d-flex justify-content-between align-items-center">
                        <h3 class="section-title"><a href="#">{{ $single_cat->category_name }}</a></h3>
                    </div>
                </div>
            </div>
            <div class="loadMoreContentCategory row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 py-3">
                @foreach($articles as $article)
                <div class="col">
                    <article class="blog-category-item shadow mb-4">
                        <div class="blog-category-item-thumb zoom image is-4by5">
                            <a href="{{ route('article.viewDetail',$article->slug) }}">
                                <img src="{{ (!empty($article->featured_photo))?url('uploads/article-featured-image/'.$article->featured_photo):url('uploads/no-image.png') }}" class="img-fluid" alt="Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!">
                            </a>
                            <div class="blog-category-item-cat">
                                <a href="#">{{ $single_cat->category_name }}</a>
                            </div>
                        </div>
                        <div class="blog-category-item-main text-center py-3 px-2">
                            <h4 class="blog-category-item-title"><a href="#">{{ $article->title }}</a></h4>
                            <div class="blog-category-item-meta">
                                <span class="blog-category-item-meta-author">
                                    {{($article->articleUser!=null)?$article->articleUser->name:'N/A'}}
                                </span>
                                <i class="bi bi-dash-lg"></i>
                                <span class="blog-category-item-meta-date">{{ $article->posted_date }}</span>
                            </div>
                            <div class="blog-category-item-tags pt-3">
                                Tags: 
                                @foreach($article->tags as $tags)
                                <a href="#" class="btn btn-outline-danger">{{ $tags->tag_name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col text-center">
                    <!-- Load More Button -->
                    <a name="loadMoreCategoryBtn" id="loadMoreCategoryBtn" class="d-inline-block load-more-btn">Load More</a>
                </div>
            </div>
        </div>
    </section>

</body>
@endsection