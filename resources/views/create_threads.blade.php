<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Threads</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&family=Poppins:wght@300;400;500;600;700;800&family=Urbanist:wght@100..900&display=swap" rel="stylesheet">

    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>

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

<style>
    /* src/styles.css */

    .ck-editor__editable_inline {
        min-height: 300px;
    }
</style>

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
                        <a class="nav-link scrollto active" href="#">Forum Diskusi</a>
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
        <section id="create-thread" class="d-flex align-items-center">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-8">
                        <div class="row align-items-center mb-2">
                            <div class="col">
                                <h2 class="h5 page-title">Buat Thread Baru</h2>
                            </div>
                        </div>
                        <div class="mb-2 align-items-center">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <form action="{{ route('threads.create')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="title">Judul</label>
                                            <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Judul" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="content">Deskripsi</label>
                                            <textarea class="form-control" id="content" name="content" rows="3" placeholder="Tulis hal yang ingin anda diskusikan!"></textarea>
                                        </div>
                                        <button type="submit" class="btn mt-4 btn-primary">Buat Thread</button>
                                    </form>
                                </div> <!-- .card-body -->
                            </div> <!-- .card -->
                        </div>
                    </div> <!-- .col-12 -->
                </div> <!-- .row -->
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
        document.addEventListener('DOMContentLoaded', (event) => {
            let editor;

            ClassicEditor
                .create(document.querySelector('#content'), {
                    ckfinder: {
                        uploadUrl: "{{route('uploadImage', ['_token' => csrf_token() ])}}",
                        withCredentials: true,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        }
                    }
                })
                .then(newEditor => {
                    editor = newEditor;

                    document.querySelector('form').addEventListener('submit', function(event) {
                        var editorContent = editor.getData();

                        if (!editorContent) {
                            event.preventDefault();
                            alert('Content is required');
                        }
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>