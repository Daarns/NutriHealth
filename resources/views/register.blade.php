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

    <title>Register</title>
</head>

<body>
    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('{{ asset('img/auth.jpg') }}')"></div>
        <div class="contents order-2 order-md-1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <div class="mb-0">
                            <img src="" alt="" />
                            <h3>NutriHealth</h3>
                            <p class="mb-4">Selamat Datang!</p>
                        </div>
                        <form id="register-form" action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="form-group first">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                            </div>
                            <div class="form-group second mb-2 position relative">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" />
                            </div>
                            <div class="form-group third mb-2 position relative">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                            </div>
                            <div class="form-group last mb-2 position-relative">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="" />
                                <i class="fa-regular fa-eye-slash position-absolute" id="toggle-password"></i>
                                <small id="passwordHelp" class="form-text text-muted" style="font-size: 0.7rem;">min. 8 chars, 1 uppercase, 1 number.</small>
                            </div>

                            <input type="submit" value="Register" class="btn btn-block btn-primary" />
                            <p class="text-center register-text">
                                Already have an account?
                                <a href="{{ route('login')}}" class="register-link">Login</a>
                            </p>

                            <span class="d-block text-center my-4 text-muted">&mdash; or &mdash;</span>
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
    <script>
        document.getElementById('register-form').addEventListener('submit', function(event) {
            var password = document.getElementById('password').value;

            // Check if password is at least 8 characters long, contains at least one uppercase letter and one number
            var passwordRegex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;
            if (!passwordRegex.test(password)) {
                alert('Password must be at least 8 characters long, contain at least one uppercase letter and one number.');
                event.preventDefault(); // Prevent form from being submitted
            }
        });
    </script>
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