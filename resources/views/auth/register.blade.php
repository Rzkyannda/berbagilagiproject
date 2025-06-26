<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="">
    <title>BerbagiLagi - Register</title>
    <!-- Custom fonts for this template-->

    <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/login_register.css') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin_assets/img/logo_icon.png') }}">


    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->

    <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card card-modern">
                    <div class="row no-gutters">
                        <div class="col-lg-5 bg-side-image">
                            <img src="{{ asset('admin_assets/img/logo_putih.png') }}" alt="Register Image">
                        </div>
                        <div class="col-lg-7 p-5">
                            <div class="text-center">
                                <h2 class="text-success font-weight-bold mb-4">Create an Account!</h2>
                            </div>
                            <form action="{{ route('registerSave') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input name="nama" type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <input name="phone" type="number" class="form-control" placeholder="Phone">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="password" type="password" class="form-control"
                                            placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="password_confirmation" type="password" class="form-control"
                                            placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-block">Register Account</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small text-success" href="{{ route('login') }}">Already have an
                                    account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->

    <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->

    <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->

    <script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>
</body>

</html>
