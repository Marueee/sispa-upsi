<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SISPA UPSI</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('build/assets/img/sispalogo.png') }}" rel="icon">
    <link href="{{ asset('build/assets/img/sispalogo.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('build/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('build/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('build/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('build/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('build/assets/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Scout
  * Template URL: https://bootstrapmade.com/scout-bootstrap-multipurpose-template/
  * Updated: May 05 2025 with Bootstrap v5.3.5
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="index.php" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('build/assets/img/logoupsi1.png') }}" alt="">
                <img src="{{ asset('build/assets/img/sispalogo.png') }}" alt="">
                {{-- <h1 class="sitename">SISPA</h1> --}}

            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Utama</a></li>
                    <li><a href="#about">Info</a></li>
                    <li><a href="#berita">Berita</a></li>
                    <li><a href="#team">Galeri</a></li>
                    <li class="dropdown"><a href="#"><span>Borang</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#">Dropdown 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                                        class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="#">Deep Dropdown 1</a></li>
                                    <li><a href="#">Deep Dropdown 2</a></li>
                                    <li><a href="#">Deep Dropdown 3</a></li>
                                    <li><a href="#">Deep Dropdown 4</a></li>
                                    <li><a href="#">Deep Dropdown 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Dropdown 2</a></li>
                            <li><a href="#">Dropdown 3</a></li>
                            <li><a href="#">Dropdown 4</a></li>
                        </ul>
                    </li>
                    <li><a href="#contact">Hubungi</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="{{ route('login') }}">Admin</a>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">
            <div class="container" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="hero-content" data-aos="fade-up" data-aos-delay="100">
                            {{-- <div class="hero-tag">
                                <i class="bi bi-rocket-takeoff"></i>
                                <span>Innovative Solutions</span>
                            </div> --}}
                            <h1>Kor Siswa-Siswi Pertahanan Awam <span class="highlight">(KOR SISPA)</span> UPSI</h1>
                            <p class="lead">Merupakan sebuah badan beruniform di Universiti Pendidikan Sultan Idris
                                (UPSI) yang bertujuan untuk memupuk semangat kesukarelawanan, kerjasama dan jati diri
                                dalam kalangan mahasiswa.</p>
                            <ul class="hero-features" class="mb-2 fw-bold" style="list-style:none;">
                                <i class="text-primary me-2"></i> Objektif utama penubuhan SISPA ialah:
                                </li>
                                <li style="height: 8px; border: none; background: none;"></li>
                                <li><i class="bi bi-check-circle"></i> Meningkatkan tahap disiplin dan semangat jati
                                    diri dalam kalangan pelajar.</li>
                                <li><i class="bi bi-check-circle"></i> Melahirkan graduan yang bersedia menyumbang
                                    kepada pasukan keselamatan negara secara sukarela.</li>
                                <li><i class="bi bi-check-circle"></i> Memupuk nilai kepimpinan, kerjasama dan daya
                                    tahan fizikal dan mental.</li>
                            </ul>
                            <div class="hero-cta">
                             <a href="{{ route('sispa.register.form') }}" class="btn btn-primary">Borang Pendaftaran</a>
                            </div>
                        </div>
                    </div>
                    {{-- Image Section --}}
                    <div class="col-lg-6">
                        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner rounded-4 shadow">
                                <div class="carousel-item active">
                                    <img src="{{ asset('build/assets/img/gambar-depan1.jpg') }}" class="d-block w-100"
                                        alt="SISPA Image 1">
                                </div>
                                <div class="carousel-item active">
                                    <img src="{{ asset('build/assets/img/gambar-depan2.jpg') }}" class="d-block w-100"
                                        alt="SISPA Image 2">
                                </div>
                                <div class="carousel-item active">
                                    <img src="{{ asset('build/assets/img/gambar-depan3.jpg') }}"
                                        class="d-block w-100" alt="SISPA Image 3">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Quotes Section --}}
                    <div id="siswaQuotesCarousel" class="carousel slide py-4" data-bs-ride="carousel"
                        data-bs-interval="6000">
                        <div class="carousel-inner bg-light p-4 rounded shadow">
                            <div class="carousel-item active text-center">
                                <p class="fs-5 fst-italic" style="color: #000;">
                                    “SISPA bukan sekadar latihan ketenteraan, ia adalah latihan hidup yang membentuk
                                    siapa anda di masa hadapan. Di sinilah anda belajar erti tanggungjawab, keberanian
                                    dan setiakawan.”
                                </p>
                                <h6 class="fw-bold mt-3" style="color: var(--accent-color);">— Kapten (PA) Ahmad
                                    Faizal
                                    Bin Zainal, Pegawai Latihan SISPA
                                    UPSI</h6>
                            </div>
                            <div class="carousel-item text-center">
                                <p class="fs-5 fst-italic" style="color: #000;">
                                    “SISPA UPSI menggilap potensi kepimpinan pelajar dalam suasana berdisiplin dan penuh
                                    cabaran. Ini adalah ruang terbaik untuk anda menjadi lebih dari sekadar mahasiswa.”
                                </p>
                                <h6 class="fw-bold mt-3" style="color: var(--accent-color);">— Mejar (K) Dr. Norazlina
                                    Binti Razali, Penasihat SISPA UPSI
                                </h6>
                            </div>
                            <div class="carousel-item text-center">
                                <p class="fs-5 fst-italic" style="color: #000;">
                                    “Setiap latihan adalah peluang. Setiap cabaran adalah ruang untuk kita jadi lebih
                                    kuat. SISPA telah mengubah cara saya melihat dunia.”
                                </p>
                                <h6 class="fw-bold mt-3" style="color: var(--accent-color);">— Kadet Sarjan Nur Aina
                                    Izzati, Ketua Platun SISPA UPSI 2024
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Hero Section -->

        <!-- Info Section -->
        <section id="about" class="about section">
            {{-- Misi & Visi SISPA UPSI --}}
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-8 text-center" data-aos="fade-up" data-aos-delay="200">
                        <h2 class="section-heading">Objektif SISPA UPSI</h2>
                        <h3 class="section-subheading">Misi</h3>
                        <p class="lead">Melahirkan graduan yang berpengetahuan, berdisiplin dan bersemangat patriotik
                            melalui penglibatan dalam latihan ketenteraan sukarela serta program kemasyarakatan
                            berstruktur.</p>
                        <h3 class="section-subheading">Visi</h3>
                        <p class="lead">Menjadi pasukan beruniform terunggul di peringkat IPT dalam membentuk
                            kepimpinan mahasiswa berteraskan nilai pertahanan dan khidmat awam.</p>
                    </div>
                </div>

                <div class="row g-4 mb-5">
                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-box">
                            <div class="icon-container">
                                <i class="bi bi-lightbulb"></i>
                            </div>
                            <h4>Kesedaran</h4>
                            <p>Meningkatkan kesedaran dan kefahaman pelajar terhadap peranan pertahanan awam.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-box">
                            <div class="icon-container">
                                <i class="bi bi-tools"></i>
                            </div>
                            <h4>Kemahiran</h4>
                            <p>Menyediakan latihan asas dalam pengurusan bencana, keselamatan dan kecemasan.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                        <div class="feature-box">
                            <div class="icon-container">
                                <i class="bi-diagram-3"></i>
                            </div>
                            <h4>Kepimpinan</h4>
                            <p>Membina kemahiran insaniah seperti komunikasi, kepimpinan, dan kerjasama berpasukan.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                        <div class="feature-box">
                            <div class="icon-container">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <h4>Khidmat Masyarakat</h4>
                            <p>Memberikan ruang kepada pelajar menyumbang kepada masyarakat melalui aktiviti khidmat
                                sosial.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Testimonials Section -->
                <section id="syarat-kelayakan" class="about section">
                    <div class="container" data-aos="fade-up" data-aos-delay="100">
                        <div class="row justify-content-center mb-5">
                            <div class="col-lg-8 text-center" data-aos="fade-up" data-aos-delay="200">
                                <h2 class="section-heading">Syarat Kelayakan</h2>
                                <p class="lead">Berikut merupakan syarat asas penyertaan dalam Unit SISPA UPSI:</p>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <!-- Item 1 -->
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                                <div class="feature-box p-3 border rounded shadow-sm h-100">
                                    <div class="icon-container mb-2">
                                        <i class="bi bi-person-check fs-3"></i>
                                    </div>
                                    <h5 class="mb-2">Warganegara Malaysia</h5>
                                    <p class="small">Terbuka kepada semua pelajar warganegara Malaysia yang berdaftar di UPSI.</p>
                                </div>
                            </div>

                            <!-- Item 2 -->
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="feature-box p-3 border rounded shadow-sm h-100">
                                    <div class="icon-container mb-2">
                                        <i class="bi bi-clipboard-plus fs-3"></i>
                                    </div>
                                    <h5 class="mb-2">Status Kesihatan Baik</h5>
                                    <p class="small">Tiada masalah kesihatan serius yang menghalang aktiviti fizikal dan latihan ketenteraan ringan.</p>
                                </div>
                            </div>

                            <!-- Item 3 -->
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                                <div class="feature-box p-3 border rounded shadow-sm h-100">
                                    <div class="icon-container mb-2">
                                        <i class="bi bi-mortarboard fs-3"></i>
                                    </div>
                                    <h5 class="mb-2">Komitmen Akademik</h5>
                                    <p class="small">Mampu menyeimbangkan jadual kuliah dengan latihan SISPA tanpa menjejaskan prestasi akademik.</p>
                                </div>
                            </div>

                            <!-- Item 4 -->
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                                <div class="feature-box p-3 border rounded shadow-sm h-100">
                                    <div class="icon-container mb-2">
                                        <i class="bi bi-people fs-3"></i>
                                    </div>
                                    <h5 class="mb-2">Kemahiran Bekerja Dalam Kumpulan</h5>
                                    <p class="small">Mempunyai semangat kerjasama dan sanggup mematuhi disiplin serta arahan pegawai latihan.</p>
                                </div>
                            </div>

                            <!-- Item 5 -->
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                                <div class="feature-box p-3 border rounded shadow-sm h-100">
                                    <div class="icon-container mb-2">
                                        <i class="bi bi-shield-check fs-3"></i>
                                    </div>
                                    <h5 class="mb-2">Rekod Disiplin Baik</h5>
                                    <p class="small">Tidak mempunyai rekod tatatertib atau penglibatan dalam aktiviti tidak bermoral.</p>
                                </div>
                            </div>

                            <!-- Item 6 -->
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="600">
                                <div class="feature-box p-3 border rounded shadow-sm h-100">
                                    <div class="icon-container mb-2">
                                        <i class="bi bi-hourglass-split fs-3"></i>
                                    </div>
                                    <h5 class="mb-2">Ketersediaan Masa</h5>
                                    <p class="small">Sanggup menghadiri latihan mingguan, perkhemahan, dan aktiviti Kor SISPA sepanjang pengajian.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- Carta Organisasi --}}

                {{-- <div class="row align-items-center about-showcase">
                    <div class="col-lg-6 order-lg-2" data-aos="fade-left" data-aos-delay="300">
                        <div class="about-image-grid">
                            <img src="assets/img/about/about-15.webp" class="img-grid-main" alt="Our company vision">
                            <img src="assets/img/about/about-17.webp" class="img-grid-secondary" alt="Our team">
                            <img src="assets/img/about/about-square-5.webp" class="img-grid-tertiary"
                                alt="Our workspace">
                            <div class="experience-badge" data-aos="zoom-in" data-aos-delay="500">
                                <span class="years">15+</span>
                                <span class="text">Years of Excellence</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-1" data-aos="fade-right" data-aos-delay="200">
                        <div class="about-content-box">
                            <h3>Transforming Businesses Since 2008</h3>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin gravida
                                tortor in lectus
                                pharetra, at iaculis orci scelerisque. Cras porta enim id neque interdum, at fermentum
                                odio venenatis.
                            </p>

                            <div class="progress-item">
                                <div class="d-flex justify-content-between">
                                    <span class="progress-title">Strategic Planning</span>
                                    <span class="progress-percent">94%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 94%"
                                        aria-valuenow="94" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="progress-item">
                                <div class="d-flex justify-content-between">
                                    <span class="progress-title">Business Development</span>
                                    <span class="progress-percent">87%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 87%"
                                        aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="progress-item">
                                <div class="d-flex justify-content-between">
                                    <span class="progress-title">Market Research</span>
                                    <span class="progress-percent">92%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 92%"
                                        aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <a href="about.html" class="btn btn-discover mt-4">Learn More About Us</a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </section>
        <!-- /About Section -->

        <!-- Stats Section -->
        {{-- <section id="stats" class="stats section light-background">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-6 col-md-12">
                        <div class="stats-overview text-center text-lg-start" data-aos="fade-right"
                            data-aos-delay="200">
                            <h3>Our growth in numbers</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod magna vel libero
                                tincidunt, in
                                finibus nisi faucibus. Proin vel erat nec orci sagittis ullamcorper vel at urna.</p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="stats-grid" data-aos="zoom-in" data-aos-delay="300">
                            <div class="stats-card">
                                <div class="stats-icon">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                                <div class="stats-content">
                                    <div class="stats-number">
                                        <span data-purecounter-start="0" data-purecounter-end="232"
                                            data-purecounter-duration="1" class="purecounter"></span><span
                                            class="plus">+</span>
                                    </div>
                                    <p>Happy Clients</p>
                                </div>
                            </div>

                            <div class="stats-card">
                                <div class="stats-icon">
                                    <i class="bi bi-folder2-open"></i>
                                </div>
                                <div class="stats-content">
                                    <div class="stats-number">
                                        <span data-purecounter-start="0" data-purecounter-end="521"
                                            data-purecounter-duration="1" class="purecounter"></span><span
                                            class="plus">+</span>
                                    </div>
                                    <p>Completed Projects</p>
                                </div>
                            </div>

                            <div class="stats-card">
                                <div class="stats-icon">
                                    <i class="bi bi-headset"></i>
                                </div>
                                <div class="stats-content">
                                    <div class="stats-number">
                                        <span data-purecounter-start="0" data-purecounter-end="1453"
                                            data-purecounter-duration="1" class="purecounter"></span><span
                                            class="plus">+</span>
                                    </div>
                                    <p>Support Hours</p>
                                </div>
                            </div>

                            <div class="stats-card">
                                <div class="stats-icon">
                                    <i class="bi bi-person-workspace"></i>
                                </div>
                                <div class="stats-content">
                                    <div class="stats-number">
                                        <span data-purecounter-start="0" data-purecounter-end="32"
                                            data-purecounter-duration="1" class="purecounter"></span><span
                                            class="plus">+</span>
                                    </div>
                                    <p>Expert Team Members</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section> --}}
        <!-- /Stats Section -->

        <!-- Berita Section -->
        <section id="berita" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2 class="section-heading">Berita Terkini</h2>
                <p>Ikuti perkembangan dan aktiviti semasa Kor SISPA UPSI</p>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="services-row">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="services-headline" data-aos="fade-up">
                                <p class="services-subtitle">Aktiviti & Pencapaian</p>
                                <h2 class="services-title">Berita Kor SISPA UPSI</h2>
                            </div>

                            <div class="services-description" data-aos="fade-up" data-aos-delay="100">
                                <p>Dapatkan maklumat terkini tentang latihan, program masyarakat dan pencapaian kadet
                                    SISPA di UPSI.</p>
                            </div>
                        </div>

                        <div class="col-lg-6 mx-auto">
                            <div id="beritaCarousel" class="carousel slide" data-bs-ride="carousel"
                                data-bs-interval="5000">
                                <div class="carousel-inner">
                                    @forelse($news as $key => $item)
                                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                        <div class="service-card h-100">
                                            @if($item->image)
                                            <!-- Debug info -->
                                            <div class="d-none">
                                                Image path: {{ $item->image }}<br>
                                                Full URL: {{ asset('storage/' . $item->image) }}
                                            </div>
                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                alt="{{ $item->title }}" class="img-fluid w-100 rounded shadow-sm"
                                                onerror="this.onerror=null; this.src='{{ asset('build/assets/img/default-news.jpg') }}';">
                                            @else
                                            <img src="{{ asset('build/assets/img/default-news.jpg') }}"
                                                alt="{{ $item->title }}" class="img-fluid w-100 rounded shadow-sm">
                                            @endif
                                            <div class="service-content text-center p-3">
                                                <div class="service-info">
                                                    <h3><a href="#">{{ $item->title }}</a></h3>
                                                    <p>{{ Str::limit($item->content, 100) }}</p>
                                                    <div class="service-action">
                                                        <a href="{{ route('news.show', $item->id) }}" class="read-more-btn">Baca
                                                            Selanjutnya <i class="bi bi-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="carousel-item active">
                                        <div class="service-card h-100">
                                            <div class="service-content text-center p-3">
                                                <div class="service-info">
                                                    <h3>Tiada Berita</h3>
                                                    <p>Tiada berita terkini pada masa ini.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforelse
                                </div>

                                <!-- Custom Stylish Navigation Buttons -->
                                <div class="berita-navigation text-center mt-4">
                                    <button class="berita-nav-prev custom-arrow-btn me-2">
                                        <i class="bi bi-arrow-left"></i>
                                    </button>
                                    <button class="berita-nav-next custom-arrow-btn">
                                        <i class="bi bi-arrow-right"></i>
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- /Berita Section -->

        <!-- Clients Section -->
        <section id="clients" class="clients section">
            <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

                <!-- Track 1: Scroll Left -->
                <div class="clients-slider">
                    <div class="clients-track track-1" data-aos="fade-right" data-aos-delay="200">
                        @for ($i = 0; $i < 2; $i++)
                            <!-- Duplicate for seamless loop -->
                            <div class="clients-slide">
                                <img src="{{ asset('build/assets/img/kptlogo.png') }}" class="img-fluid"
                                    alt="KPT">
                            </div>
                            <div class="clients-slide">
                                <img src="{{ asset('build/assets/img/logoupsi1.png') }}" class="img-fluid"
                                    alt="UPSI">
                            </div>
                            <div class="clients-slide">
                                <img src="{{ asset('build/assets/img/logo100.png') }}" class="img-fluid"
                                    alt="Logo100">
                            </div>
                            <div class="clients-slide">
                                <img src="{{ asset('build/assets/img/sispalogo.png') }}" class="img-fluid"
                                    alt="SISPA">
                            </div>
                            @endfor
                    </div>
                </div>

                <!-- Track 2: Scroll Right -->
                <div class="clients-slider">
                    <div class="clients-track track-2" data-aos="fade-left" data-aos-delay="300">
                        @for ($i = 0; $i < 2; $i++)
                            <!-- Duplicate for seamless loop -->
                            <div class="clients-slide">
                                <img src="{{ asset('build/assets/img/sispalogo.png') }}" class="img-fluid"
                                    alt="SISPA">
                            </div>
                            <div class="clients-slide">
                                <img src="{{ asset('build/assets/img/logo100.png') }}" class="img-fluid"
                                    alt="Logo100">
                            </div>
                            <div class="clients-slide">
                                <img src="{{ asset('build/assets/img/logoupsi1.png') }}" class="img-fluid"
                                    alt="UPSI">
                            </div>
                            <div class="clients-slide">
                                <img src="{{ asset('build/assets/img/kptlogo.png') }}" class="img-fluid"
                                    alt="KPT">
                            </div>
                            @endfor
                    </div>
                </div>

            </div>
        </section>






        <!-- How We Work Section -->
        <section id="how-we-work" class="how-we-work section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>How We Work</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="steps-wrapper">

                    <div class="step-item" data-aos="fade-right" data-aos-delay="200">
                        <div class="step-content">
                            <div class="step-icon">
                                <i class="bi bi-lightbulb"></i>
                            </div>
                            <div class="step-info">
                                <span class="step-number">Step 01</span>
                                <h3>Initial Consultation</h3>
                                <p>Conducting thorough discovery sessions to understand your business requirements and
                                    objectives. Our
                                    expert team analyzes your needs to create a customized approach.</p>
                            </div>
                        </div>
                    </div><!-- End Step Item -->

                    <div class="step-item" data-aos="fade-left" data-aos-delay="300">
                        <div class="step-content">
                            <div class="step-icon">
                                <i class="bi bi-gear"></i>
                            </div>
                            <div class="step-info">
                                <span class="step-number">Step 02</span>
                                <h3>Planning &amp; Strategy</h3>
                                <p>Developing comprehensive strategies and detailed project plans based on the initial
                                    consultation. We
                                    create actionable roadmaps with clear milestones and deliverables.</p>
                            </div>
                        </div>
                    </div><!-- End Step Item -->

                    <div class="step-item" data-aos="fade-right" data-aos-delay="400">
                        <div class="step-content">
                            <div class="step-icon">
                                <i class="bi bi-bar-chart"></i>
                            </div>
                            <div class="step-info">
                                <span class="step-number">Step 03</span>
                                <h3>Development Phase</h3>
                                <p>Executing the planned strategies with precision and agility. Our team implements
                                    solutions while
                                    maintaining constant communication and progress updates.</p>
                            </div>
                        </div>
                    </div><!-- End Step Item -->

                    <div class="step-item" data-aos="fade-left" data-aos-delay="500">
                        <div class="step-content">
                            <div class="step-icon">
                                <i class="bi bi-check2-circle"></i>
                            </div>
                            <div class="step-info">
                                <span class="step-number">Step 04</span>
                                <h3>Launch &amp; Support</h3>
                                <p>Ensuring smooth deployment and providing ongoing support for implemented solutions.
                                    We monitor
                                    performance and make necessary adjustments for optimal results.</p>
                            </div>
                        </div>
                    </div><!-- End Step Item -->

                </div>

            </div>

        </section><!-- /How We Work Section -->

        <!-- Faq Section -->
        <section id="faq" class="faq section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Frequently Asked Questions</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row justify-content-center">
                    <div class="col-lg-10">

                        <div class="faq-tabs mb-5">
                            <ul class="nav nav-pills justify-content-center" id="faqTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="general-tab" data-bs-toggle="pill"
                                        data-bs-target="#faq-general" type="button" role="tab"
                                        aria-controls="general" aria-selected="true">
                                        <i class="bi bi-question-circle me-2"></i>General
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pricing-tab" data-bs-toggle="pill"
                                        data-bs-target="#faq-pricing" type="button" role="tab"
                                        aria-controls="pricing" aria-selected="false">
                                        <i class="bi bi-credit-card me-2"></i>Pricing
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="support-tab" data-bs-toggle="pill"
                                        data-bs-target="#faq-support" type="button" role="tab"
                                        aria-controls="support" aria-selected="false">
                                        <i class="bi bi-headset me-2"></i>Support
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="faqTabContent">
                            <!-- General FAQs -->
                            <div class="tab-pane fade show active" id="faq-general" role="tabpanel"
                                aria-labelledby="general-tab">
                                <div class="faq-list">

                                    <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                                        <h3>
                                            <span class="num">1</span>
                                            <span class="question">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit?</span>
                                            <i class="bi bi-plus-lg faq-toggle"></i>
                                        </h3>
                                        <div class="faq-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse
                                                varius enim in eros
                                                elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor
                                                interdum nulla, ut commodo
                                                diam libero vitae erat.</p>
                                        </div>
                                    </div><!-- End FAQ Item -->

                                    <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                                        <h3>
                                            <span class="num">2</span>
                                            <span class="question">Feugiat scelerisque varius morbi enim nunc faucibus
                                                a pellentesque?</span>
                                            <i class="bi bi-plus-lg faq-toggle"></i>
                                        </h3>
                                        <div class="faq-content">
                                            <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi.
                                                Id interdum velit
                                                laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque
                                                eleifend donec pretium. Est
                                                pellentesque elit ullamcorper dignissim.</p>
                                            <p>Mauris ultrices eros in cursus turpis massa tincidunt dui. Pellentesque
                                                nec nam aliquam sem et
                                                tortor. Habitant morbi tristique senectus et netus et malesuada.</p>
                                        </div>
                                    </div><!-- End FAQ Item -->

                                    <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                                        <h3>
                                            <span class="num">3</span>
                                            <span class="question">Dolor sit amet consectetur adipiscing elit
                                                pellentesque?</span>
                                            <i class="bi bi-plus-lg faq-toggle"></i>
                                        </h3>
                                        <div class="faq-content">
                                            <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci.
                                                Faucibus pulvinar
                                                elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit.
                                                Rutrum tellus
                                                pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus.
                                            </p>
                                            <p>Mauris ultrices eros in cursus turpis massa tincidunt dui. Pellentesque
                                                nec nam aliquam sem et
                                                tortor. Habitant morbi tristique senectus et netus et malesuada.</p>
                                        </div>
                                    </div><!-- End FAQ Item -->

                                </div>
                            </div>

                            <!-- Pricing FAQs -->
                            <div class="tab-pane fade" id="faq-pricing" role="tabpanel"
                                aria-labelledby="pricing-tab">
                                <div class="faq-list">

                                    <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                                        <h3>
                                            <span class="num">1</span>
                                            <span class="question">Ac odio tempor orci dapibus ultrices in
                                                iaculis?</span>
                                            <i class="bi bi-plus-lg faq-toggle"></i>
                                        </h3>
                                        <div class="faq-content">
                                            <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim
                                                suspendisse in est ante
                                                in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl
                                                suscipit adipiscing bibendum
                                                est. Purus gravida quis blandit turpis cursus in.</p>
                                        </div>
                                    </div><!-- End FAQ Item -->

                                    <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                                        <h3>
                                            <span class="num">2</span>
                                            <span class="question">Tempus quam pellentesque nec nam aliquam sem et
                                                tortor consequat?</span>
                                            <i class="bi bi-plus-lg faq-toggle"></i>
                                        </h3>
                                        <div class="faq-content">
                                            <p>Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae
                                                ultricies leo integer
                                                malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis
                                                nunc eget lorem dolor
                                                sed. Ut venenatis tellus in metus vulputate eu scelerisque.</p>
                                            <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim
                                                suspendisse in est ante
                                                in. Nunc vel risus commodo viverra maecenas accumsan.</p>
                                        </div>
                                    </div><!-- End FAQ Item -->

                                    <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                                        <h3>
                                            <span class="num">3</span>
                                            <span class="question">Varius vel pharetra vel turpis nunc eget lorem
                                                dolor?</span>
                                            <i class="bi bi-plus-lg faq-toggle"></i>
                                        </h3>
                                        <div class="faq-content">
                                            <p>Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae
                                                ultricies leo integer
                                                malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis
                                                nunc eget lorem dolor
                                                sed. Ut venenatis tellus in metus vulputate eu scelerisque.</p>
                                        </div>
                                    </div><!-- End FAQ Item -->

                                </div>
                            </div>

                            <!-- Support FAQs -->
                            <div class="tab-pane fade" id="faq-support" role="tabpanel"
                                aria-labelledby="support-tab">
                                <div class="faq-list">

                                    <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                                        <h3>
                                            <span class="num">1</span>
                                            <span class="question">Tortor vitae purus faucibus ornare suspendisse sed
                                                nisi lacus?</span>
                                            <i class="bi bi-plus-lg faq-toggle"></i>
                                        </h3>
                                        <div class="faq-content">
                                            <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat
                                                lacus laoreet non
                                                curabitur gravida. Venenatis lectus magna fringilla urna porttitor
                                                rhoncus dolor purus non.</p>
                                            <p>Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra
                                                maecenas accumsan. Sit
                                                amet nisl suscipit adipiscing bibendum est.</p>
                                        </div>
                                    </div><!-- End FAQ Item -->

                                    <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                                        <h3>
                                            <span class="num">2</span>
                                            <span class="question">Tortor dignissim convallis aenean et tortor at risus
                                                viverra?</span>
                                            <i class="bi bi-plus-lg faq-toggle"></i>
                                        </h3>
                                        <div class="faq-content">
                                            <p>In hac habitasse platea dictumst vestibulum rhoncus est pellentesque.
                                                Dictumst vestibulum
                                                rhoncus est pellentesque elit ullamcorper. Non diam phasellus vestibulum
                                                lorem sed. Platea
                                                dictumst quisque sagittis purus sit.</p>
                                        </div>
                                    </div><!-- End FAQ Item -->

                                    <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                                        <h3>
                                            <span class="num">3</span>
                                            <span class="question">Venenatis urna cursus eget nunc scelerisque viverra
                                                mauris in?</span>
                                            <i class="bi bi-plus-lg faq-toggle"></i>
                                        </h3>
                                        <div class="faq-content">
                                            <p>Mauris ultrices eros in cursus turpis massa tincidunt dui. Pellentesque
                                                nec nam aliquam sem et
                                                tortor. Habitant morbi tristique senectus et netus et malesuada.</p>
                                            <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci.
                                                Faucibus pulvinar
                                                elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit.
                                            </p>
                                        </div>
                                    </div><!-- End FAQ Item -->

                                </div>
                            </div>
                        </div>

                        <div class="faq-cta text-center mt-5" data-aos="fade-up" data-aos-delay="300">
                            <p>Still have questions? We're here to help!</p>
                            <a href="#" class="btn btn-primary">Contact Support</a>
                        </div>

                    </div>
                </div>

            </div>

        </section><!-- /Faq Section -->

        <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section light-background">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="cta-wrapper">
                    <div class="cta-content" data-aos="fade-right" data-aos-delay="200">
                        <h2>Unlock Your Full Potential Today!</h2>
                        <p>Join thousands of satisfied customers who have transformed their lives with our innovative
                            solutions.</p>
                        <div class="cta-buttons">
                            <a href="#" class="btn-primary">Get Started Now</a>
                            <a href="#" class="btn-outline">Learn More</a>
                        </div>
                    </div>
                    <div class="cta-image" data-aos="fade-left" data-aos-delay="300">
                        <img src="assets/img/illustration/illustration-13.webp" alt="CTA Illustration"
                            class="img-fluid">
                    </div>
                </div>
            </div>
        </section><!-- /Call To Action Section -->

        <!-- Team Section -->
        <section id="team" class="team section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Team</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row">
                    <div class="col-lg-4 team-intro" data-aos="fade-right" data-aos-delay="200">
                        <div class="team-intro-content">
                            <h2>Meet Our Experts</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vestibulum dui sed justo
                                finibus, in
                                gravida felis iaculis. Suspendisse potenti.</p>
                            <div class="team-navigation">
                                <button class="team-nav-prev"><i class="bi bi-arrow-left"></i></button>
                                <button class="team-nav-next"><i class="bi bi-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 team-carousel-wrap">
                        <div class="team-carousel swiper init-swiper">
                            <script type="application/json" class="swiper-config">
                                {
                                    "loop": true,
                                    "speed": 800,
                                    "autoplay": {
                                        "delay": 5000
                                    },
                                    "slidesPerView": 1,
                                    "spaceBetween": 20,
                                    "navigation": {
                                        "nextEl": ".team-nav-next",
                                        "prevEl": ".team-nav-prev"
                                    },
                                    "breakpoints": {
                                        "576": {
                                            "slidesPerView": 2,
                                            "spaceBetween": 20
                                        },
                                        "992": {
                                            "slidesPerView": 2,
                                            "spaceBetween": 30
                                        }
                                    }
                                }
                            </script>
                            <div class="swiper-wrapper">

                                <div class="swiper-slide">
                                    <div class="member-card">
                                        <div class="member-image">
                                            <img src="assets/img/person/person-m-3.webp" class="img-fluid"
                                                alt="" loading="lazy">
                                        </div>
                                        <div class="member-info">
                                            <h3>Marcus Wilson</h3>
                                            <span>Chief Technology Officer</span>
                                            <div class="member-social">
                                                <a href="#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="#"><i class="bi bi-facebook"></i></a>
                                                <a href="#"><i class="bi bi-linkedin"></i></a>
                                            </div>
                                            <div class="member-bio">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit
                                                    tellus, luctus nec
                                                    ullamcorper mattis.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End slide item -->

                                <div class="swiper-slide">
                                    <div class="member-card">
                                        <div class="member-image">
                                            <img src="assets/img/person/person-f-5.webp" class="img-fluid"
                                                alt="" loading="lazy">
                                        </div>
                                        <div class="member-info">
                                            <h3>Sophia Reynolds</h3>
                                            <span>Product Designer</span>
                                            <div class="member-social">
                                                <a href="#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="#"><i class="bi bi-facebook"></i></a>
                                                <a href="#"><i class="bi bi-linkedin"></i></a>
                                            </div>
                                            <div class="member-bio">
                                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                                    dolore eu fugiat nulla
                                                    pariatur.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End slide item -->

                                <div class="swiper-slide">
                                    <div class="member-card">
                                        <div class="member-image">
                                            <img src="assets/img/person/person-m-8.webp" class="img-fluid"
                                                alt="" loading="lazy">
                                        </div>
                                        <div class="member-info">
                                            <h3>Daniel Chen</h3>
                                            <span>Marketing Specialist</span>
                                            <div class="member-social">
                                                <a href="#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="#"><i class="bi bi-facebook"></i></a>
                                                <a href="#"><i class="bi bi-linkedin"></i></a>
                                            </div>
                                            <div class="member-bio">
                                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                                    officia deserunt mollit
                                                    anim id est laborum.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End slide item -->

                                <div class="swiper-slide">
                                    <div class="member-card">
                                        <div class="member-image">
                                            <img src="assets/img/person/person-f-9.webp" class="img-fluid"
                                                alt="" loading="lazy">
                                        </div>
                                        <div class="member-info">
                                            <h3>Olivia Thompson</h3>
                                            <span>Lead Developer</span>
                                            <div class="member-social">
                                                <a href="#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="#"><i class="bi bi-facebook"></i></a>
                                                <a href="#"><i class="bi bi-linkedin"></i></a>
                                            </div>
                                            <div class="member-bio">
                                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                                    accusantium doloremque
                                                    laudantium.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End slide item -->

                                <div class="swiper-slide">
                                    <div class="member-card">
                                        <div class="member-image">
                                            <img src="assets/img/person/person-m-12.webp" class="img-fluid"
                                                alt="" loading="lazy">
                                        </div>
                                        <div class="member-info">
                                            <h3>Jason Parker</h3>
                                            <span>UI/UX Designer</span>
                                            <div class="member-social">
                                                <a href="#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="#"><i class="bi bi-facebook"></i></a>
                                                <a href="#"><i class="bi bi-linkedin"></i></a>
                                            </div>
                                            <div class="member-bio">
                                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                                    fugit, sed quia
                                                    consequuntur magni.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End slide item -->

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- /Team Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-main-wrapper">
                    <div class="map-wrapper">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7968.348052703456!2d101.52177712512668!3d3.7149468443338587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdcb0e36134b99%3A0xdf5cb0dfcb92cf6b!2sUniversiti%20Pendidikan%20Sultan%20Idris%20(UPSI)!5e0!3m2!1sen!2smy!4v1715867620002!5m2!1sen!2smy"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <div class="contact-content">
                        <div class="contact-cards-container" data-aos="fade-up" data-aos-delay="300">
                            <div class="contact-card">
                                <div class="icon-box">
                                    <i class="bi bi-geo-alt"></i>
                                </div>
                                <div class="contact-text">
                                    <h4>Lokasi</h4>
                                    <p>Bilik 07, Tingkat 1, Blok 1, Kampus Sultan Azlan Shah, Universiti Pendidikan Sultan Idris, 35900 Tanjong Malim, Perak Darul Ridzuan</p>
                                </div>
                            </div>

                            <div class="contact-card">
                                <div class="icon-box">
                                    <i class="bi bi-envelope"></i>
                                </div>
                                <div class="contact-text">
                                    <h4>Email</h4>
                                    <p>korsispaupsi20@gmail.com</p>
                                </div>
                            </div>

                            <div class="contact-card">
                                <div class="icon-box">
                                    <i class="bi bi-telephone"></i>
                                </div>
                                <div class="contact-text">
                                    <h4>Tel</h4>
                                    <p>05-452 0325</p>
                                </div>
                            </div>

                            <div class="contact-card">
                                <div class="icon-box">
                                    <i class="bi bi-clock"></i>
                                </div>
                                <div class="contact-text">
                                    <h4>Waktu Operasi</h4>
                                    <p>Monday-Friday: 9AM - 6PM</p>
                                </div>
                            </div>
                        </div>

                        <div class="contact-form-container" data-aos="fade-up" data-aos-delay="400">
                            <h3>Hubungi Kami</h3>
                            <p>Sila hubungi kami sekiranya anda mempunyai sebarang pertanyaan. Kami sedia membantu anda sebaik mungkin.</p>

                            <form action="forms/contact.php" method="post" class="php-email-form">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Your Name" required="">
                                    </div>
                                    <div class="col-md-6 form-group mt-3 mt-md-0">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Your Email" required="">
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="subject" id="subject"
                                        placeholder="Subject" required="">
                                </div>
                                <div class="form-group mt-3">
                                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required=""></textarea>
                                </div>

                                <div class="my-3">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>
                                </div>

                                <div class="form-submit">
                                    <button type="submit">Send Message</button>
                                    <div class="social-links">
                                        <a href="#"><i class="bi bi-twitter"></i></a>
                                        <a href="#"><i class="bi bi-facebook"></i></a>
                                        <a href="#"><i class="bi bi-instagram"></i></a>
                                        <a href="#"><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Contact Section -->

    </main>

    <footer id="footer" class="footer position-relative light-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span class="sitename">Scout</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>A108 Adam Street</p>
                        <p>New York, NY 535022</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                        <p><strong>Email:</strong> <span>info@example.com</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Product Management</a></li>
                        <li><a href="#">Marketing</a></li>
                        <li><a href="#">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Hic solutasetp</h4>
                    <ul>
                        <li><a href="#">Molestiae accusamus iure</a></li>
                        <li><a href="#">Excepturi dignissimos</a></li>
                        <li><a href="#">Suscipit distinctio</a></li>
                        <li><a href="#">Dilecta</a></li>
                        <li><a href="#">Sit quas consectetur</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Nobis illum</h4>
                    <ul>
                        <li><a href="#">Ipsam</a></li>
                        <li><a href="#">Laudantium dolorum</a></li>
                        <li><a href="#">Dinera</a></li>
                        <li><a href="#">Trodelas</a></li>
                        <li><a href="#">Flexo</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">MyWebsite</strong> <span>All Rights
                    Reserved</span></p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('build/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('build/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('build/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('build/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('build/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('build/assets/js/main.js') }}"></script>

</body>

</html>