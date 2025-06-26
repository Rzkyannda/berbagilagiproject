<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>BerbagiLagi - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/login_register.css') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin_assets/img/logo_icon.png') }}">



    <!-- Font Awesome -->
    <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!-- Custom Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


</head>

<body>
    <!-- Container -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card card-modern">
                    <div class="row no-gutters">
                        <div class="col-lg-6 bg-side-image">
                            <img src="{{ asset('admin_assets/img/logo_putih.png') }}" alt="Login Image">
                        </div>
                        <div class="col-lg-6 p-5">
                            <div class="text-center mb-4">
                                <h2 class="text-success font-weight-bold">Welcome Back!</h2>
                            </div>
                            <form action="{{ route('loginAction') }}" method="POST">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                {{-- <div class="form-group form-check small">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">Remember Me</label>
                                </div> --}}
                                <button type="submit" class="btn btn-success btn-block font-weight-bold">
                                    Login
                                </button>
                                {{-- <a href="#" class="btn btn-outline-success btn-block mt-2">
                                    <i class="fab fa-google fa-fw"></i> Login with Google
                                </a> --}}
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small text-success" href="{{ route('register') }}">Create an
                                    Account!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap + jQuery Scripts -->
    <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
