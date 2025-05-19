<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ $news->title }} - SISPA UPSI</title>
    <meta name="description" content="{{ Str::limit(strip_tags($news->content), 160) }}">

    <!-- Favicons -->
    <link href="{{ asset('build/assets/img/sispalogo.png') }}" rel="icon">
    <link href="{{ asset('build/assets/img/sispalogo.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('build/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('build/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('build/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('build/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('build/assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">
    <!-- Header -->
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">
            <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
                <img src="{{ asset('build/assets/img/logoupsi1.png') }}" alt="UPSI">
                <img src="{{ asset('build/assets/img/sispalogo.png') }}" alt="SISPA">
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('home') }}#hero">Utama</a></li>
                    <li><a href="{{ route('home') }}#about">Info</a></li>
                    <li><a href="{{ route('home') }}#berita" class="active">Berita</a></li>
                    <li><a href="{{ route('home') }}#team">Galeri</a></li>
                    <li><a href="{{ route('home') }}#contact">Hubungi</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="{{ route('login') }}">Admin</a>
        </div>
    </header>

    <main class="main">
        <!-- News Article Section -->
        <section class="news-article section">
            <div class="container" data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <article class="article-content">
                            @if($news->image)
                                <div class="article-image mb-4" data-aos="zoom-in">
                                    <img src="{{ asset('storage/' . $news->image) }}"
                                         class="img-fluid rounded shadow"
                                         alt="{{ $news->title }}"
                                         onerror="this.onerror=null; this.src='{{ asset('build/assets/img/default-news.jpg') }}';">
                                </div>
                            @endif

                            <div class="article-header mb-4">
                                <h1 class="article-title" data-aos="fade-up">{{ $news->title }}</h1>
                                <div class="article-meta" data-aos="fade-up" data-aos-delay="100">
                                    <span class="date"><i class="bi bi-calendar3"></i> {{ $news->created_at->locale('ms')->isoFormat('D MMMM YYYY') }}</span>
                                    @if($news->author)
                                        <span class="author"><i class="bi bi-person"></i> {{ $news->author }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="article-body" data-aos="fade-up" data-aos-delay="200">
                                {!! nl2br(e($news->content)) !!}
                            </div>

                            @if($news->tags)
                                <div class="article-tags mt-4" data-aos="fade-up" data-aos-delay="300">
                                    @foreach(explode(',', $news->tags) as $tag)
                                        <span class="badge bg-light text-dark">{{ trim($tag) }}</span>
                                    @endforeach
                                </div>
                            @endif

                            <div class="article-footer mt-5" data-aos="fade-up" data-aos-delay="400">
                                <div class="social-share">
                                    <span class="share-text">Kongsi:</span>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                                       class="btn btn-sm btn-outline-primary" target="_blank">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($news->title) }}"
                                       class="btn btn-sm btn-outline-info" target="_blank">
                                        <i class="bi bi-twitter-x"></i>
                                    </a>
                                    <a href="https://wa.me/?text={{ urlencode($news->title . ' ' . request()->url()) }}"
                                       class="btn btn-sm btn-outline-success" target="_blank">
                                        <i class="bi bi-whatsapp"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="navigation-buttons mt-5" data-aos="fade-up" data-aos-delay="500">
                                <a href="{{ route('home') }}#berita" class="btn btn-primary">
                                    <i class="bi bi-arrow-left"></i> Kembali ke Laman Utama
                                </a>
                            </div>
                        </article>
                    </div>

                    @if(isset($relatedNews) && count($relatedNews) > 0)
                        <div class="col-lg-4">
                            <div class="related-news" data-aos="fade-left" data-aos-delay="600">
                                <h3 class="sidebar-title">Berita Berkaitan</h3>
                                <div class="sidebar-content">
                                    @foreach($relatedNews as $related)
                                        <div class="related-item">
                                            @if($related->image)
                                                <img src="{{ asset('storage/' . $related->image) }}"
                                                     class="img-fluid"
                                                     alt="{{ $related->title }}"
                                                     onerror="this.onerror=null; this.src='{{ asset('build/assets/img/default-news.jpg') }}';">
                                            @endif
                                            <div class="related-info">
                                                <h4><a href="{{ route('news.show', $related->id) }}">{{ $related->title }}</a></h4>
                                                <span class="date">{{ $related->created_at->locale('ms')->isoFormat('D MMM YYYY') }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer id="footer" class="footer position-relative light-background">
        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1">SISPA UPSI</strong> <span>All Rights Reserved</span></p>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('build/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('build/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('build/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('build/assets/js/main.js') }}"></script>
</body>

</html>
