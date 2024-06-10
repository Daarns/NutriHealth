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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&family=Poppins:wght@300;400;500;600;700;800&family=Urbanist:wght@100..900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
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
                    <li><a class="nav-link scrollto" href="{{ route('index')}}">Home</a></li>
                    <li>
                        <a class="nav-link scrollto" href="{{ route('artikel')}}">Artikel</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto" href="{{ route('konsultasi')}}">Konsultasi</a>
                    </li>
                    <li>
                        <a class="nav-link scrollto active" href="{{ route('forum')}}">Forum Diskusi</a>
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

    <section class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mb-3">
                    <div class="row text-left mb-5 ms-auto">
                        <div class="col-md-12">
                            <h2>{{ $threads->title }}</h2>
                            <p>{!! $threads->content !!}</p>
                            <p>Posted by <a href="#">{{ $threads->user->name }}</a> on {{
                            $threads->created_at->diffInDays(Carbon\Carbon::now()) > 1
                            ? $threads->created_at->format('jS F, Y')
                            : $threads->created_at->diffForHumans()
                        }}</p>
                        </div>
                    </div>
                    <div class="row text-left mb-5 ms-auto">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('threads.reply', $threads->id) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="content">Reply:</label>
                                    <textarea class="form-control" id="body" name="body"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div id="replies-container">
                        @foreach($threads->posts as $post)
                        <div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0 {{$post->parent_id ? 'child-post' : '' }}">
                            <div class="row align-items-center">
                                <div class="col-md-12 mb-3 mb-sm-0">
                                    <!-- Profil -->
                                    <p><a href="#">{{ $post->user->profile_picture }}</a></p>
                                    <!-- Nama -->
                                    <h5><a href="#">{{ $post->user->name }}</a></h5>

                                    <h6>{{
                                        $post->created_at->diffInDays(Carbon\Carbon::now()) > 1
                                        ? $post->created_at->format('jS F, Y')
                                        : $post->created_at->diffForHumans()
                                    }}</h6>
                                    <!-- Role -->
                                    <h6>
                                        @if($post->user->doctor)
                                        Dokter - {{ $post->user->doctor->specialization }}
                                        @else
                                        {{ ucfirst($post->user->role) }}
                                        @endif
                                    </h6>
                                    <p>{!! $post->body !!}</p>
                                    @if($post->parent_id === null)
                                    <div class="parent-comment-icon" style="position: absolute; bottom: 0; right: 90px;">
                                        <i class="fa-regular fa-comment-dots"></i>
                                        <span>Komentar ({{ $post->childPostCount }})</span>
                                    </div>
                                    @endif
                                    <div class="reply-icon" style="position: absolute; bottom: 0; right: 10px;">
                                        <i class="fa-solid fa-reply"></i>
                                        <span>Reply</span>
                                    </div>
                                    <!-- Reply Form (hidden by default) -->
                                    <form class="reply-form" style="display: none;" method="POST" action="{{ route('threads.reply', ['thread' => $threads->id, 'parentPost' => $post->id]) }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="content">Reply:</label>
                                            <textarea class="form-control" id="body" name="body"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 mb-4 mb-lg-0 px-lg-0 mt-lg-0">
                    <div style="
                            visibility: hidden;
                            display: none;
                            width: 285px;
                            height: 801px;
                            margin: 0px;
                            float: none;
                            position: static;
                            inset: 85px auto auto;">
                    </div>
                    <div data-settings='{"parent":"#content","mind":"#header","top":10,"breakpoint":992}' data-toggle="sticky" class="sticky" style="top: 85px">
                        <div class="sticky-inner">
                            <a class="btn btn-sm btn-block btn-primary rounded-2 py-2 mb-3 bg-op-6 roboto-bold" href="{{ route('threads.index')}}">Ask Question</a>
                            <div class="bg-white mb-3">
                                <h4 class="px-3 py-4 op-5 m-0">Active Topics</h4>
                                <hr class="m-0" />
                                @foreach($activeTopics as $topic)
                                <div class="pos-relative px-3 py-3">
                                    <h6 class="text-primary text-sm">
                                        <a href="/forum/forum_detail/{{ $topic->id }}" class="text-primary">{{ $topic->title }}</a>
                                    </h6>
                                    <p class="mb-0 text-sm">
                                        <span class="op-6">Posted</span>
                                        <a class="text-black" href="#">{{ $topic->created_at->diffForHumans() }}</a>
                                        <span class="op-6">ago by</span>
                                        <a class="text-black" href="#">{{ $topic->user->name }}</a>
                                    </p>
                                </div>
                                <hr class="m-0" />
                                @endforeach
                            </div>
                            <div class="bg-white text-sm">
                                <h4 class="px-3 py-4 op-5 m-0 roboto-bold">Stats</h4>
                                <hr class="my-0" />
                                <div class="row text-center d-flex flex-row op-7 mx-0">
                                    <div class="col-sm-6 flex-ew text-center py-3 border-bottom border-right">
                                        <a class="d-block lead font-weight-bold" href="#">{{ $threads->count() }}</a>
                                        Topics
                                    </div>
                                    <div class="col-sm-6 col flex-ew text-center py-3 border-bottom mx-0">
                                        <a class="d-block lead font-weight-bold" href="#">{{ $posts->count() }}</a>
                                        Posts
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/waypoints/noframework.waypoints.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.reply-icon').click(function() {
                $(this).next('.reply-form').toggle();
            });
        });
    </script>
</body>

</html>