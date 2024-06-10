<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Profile</title>
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

    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    <h2 class="h3 mb-4 page-title">Profile</h2>
                    <div class="my-4">
                        <div class="row mt-5 align-items-center">
                            <div class="col-md-3 text-center mb-5">
                                <div class="avatar avatar-xl">
                                    <img src="{{ auth()->user()->profile_picture ? asset('img/profile_pictures/' . auth()->user()->profile_picture) : asset('img/profile.png') }}" alt="" style="width: 150px; height: 150px;" />
                                    <form action="{{ route('profile.updateProfilePicture', auth()->user()) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="profile_picture" id="profile_picture" style="display: none;" />
                                        <button type="submit" class="btn btn-primary" id="uploadButton" style="margin-top: 10px">Change Picture</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h5 class="mb-1">{{ auth()->user()->name}}</h5>
                                        <h6 class="mb-1">{{ auth()->user()->email}}</h6>
                                        @if(auth()->user()->doctor)
                                        <h6 class="mb-1">{{ auth()->user()->doctor->specialization }}</h6>
                                        <h6 class="mb-1">{{ auth()->user()->doctor->phone_number }}</h6>
                                        @else
                                        <h6 class="mb-1">{{ auth()->user()->role}}</h6>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        @if(auth()->user()->doctor)
                                        <p class="text-muted"> {{ auth()->user()->doctor->bio }} </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <form action="{{ route('profile.update', auth()->user()) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="Name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ auth()->user()->name }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Username">Username</label>
                                    <input type="text" id="username" name="username" class="form-control" value="{{ auth()->user()->username }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
                            </div>
                            @if(auth()->user()->doctor)
                            <div class="form-group">
                                <label for="Number">Phone Number</label>
                                <input type="text" id="number" name="number" class="form-control" value="{{ auth()->user()->doctor->phone_number }}">
                            </div>
                            <div class="form-group">
                                <label for="bio">Bio</label>
                                <textarea class="form-control" id="bio" name="bio" rows="3">{{ auth()->user()->doctor->bio }}</textarea>
                            </div>
                            @endif
                            <div class="d-flex justify-content-between mt-3">
                                <button type="submit" class="btn btn-primary">Save Change</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#changePasswordModal">Change Password</button>
                            </div>
                        </form>

                        <hr class="my-3">

                        <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h3 class="h4 mb-4">Change Password</h3>
                                        <form action="">
                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputPassword4">Old Password</label>
                                                        <input type="password" class="form-control" id="inputPassword5">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword5">New Password</label>
                                                        <input type="password" class="form-control" id="inputPassword5">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword6">Confirm Password</label>
                                                        <input type="password" class="form-control" id="inputPassword6">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="mb-2">Password requirements</p>
                                                    <p class="small text-muted mb-2"> To create a new password, you have to meet all of the following requirements: </p>
                                                    <ul class="small text-muted pl-4 mb-0">
                                                        <li> Minimum 8 character </li>
                                                        <li>At least one special character</li>
                                                        <li>At least one number</li>
                                                        <li>Can’t be the same as a previous password </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Change</button>
                                        </form>
                                    </div> <!-- /.card-body -->
                                </div> <!-- /.col-12 -->
                            </div> <!-- .row -->
                        </div> <!-- .container-fluid -->
                    </div>
                </div>
            </div>
        </div>
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

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#uploadButton").click(function(event) {
                event.preventDefault();
                $("#profile_picture").click();
            });

            $("#profile_picture").change(function() {
                $(this).closest("form").submit();
            });
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>