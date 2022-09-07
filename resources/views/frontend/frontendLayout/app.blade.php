<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creative Seo</title>
    <meta name="description" content="Meta Description">
    <meta name="keywords" content="Meta Description">
    <meta name="robots" content="index, follow">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="{{ asset('css/frontend-style.css') }}">
</head>

<body>

    <!-- Navigation Start -->
    <nav class="navigation navbar navbar-expand-lg bg-light shadow-sm sticky-top">
        <div class="container">
            <button class="side-navbar-open-btn me-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMySidenav" aria-controls="offcanvasMySidenav">
                <i class="fa-solid fa-align-left"></i>
            </button>
            <a class="navbar-brand" href="{{ route('index') }}">
                <h5 class="mb-0">Creative Seo</h5>
            </a>
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent navigation-main">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    @php 
                    $cate = App\Category::all();
                    @endphp
                    @foreach($cate as $cat)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('article.category.view',$cat->slug) }}">{{ $cat->category_name }}</a>
                    </li>
                    @endforeach
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('biography.index') }}">Biography</a>
                    </li>
                </ul>
            </div>
            <div id="navigation-search-hook">
                <i id="navigatin-search-icon" class="fa-solid fa-magnifying-glass"></i>
            </div>
            <div id="navigation-search-form" class="border-1 clearfix" style="display: none;">
                <form method="get" action="">
                    <input name="s" type="text" class="form-control" placeholder="Enter search term and hit enter">
                </form>
            </div>
        </div>
    </nav>
    <!-- Navigation End -->

    <!-- Sidebar Menu start -->

    <div class="side-navbar offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasMySidenav" aria-labelledby="offcanvasMySidenavLabel">
        <div class="offcanvas-header shadow">
            <h5 class="offcanvas-title text-white" id="offcanvasMySidenavLabel">Creative Seo</h5>
            <button type="button " class="side-navbar-open-btn btn-close " data-bs-dismiss="offcanvas" aria-label="Close "></button>
        </div>
        <div class="offcanvas-body p-0">
            <ul class="side-navbar-menu navbar-nav text-center">
                @php 
                $cate = App\Category::all();
                @endphp
                @foreach($cate as $cat)
                <li class="nav-item"><a href="{{ route('article.category.view',$cat->slug) }}" class="nav-link">{{ $cat->category_name}}</a></li>
                @endforeach
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('biography.index') }}">Biography</a>
                </li>
            <hr>
                <li class="nav-item"><a href="#" class="nav-link">About</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Privacy Policy</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Contact Us</a></li>
            </ul>
        </div>
    </div>
    <!-- Sidebar Menu End -->

    @yield('content')

    <!-- Footer Start -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="home-newsletter mb-3">
                        <div class="single">
                            <h2>Subscribe to our Newsletter</h2>
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Enter your email">
                                <span class="input-group-btn">
                             <button class="btn btn-theme" type="submit">Subscribe</button>
                             </span>
                            </div>
                        </div>
                    </div>
                    <ul class="footer-social d-flex justify-content-center align-items-center list-unstyled mb-3">
                        <li><a href="facebook.com"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="twitter.com"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="instagra.com"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="youtube.com"><i class="fa-brands fa-youtube"></i></a></li>
                    </ul>
                    <ul class="footer-menu d-flex justify-content-center align-items-center list-unstyled mb-3">
                        <li><a href="">Home</a></li>
                        <li><a href="">Married</a></li>
                        <li><a href="">Dating</a></li>
                        <li><a href="">Relationship</a></li>
                        <li><a href="">Lifestyle</a></li>
                        <li><a href="">Biography</a></li>
                    </ul>
                    <div class="footer-copyright text-center">
                        <p class="mb-0 text-muted">Copyright &copy; 2022 Blog Name. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/frontend-main.js') }}"></script>
    <script src="{{ asset('js/ResizeSensor.js') }}"></script>
    <script src="{{ asset('js/jquery.sticky-sidebar.js') }}"></script>
</body>

</html>