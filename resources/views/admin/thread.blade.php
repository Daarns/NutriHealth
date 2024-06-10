<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Dashboard</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/simplebar.css') }}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/uppy.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/jquery.steps.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/quill.snow.css') }}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/daterangepicker.css') }}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/app-light.css') }}" id="lightTheme">
    <link rel="stylesheet" href="{{ asset('css/admin/app-dark.css') }}" id="darkTheme" disabled>

    <script src="https://kit.fontawesome.com/48f517d746.js" crossorigin="anonymous"></script>
</head>

<body class="vertical  light  ">
    <div class="wrapper">
        <nav class="topnav navbar navbar-light">
            <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
                <i class="fe fe-menu navbar-toggler-icon"></i>
            </button>
            <form class="form-inline mr-auto searchform text-muted">
                <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Type something..." aria-label="Search">
            </form>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                        <i class="fe fe-sun fe-16"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="avatar avatar-sm mt-2">
                            <img src="{{ auth()->user()->profile_picture ? asset('img/profile_pictures/' . auth()->user()->profile_picture) : asset('img/profile.png') }}" alt="" style="width: 35px; height: 35px;" />
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('profile')}}">Profile</a>
                        <a class="dropdown-item" href="{{ route('logout')}}">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>

        <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
            <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
                <i class="fe fe-x"><span class="sr-only"></span></i>
            </a>
            <nav class="vertnav navbar navbar-light">
                <div class="w-100 mb-4 d-flex">
                    <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{route('admin.dashboard')}}">
                        <i class="fas fa-user-cog"></i>
                    </a>
                </div>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item dropdown">
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-home fe-16"></i>
                            <span class="ml-3 item-text">Dashboard</span><span class="sr-only">(current)</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="dashboard">
                            <li class="nav-item active">
                                <a class="nav-link pl-3" href="{{ route('admin.resep') }}"><span class="ml-1 item-text">User List</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <p class="text-muted nav-heading mt-4 mb-1">
                    <span>Artikel</span>
                </p>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item dropdown">
                        <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-box fe-16"></i>
                            <span class="ml-3 item-text">Gizi</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.artikel', ['type' => 'gizi']) }}"><span class="ml-1 item-text">Cek Artikel</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.artikel.create') }}"><span class="ml-1 item-text">Tambah Artikel</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#forms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fa-solid fa-notes-medical"></i>
                            <span class="ml-3 item-text">Kesehatan</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="forms">
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.artikel', ['type' => 'kesehatan']) }}"><span class="ml-1 item-text">Cek Artikel</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.artikel.create') }}"><span class="ml-1 item-text">Tambah Artikel</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <p class="text-muted nav-heading mt-4 mb-1">
                    <span>Konsultasi</span>
                </p>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item dropdown">
                        <a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-user fe-16"></i>
                            <span class="ml-3 item-text">Pengajuan Dokter</span>
                        </a>
                    </li>
                </ul>
                <p class="text-muted nav-heading mt-4 mb-1">
                    <span>Forum Diskusi</span>
                </p>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item dropdown">
                        <a href="#pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fa-brands fa-threads"></i>
                            <span class="ml-3 item-text">Threads</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100 w-100" id="pages">
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.threads')}}">
                                    <span class="ml-1 item-text">Cek Threads</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#layouts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fa-solid fa-reply-all"></i>
                            <span class="ml-3 item-text">Posts</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="layouts">
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.posts')}}"><span class="ml-1 item-text">Cek Post</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <p class="text-muted nav-heading mt-4 mb-1">
                    <span>Pilihan Sehat</span>
                </p>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item w-100">
                        <a class="nav-link" href="{{ route('admin.resep') }}">
                            <i class="fa-solid fa-utensils"></i>
                            <span class="ml-3 item-text">Resep & Menu Sehat</span>
                        </a>
                    </li>
                </ul>
                <div class="btn-box w-100 mt-4 mb-1">
                    <a href="{{ route('index')}}" target="_blank" class="btn mb-2 btn-primary btn-lg btn-block">
                        <span class="small">Ke Landing Page</span>
                    </a>
                </div>
            </nav>
        </aside>

        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <strong class="card-title">Threads Data</strong>
                                    </div>
                                    <div class="card-body my-n2">
                                        <table class="table table-striped table-hover table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Title</th>
                                                    <th>Username</th>
                                                    <th>Date</th>
                                                    <th>Reply</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($threads as $thread)
                                                <tr>
                                                    <td>{{ $thread->id }}</td>
                                                    <td>{{ $thread->title }}</td>
                                                    <td>{{ $thread->user->username }}</td>
                                                    <td>{{ $thread->created_at->format('d/m/Y') }}</td>
                                                    <td>{{ $thread->posts_count }}</td> <!-- Menampilkan jumlah post -->
                                                    <td>
                                                        <form method="POST" action="{{ route('admin.removeThread', ['id' => $thread->id]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Remove</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- Striped rows -->
                        </div> <!-- .row-->
                    </div> <!-- .col-12 -->
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->
        </main> <!-- main -->
    </div> <!-- .wrapper -->
    <script src="{{ asset('js/admin/jquery.min.js') }}"></script>
    <script src="{{ asset('js/admin/popper.min.js') }}"></script>
    <script src="{{ asset('js/admin/moment.min.js') }}"></script>
    <script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/admin/simplebar.min.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.stickOnScroll.js') }}"></script>
    <script src="{{ asset('js/admin/tinycolor-min.js') }}"></script>
    <script src="{{ asset('js/admin/config.js') }}"></script>
    <script src="{{ asset('js/admin/d3.min.js') }}"></script>
    <script src="{{ asset('js/admin/topojson.min.js') }}"></script>
    <script>
        /* defind global options */
        Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
        Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="{{ asset('js/admin/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/admin/select2.min.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.timepicker.js') }}"></script>
    <script src="{{ asset('js/admin/dropzone.min.js') }}"></script>
    <script src="{{ asset('js/admin/uppy.min.js') }}"></script>
    <script src="{{ asset('js/admin/quill.min.js') }}"></script>
    <script src="{{ asset('js/admin/apps.js')}}"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
</body>

</html>