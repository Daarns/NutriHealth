<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>NutriHealth - Index</title>
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
    <script src="https://kit.fontawesome.com/48f517d746.js" crossorigin="anonymous"></script>

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
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li>
                        <a class="nav-link scrollto" href="#about">Artikel</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href="#services">Konsultasi</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href="#portfolio">Forum Diskusi</a>
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

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Selamat Datang di NutriHealth</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Konsultasikan masalah kesehatanmu dengan kami</h2>
                    <div data-aos="fade-up" data-aos-delay="800">
                        <a href="/konsultasi" class="btn-get-started scrollto">Mulai Konsultasi</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
                    <img src="{{ asset('') }}" class="img-fluid animated" alt="" />
                </div>
            </div>
        </div>
    </section>

    <main id="main">
        <section id="featured-services" class="featured-services">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="fa-regular fa-newspaper"></i></div>
                            <h4 class="title"><a href="">Artikel</a></h4>
                            <p class="description">
                                Temukan berbagai artikel kesehatan yang informatif dan terpercaya.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon"><i class="fa-solid fa-people-arrows"></i></div>
                            <h4 class="title"><a href="">Konsultasi</a></h4>
                            <p class="description">
                                Konsultasikan masalah kesehatan Anda dengan dokter profesional kami.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon"><i class="fa-regular fa-comments"></i></div>
                            <h4 class="title"><a href="">Forum Diskusi</a></h4>
                            <p class="description">
                                Bergabunglah dalam diskusi seputar kesehatan dan berbagi pengalaman dengan orang lain.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon"><i class="fa-solid fa-staff-snake"></i></div>
                            <h4 class="title"><a href="">Pilihan Sehat</a></h4>
                            <p class="description">
                                Dapatkan rekomendasi resep dan menu sehat serta pemantauan berat badan Anda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="about section-bg">
            <div class="container-fluid" data-aos="fade-up">
                <div class="section-title">
                    <h2>Artikel</h2>
                    <h3>Artikel<span>Terbaru</span></h3>
                    <p>
                        Temukan artikel terbaru kami yang membahas seputar gizi dan kesehatan. Kami menyajikan informasi terkini dan paling relevan untuk membantu Anda tetap terinformasi dan mendapatkan pengetahuan baru.
                    </p>
                </div>

                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($articles as $article)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="carousel-image-overlay"></div>
                            <img src="{{ asset('images/' . $article->image_path) }}" class="d-block w-100 carousel-image" alt="Article">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{ $article->title }}</h5>
                                <p>{{ $article->excerpt }}</p>
                                <a href="{{ route('artikel.detail', $article->id) }}" class="btn btn-primary">Selengkapnya</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="text-end mt-4 me-6">
                    <a href="{{ url('/artikel') }}" style="padding: 10px 20px; border: none; background-color: #007BFF; color: #fff; text-decoration: none; border-radius: 5px; transition: background-color 0.3s ease;">Cek halaman Artikel</a>
                </div>
            </div>
        </section>

        <section id="services" class="services">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Konsultasi</h2>
                    <h3>Lihat <span>Layanan Kami</span></h3>
                    <p>
                        Kami menyediakan berbagai layanan konsultasi untuk memenuhi kebutuhan Anda. Dengan tim dokter yang berpengalaman, kami siap membantu Anda menemukan solusi terbaik.
                    </p>
                </div>
            </div>
            </div>
        </section>

        <section id="testimonials" class="testimonials">
            <div class="container" data-aos="zoom-in">
                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        @foreach($doctors as $doctor)
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{ asset('img/profile_pictures/' . $doctor->user->profile_picture) }}" class="testimonial-img" alt="" />
                                <h3>{{ $doctor->user->username }}</h3>
                                <h4>{{ $doctor->specialization }}</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    {{ $doctor->bio }}
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="text-end mt-4 me-6">
                    <a href="{{ url('konsultasi') }}" style="padding: 10px 20px; border: none; background-color: #007BFF; color: #fff; text-decoration: none; border-radius: 5px; transition: background-color 0.3s ease;">Pergi Konsultasi</a>
                </div>
            </div>
        </section>

        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Forum Diskusi</h2>
                    <h3>Diskusi Aktif <span>Kami</span></h3>
                    <p>
                        Bergabunglah dalam percakapan dan bagikan pemikiran Anda. Forum diskusi ini adalah tempat di mana Anda dapat berinteraksi dengan orang lain, berbagi pengetahuan, dan mendapatkan wawasan baru tentang berbagai topik kesehatan.
                    </p>
                </div>

                <div class="row d-flex justify-content-between">
                    @foreach($threads as $thread)
                    <div class="col-lg-2 col-md-6 align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="thread">
                            <div class="thread-info">
                                <h4>{{ $thread->title }}</h4>
                                <span>Dibuat oleh: {{ $thread->user->username }}</span>
                                <p>{{ $thread->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="text-end mt-4 me-6">
                    <a href="{{ url('forum') }}" style="padding: 10px 20px; border: none; background-color: #007BFF; color: #fff; text-decoration: none; border-radius: 5px; transition: background-color 0.3s ease;">Mulai Diskusi</a>
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

    <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>