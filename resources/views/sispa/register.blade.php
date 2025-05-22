<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Borang Pendaftaran - SISPA UPSI</title>
    <meta name="description" content="Daftar sebagai ahli SISPA UPSI hari ini.">

    <!-- Favicons -->
    <link href="{{ asset('build/assets/img/sispalogo.png') }}" rel="icon">
    <link href="{{ asset('build/assets/img/sispalogo.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Montserrat&family=Raleway&display=swap" rel="stylesheet">

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
        <div class="container-fluid container-xl d-flex align-items-center">
            <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
                <img src="{{ asset('build/assets/img/logoupsi1.png') }}" alt="UPSI">
                <img src="{{ asset('build/assets/img/sispalogo.png') }}" alt="SISPA">
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('home') }}#hero">Utama</a></li>
                    <li><a href="{{ route('home') }}#about">Info</a></li>
                    <li><a href="{{ route('home') }}#berita">Berita</a></li>
                    <li><a href="{{ route('home') }}#team">Galeri</a></li>
                    <li><a href="{{ route('home') }}#contact">Hubungi</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="{{ route('login') }}">Admin</a>
        </div>
    </header>

    <main class="main">
        <section class="section pt-5">
            <div class="container" data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="mb-4 text-center">Borang Pendaftaran Ahli SISPA UPSI</h2>

                        @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('sispa.register') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Penuh</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="ic" class="form-label">No Kad Pengenalan</label>
                                <input type="number" class="form-control" name="ic" required>
                            </div>

                            <div class="mb-3">
                                <label for="no_matrik" class="form-label">No Matrik</label>
                                <input type="text" class="form-control" name="no_matrik" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Emel</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="height" class="form-label">Tinggi (cm)</label>
                                <input type="number" class="form-control" name="height" id="height" required>
                            </div>

                            <div class="mb-3">
                                <label for="weight" class="form-label">Berat (kg)</label>
                                <input type="number" class="form-control" name="weight" id="weight" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">BMI</label>
                                <p id="bmiDisplay" class="mb-1 fw-bold"></p>
                                <small id="bmiStatus" class="form-text"></small>
                            </div>

                            <div class="mb-3">
                                <label for="tempoh" class="form-label">Tempoh Pengajian (Tahun)</label>
                                <input type="number" class="form-control" name="tempoh" id="tempoh" required min="1">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status Permohonan</label>
                                <p id="kelayakanDisplay" class="fw-bold"></p>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary">Hantar</button>
                                <a href="{{ route('home') }}" class="btn btn-secondary ms-2">Kembali</a>
                            </div>
                        </form>


                        </form>
                    </div>
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

    <!-- JS Files -->
    <script src="{{ asset('build/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('build/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('build/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('build/assets/js/main.js') }}"></script>
 <script>
    const heightInput = document.getElementById('height');
    const weightInput = document.getElementById('weight');
    const bmiStatus = document.getElementById('bmiStatus');
    const tempohInput = document.getElementById('tempoh');

    let isNormalBMI = false;

    function calculateBMI() {
        const height = parseFloat(heightInput.value) / 100;
        const weight = parseFloat(weightInput.value);

        if (!isNaN(height) && !isNaN(weight) && height > 0) {
            const bmi = (weight / (height * height)).toFixed(2);
            document.getElementById('bmiDisplay').textContent = bmi;

            if (bmi < 18.5) {
                bmiStatus.textContent = "Kurang berat (Underweight)";
                bmiStatus.className = "form-text text-warning";
                isNormalBMI = false;
            } else if (bmi < 25) {
                bmiStatus.textContent = "Normal";
                bmiStatus.className = "form-text text-success";
                isNormalBMI = true;
            } else if (bmi < 30) {
                bmiStatus.textContent = "Berlebihan Berat (Overweight)";
                bmiStatus.className = "form-text text-warning";
                isNormalBMI = false;
            } else {
                bmiStatus.textContent = "Obes";
                bmiStatus.className = "form-text text-danger";
                isNormalBMI = false;
            }
        } else {
            document.getElementById('bmiDisplay').textContent = '';
            bmiStatus.textContent = '';
            isNormalBMI = false;
        }

        updateKelayakan();
    }

    function updateKelayakan() {
        const tahun = parseInt(tempohInput.value);
        const display = document.getElementById('kelayakanDisplay');

        if (!isNaN(tahun)) {
            if (tahun >= 4 && isNormalBMI) {
                display.textContent = "Layak Memohon";
                display.className = "fw-bold text-success";
            } else {
                display.textContent = "Tidak Layak";
                display.className = "fw-bold text-danger";
            }
        } else {
            display.textContent = '';
            display.className = '';
        }
    }

    heightInput.addEventListener('input', calculateBMI);
    weightInput.addEventListener('input', calculateBMI);
    tempohInput.addEventListener('input', updateKelayakan);
</script>

</body>
</html>