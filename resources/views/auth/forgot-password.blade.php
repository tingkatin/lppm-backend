<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LPPM Tazkia - Lupa Password</title>

    <!-- Custom fonts for this template-->
    <link href='{{asset("admin/vendor/fontawesome-free/css/all.min.css")}}' rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href='{{asset("admin/css/sb-admin-2.min.css")}}' rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-md-9 col-lg-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Masukkan Email Anda</h1>
                                        <p class="h-2 text-gray-600 mb-4">Kami akan mengirimkan link untuk me-reset password kepada email Anda</p>
                                    </div>
                                    @include('partial.alert')
                                    <form class="user" action="{{ route('password.email') }}" method="POST">
                                        @method('POST')
                                        @csrf
                                        <div class="form-group">
                                            <input name="email" type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="awesome@example.com">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Kirim Link Reset Password
                                        </button>
                                        
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">Kembali ke login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- Bootstrap core JavaScript-->
    <script src='{{asset("admin/vendor/jquery/jquery.min.js")}}'></script>
    <script src='{{asset("admin/vendor/bootstrap/js/bootstrap.bundle.min.js")}}'></script>

    <!-- Core plugin JavaScript-->
    <script src='{{asset("admin/vendor/jquery-easing/jquery.easing.min.js")}}'></script>

    <!-- Custom scripts for all pages-->
    <script src='{{asset("admin/js/sb-admin-2.min.js")}}'></script>

</body>

</html>