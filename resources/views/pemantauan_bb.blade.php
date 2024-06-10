<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>BMI</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&family=Poppins:wght@300;400;500;600;700;800&family=Urbanist:wght@100..900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />


</head>

<body>
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <h1 class="logo">
                <a href="#">
                    <img src="{{ asset('img/logo.png') }}" alt="logo" style="height: 50px" />NutriHealth<span>.</span></a>
            </h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="{{ route('index')}}">Home</a></li>
                    <li>
                        <a class="nav-link scrollto" href="{{ route('artikel')}}">Artikel</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href="{{ route('konsultasi')}}">Konsultasi</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href="{{ route('forum')}}">Forum Diskusi</a>
                    </li>
                    <li class="dropdown">
                        <a href="#"><span>Pilihan Sehat</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ route('resep')}}">Resep & Menu Sehat</a></li>
                            <li><a href="/pemantauan_bb">Pemantauan Berat Badan</a></li>
                        </ul>
                    </li>
                    @if(auth()->check())
                    <li class="dropdown">
                        <a href="#">
                            <img src="{{ auth()->user()->profile_picture ? asset('img/profile_pictures/' . auth()->user()->profile_picture) : asset('img/profile.png') }}" alt="" style="width: 35px; height: 35px; border-radius: 50%;" />
                            <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul>
                            <li><a href="/profile">Profile</a></li>
                            @if(auth()->user()->role == 'admin')
                            <li><a href="/admin/dashboard">Dashboard</a></li>
                            @endif
                            <li><a href="{{ route('logout')}}">Logout</a></li>
                        </ul>
                    </li>
                    @else
                    <li><a class="nav-link scrollto" href="{{ route('login')}}">Login</a></li>
                    @endif
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>

    <main id="main">
        <section id="bmi" class="p-5 text-center bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <h1 class="display-4">Pemantauan Berat Badan</h1>
                        <p class="lead mb-0">Temukan berat badan ideal Anda dan tetap sehat</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="p-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card shadow mb-4 aos-init aos-animate" data-aos="fade-up">
                            <div class="card-body">
                                <form id="bmi-form">
                                    <div class="mb-3 text-center">
                                        <label for="gender" class="form-label">Jenis Kelamin</label>
                                        <div class="gender-container">
                                            <div>
                                                <img id="male" src="{{ asset('img/bmi/man.png') }}" alt="Laki-laki" style="cursor: pointer;" width="100" height="100">
                                                <p>Laki-laki</p>
                                            </div>
                                            <div>
                                                <img id="female" src="{{ asset('img/bmi/woman.png') }}" alt="Perempuan" style="cursor: pointer;" width="100" height="100">
                                                <p>Perempuan</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="weight" class="form-label">Berat Badan (Kg):</label>
                                        <input type="text" id="weight" name="weight" class="form-control" placeholder="Example: 40" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="height" class="form-label">Tinggi Badan (Cm):</label>
                                        <input type="text" id="height" name="height" class="form-control" placeholder="Example: 170" />
                                    </div>
                                    <div class="mb-3 d-flex justify-content-between">
                                        <div id="bmi-result"></div>
                                        <button type="submit" class="btn btn-primary">Hitung BMI</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>NutriHealth<span>.</span></h3>
                        <p>
                            Kota Malang <br />
                            Jawa Timur<br /><br />
                            <strong>Phone:</strong> +62 857 3065 2366<br />
                            <strong>Email:</strong> @nutrihealth_<br />
                        </p>
                    </div>

                    <div class="col-lg-5 col-md-6 footer-about">
                        <h4>About Us</h4>
                        <p>
                            NutriHealth adalah platform kesehatan yang berfokus pada gizi dan kesehatan. <span> Kami menyediakan artikel terbaru tentang gizi dan kesehatan, layanan konsultasi dengan tim dokter yang berpengalaman, dan forum diskusi aktif untuk berbagi pengetahuan dan mendapatkan wawasan baru. </span> <span> Tujuan kami adalah untuk membantu Anda tetap terinformasi dan mendapatkan pengetahuan baru tentang berbagai topik kesehatan.</span>
                        </p>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links">
                        <h4>Our Social Networks</h4>
                        <div class="social-links mt-3">
                            <a href="https://www.instagram.com/nutrihealth_id?igsh=ZWtycWxieGh3bmdo" class="instagram"><i class="bx bxl-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>NutriHealth</span></strong>. 2024
            </div>
        </div>
    </footer>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
    <script>
        var gender = '';

        document.getElementById('male').addEventListener('click', function() {
            this.classList.add('selected');
            document.getElementById('female').classList.remove('selected');
            gender = 'male';
        });

        document.getElementById('female').addEventListener('click', function() {
            this.classList.add('selected');
            document.getElementById('male').classList.remove('selected');
            gender = 'female';
        });

        document.getElementById('bmi-form').addEventListener('submit', function(event) {
            event.preventDefault();

            var weight = parseFloat(document.getElementById('weight').value);
            var height = parseFloat(document.getElementById('height').value) / 100;

            var bmi = weight / (height * height);

            var interpretation = 'BMI kamu ' + bmi.toFixed(2) + '. ' + 'Kategori : ';

            // Standar WHO untuk BMI
            if (bmi < 18.5) {
                interpretation += 'Kurus';
            } else if (bmi < 24.9) {
                interpretation += 'Normal';
            } else if (bmi < 29.9) {
                interpretation += 'Gemuk';
            } else if (bmi < 34.9) {
                interpretation += 'Obesitas';
            } else {
                interpretation += 'Obesitas Parah';
            }

            document.getElementById('bmi-result').textContent = interpretation;
        });
    </script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>