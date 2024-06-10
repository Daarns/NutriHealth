<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Dashboard</title>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
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
                <li class="nav-item">
                    <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
                        <span class="fe fe-grid fe-16"></span>
                    </a>
                </li>
                <li class="nav-item nav-notif">
                    <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
                        <span class="fe fe-bell fe-16"></span>
                        <span class="dot dot-md bg-success"></span>
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
                        <div class="row align-items-center mb-2">
                            <div class="col">
                                <h2 class="h5 page-title">Welcome!</h2>
                            </div>
                            <div class="col-auto">
                                <form class="form-inline">
                                    <div class="form-group d-none d-lg-inline">
                                        <label for="reportrange" class="sr-only">Date Ranges</label>
                                        <div id="reportrange" class="px-2 py-2 text-muted">
                                            <span class="small"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-sm"><span class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
                                        <button type="button" class="btn btn-sm mr-2"><span class="fe fe-filter fe-16 text-muted"></span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mb-2 align-items-center">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="row mt-1 align-items-center">
                                        <div class="col-12 col-lg-4 text-left pl-4">
                                            <form action="{{ route('admin.resep.store')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="title">Judul</label>
                                                    <input type="text" class="form-control" id="title" name="title" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ingredients">Bahan-bahan</label>
                                                    <textarea class="form-control" id="ingredients" name="ingredients" style="width: 100%; height: 200px;" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipe">Resep</label>
                                                    <textarea class="form-control" id="recipe" name="recipe" style="width: 100%; height: 200px;"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="image_path">Image</label>
                                                    <input type="file" class="form-control-file" id="image_path" name="image_path">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main> <!-- main -->
    </div> <!-- .wrapper -->
    <script src="{{ asset('js/admin/jquery.min.js') }}"></script>
    <script src="{{ asset('js/admin/popper.min.js') }}"></script>
    <script src="{{ asset('js/admin/moment.min.js') }}"></script>
    <script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/admin/simplebar.min.js') }}"></script>
    <script src="{{ asset('js/admin/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.stickOnScroll.js') }}"></script>
    <script src="{{ asset('js/admin/tinycolor-min.js') }}"></script>
    <script src="{{ asset('js/admin/config.js') }}"></script>
    <script src="{{ asset('js/admin/d3.min.js') }}"></script>
    <script src="{{ asset('js/admin/topojson.min.js') }}"></script>
    <script src="{{ asset('js/admin/datamaps.all.min.js') }}"></script>
    <script src="{{ asset('js/admin/datamaps-zoomto.js') }}"></script>
    <script src="{{ asset('js/admin/datamaps.custom.js') }}"></script>
    <script src="{{ asset('js/admin/Chart.min.js') }}"></script>
    <script>
        /* defind global options */
        Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
        Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="{{ asset('js/admin/gauge.min.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('js/admin/apexcharts.min.js') }}"></script>
    <script src="{{ asset('js/admin/apexcharts.custom.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/admin/select2.min.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.timepicker.js') }}"></script>
    <script src="{{ asset('js/admin/dropzone.min.js') }}"></script>
    <script src="{{ asset('js/admin/uppy.min.js') }}"></script>
    <script src="{{ asset('js/admin/quill.min.js') }}"></script>
    <script>
        $('.select2').select2({
            theme: 'bootstrap4',
        });
        $('.select2-multi').select2({
            multiple: true,
            theme: 'bootstrap4',
        });
        $('.drgpicker').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            showDropdowns: true,
            locale: {
                format: 'MM/DD/YYYY'
            }
        });
        $('.time-input').timepicker({
            'scrollDefault': 'now',
            'zindex': '9999' /* fix modal open */
        });
        /** date range picker */
        if ($('.datetimes').length) {
            $('.datetimes').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                    format: 'M/DD hh:mm A'
                }
            });
        }
        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);
        cb(start, end);
        $('.input-placeholder').mask("00/00/0000", {
            placeholder: "__/__/____"
        });
        $('.input-zip').mask('00000-000', {
            placeholder: "____-___"
        });
        $('.input-money').mask("#.##0,00", {
            reverse: true
        });
        $('.input-phoneus').mask('(000) 000-0000');
        $('.input-mixed').mask('AAA 000-S0S');
        $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
            translation: {
                'Z': {
                    pattern: /[0-9]/,
                    optional: true
                }
            },
            placeholder: "___.___.___.___"
        });
        // editor
        var editor = document.getElementById('editor');
        if (editor) {
            var toolbarOptions = [
                [{
                    'font': []
                }],
                [{
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{
                        'header': 1
                    },
                    {
                        'header': 2
                    }
                ],
                [{
                        'list': 'ordered'
                    },
                    {
                        'list': 'bullet'
                    }
                ],
                [{
                        'script': 'sub'
                    },
                    {
                        'script': 'super'
                    }
                ],
                [{
                        'indent': '-1'
                    },
                    {
                        'indent': '+1'
                    }
                ], // outdent/indent
                [{
                    'direction': 'rtl'
                }], // text direction
                [{
                        'color': []
                    },
                    {
                        'background': []
                    }
                ], // dropdown with defaults from theme
                [{
                    'align': []
                }],
                ['clean'] // remove formatting button
            ];
            var quill = new Quill(editor, {
                modules: {
                    toolbar: toolbarOptions
                },
                theme: 'snow'
            });
        }
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <script>
        var uptarg = document.getElementById('drag-drop-area');
        if (uptarg) {
            var uppy = Uppy.Core().use(Uppy.Dashboard, {
                inline: true,
                target: uptarg,
                proudlyDisplayPoweredByUppy: false,
                theme: 'dark',
                width: 770,
                height: 210,
                plugins: ['Webcam']
            }).use(Uppy.Tus, {
                endpoint: 'https://master.tus.io/files/'
            });
            uppy.on('complete', (result) => {
                console.log('Upload complete! We’ve uploaded these files:', result.successful)
            });
        }
    </script>
    <script src="{{ asset('js/admin/apps.js')}}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-56159088-1');
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            let editor;

            ClassicEditor
                .create(document.querySelector('#recipe'), {
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
</body>

</html>