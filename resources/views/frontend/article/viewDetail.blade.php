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
                        <ul>
                            <li><strong>Brooklyn Beckham revealed that he has always dreamed of being a young dad.</strong></li>
                            <li><strong>The 23-year-old revealed that he wants many kids and hopes to start a family soon.</strong></li>
                        </ul>
                        <h4>Brooklyn Beckham eager to have kids with wife Nicola Peltz</h4>
                        <p><a href="#">Brooklyn Beckham</a> confessed that he wants as many as 10 kids with his new wife <a href="#">Nicola Peltz</a>.</p>
                        <p>The photographer said that it has been his lifelong dream to become a young dad and is hoping to have a family of his own very soon with the American model.</p>
                        <figure class="figure">
                            <img src="./img/Brooklyn-Beckham-1.jpg" class="figure-img img-fluid rounded" alt="Beckham wants not less than 10 kids with his wife. source: Page Six">
                            <figcaption class="figure-caption text-center">Beckham wants not less than 10 kids with his wife. source: Page Six</figcaption>
                        </figure>
                        <blockquote>
                            <p><em>”I’ve always wanted to be a young dad and I would love to have a family soon, but whenever my wife is ready.”</em></p>
                            <p><em>”I could have like 10, but her body… it’s her decision.”</em></p>
                        </blockquote>
                    </div>
                    <div class="blog-single-post-tags">
                        Tags:
                        @foreach($article->tags as $tags)
                        <a class='btn btn-outline-danger' href="#" rel="tag">{{ $tags->tag_name}}</a>
                        @endforeach
                    </div>
                    <div class="blog-single-post-related py-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-header">
                                    <h3 class="section-title">Related Post</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-3 row-cols-lg-3">
                            @foreach($allArticle as $data)
                            <div class="col">
                                <article class="recent-post-item mb-4 mb-sm-4 mb-md-md-0 mb-lg-0 shadow">
                                    <div class="recent-post-item-thumb zoom image is-4by5">
                                        <a href="#">
                                            <img src="{{ (!empty($data->featured_photo))?url('uploads/article-featured-image/'.$data->featured_photo):url('uploads/no-image.png') }}" class="img-fluid" alt="Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!">
                                        </a>
                                        <div class="recent-post-item-cat">
                                            <a href="#">{{ $data->categories[0]->category_name}}</a>
                                        </div>
                                    </div>
                                    <div class="recent-post-item-main">
                                        <h4 class="recent-post-item-title"><a href="#">{{$data->title}}</a></h4>
                                    </div>
                                </article>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="co1-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="blog-single-post-sidebar">
                        <section class="blog-sidebar-cat blog-sidebar-cat-1">
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
                                            <span class="blog-sidebar-cat-meta-author me-2"><i class="bi bi-person me-1"></i>admin</span>
                                            <span class="blog-sidebar-cat-meta-date"><i class="bi bi-clock me-1"></i>August 15, 2022</span>
                                        </div>
                                    </div>
                                </article>
                                <article class="blog-sidebar-cat-content d-flex mb-4">
                                    <div class="blog-sidebar-cat-thumb zoom">
                                        <img src="./img/Brooklyn-Beckham.jpg" alt="Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!" class="img-fluid">
                                    </div>
                                    <div class="blog-sidebar-cat-main">
                                        <h4 class="blog-sidebar-cat-title"><a href="">Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!</a></h4>
                                        <div class="blog-sidebar-cat-meta">
                                            <span class="blog-sidebar-cat-meta-author me-2"><i class="bi bi-person me-1"></i>admin</span>
                                            <span class="blog-sidebar-cat-meta-date"><i class="bi bi-clock me-1"></i>August 15, 2022</span>
                                        </div>
                                    </div>
                                </article>
                                <article class="blog-sidebar-cat-content d-flex mb-4">
                                    <div class="blog-sidebar-cat-thumb zoom">
                                        <img src="./img/Brooklyn-Beckham.jpg" alt="Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!" class="img-fluid">
                                    </div>
                                    <div class="blog-sidebar-cat-main">
                                        <h4 class="blog-sidebar-cat-title"><a href="">Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!</a></h4>
                                        <div class="blog-sidebar-cat-meta">
                                            <span class="blog-sidebar-cat-meta-author me-2"><i class="bi bi-person me-1"></i>admin</span>
                                            <span class="blog-sidebar-cat-meta-date"><i class="bi bi-clock me-1"></i>August 15, 2022</span>
                                        </div>
                                    </div>
                                </article>
                                <article class="blog-sidebar-cat-content d-flex mb-4">
                                    <div class="blog-sidebar-cat-thumb zoom">
                                        <img src="./img/Brooklyn-Beckham.jpg" alt="Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!" class="img-fluid">
                                    </div>
                                    <div class="blog-sidebar-cat-main">
                                        <h4 class="blog-sidebar-cat-title"><a href="">Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!</a></h4>
                                        <div class="blog-sidebar-cat-meta">
                                            <span class="blog-sidebar-cat-meta-author me-2"><i class="bi bi-person me-1"></i>admin</span>
                                            <span class="blog-sidebar-cat-meta-date"><i class="bi bi-clock me-1"></i>August 15, 2022</span>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </section>
                        <section class="blog-sidebar-biography">
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
@endsection