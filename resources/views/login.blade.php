<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&family=Poppins:wght@300;400;500;600;700;800&family=Urbanist:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}" />
    <script src="https://kit.fontawesome.com/48f517d746.js" crossorigin="anonymous"></script>

    <title>Login</title>
</head>
<div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('{{ asset('img/auth.jpg') }}'); background-size: cover;"></div>
    <div class="contents order-2 order-md-1">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7">
                    <div class="mb-">
                        <img src="" alt="" />
                        <h3>NutriHealth</h3>
                        <p class="mb-4">Selamat Datang!</p>
                    </div>
                    <form action="{{ route('login.index') }}" method="post">
                        @csrf
                        <div class="form-group first">
                            <label for="username">Username/Email</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ old('username')}}" />
                        </div>
                        <div class=" form-group last mb-3 position-relative">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" />
                        </div>

                        <div class=" d-flex mb-5 align-items-center">
                            <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                <input type="checkbox" checked="checked" />
                                <div class="control__indicator"></div>
                            </label>
                            <span class="ml-auto"><a href="{{ route('forgot_password')}}" class="forgot-pass">Forgot Password</a></span>
                        </div>

                        @if (session('login_error'))
                        <div class="alert alert-danger">
                            {{ session('login_error') }}
                        </div>
                        @endif

                        <input type="submit" value="Log In" class="btn btn-block btn-primary" />
                        <p class="text-center register-text">
                            Don't have an account?
                            <a href="{{ route('register')}}" class="register-link">Register</a>
                        </p>

                        <span class="d-block text-center my-4 text-muted">&mdash; or Continue With &mdash;</span>
                        <div class="social-login">
                            <a href="{{ route('login.google') }}" class="btn d-flex justify-content-center align-items-center">
                                <img src="{{ asset('img/google-icon.png') }}" alt="Google Icon" class="google-icon">
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<body>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document
                .getElementById("toggle-password")
                .addEventListener("click", function() {
                    var passwordField = document.getElementById("password");
                    if (passwordField.type === "password") {
                        passwordField.type = "text";
                        this.classList.replace("fa-eye-slash", "fa-eye");
                    } else {
                        passwordField.type = "password";
                        this.classList.replace("fa-eye", "fa-eye-slash");
                    }
                });
        });
    </script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/mains.js') }}"></script>
</body>

</html>