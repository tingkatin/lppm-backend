<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LPPM Tazkia - Registrasi</title>

    <!-- Custom fonts for this template-->
    <link href='{{asset("admin/vendor/fontawesome-free/css/all.min.css")}}' rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href='{{asset("admin/css/sb-admin-2.css")}}' rel="stylesheet">

</head>

<body class="bg-white">

    <div class="container">
        <div class="my-5">
            <div class="d-flex justify-content-center">
                <!-- Nested Row within Card Body -->
                    <div class="col-lg-7">
                        <div class="p-5">
                            @include('partial.alert')
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrasi</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('registration.store') }}">
                                @method('POST')
                                @csrf
                                <h5 class="mb-3">Kredensial Akun</h5>
                                <div class="form-group">
                                    <input name="name" type="text" class="form-control form-control-user"
                                        id="name" aria-describedby="nameHelp"
                                        placeholder="Masukkan nama lengkap beserta gelar" required>
                                </div>
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control form-control-user"
                                        id="exampleInputEmail" aria-describedby="emailHelp"
                                        placeholder="awesome@example.com">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="password" type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Masukkan password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="password_confirmation" type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Konfirmasi password" required>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <h5 class="mb-3">Profil Pendaftar</h5>
                                <div class="form-group">
                                    <input name="keahlian" type="text" class="form-control form-control-user" id="keahlian"
                                        placeholder="Masukkan keahlian" required>
                                </div>
                                <div class="form-group">
                                    <input name="peminatan" type="text" class="form-control form-control-user" id="peminatan"
                                        placeholder="Masukkan peminatan" required>
                                </div>
                                <div class="form-group">
                                    <textarea name="deskripsi" class="form-control form-control-textarea" id="keahlian"
                                        placeholder="Masukkan Deskripsi singkat" rows="4" maxlength="500" required></textarea>
                                </div>
                                <hr class="my-4">
                                <h5 class="mb-3">Sertifikasi</h5>
                                <div id="sertifikasi-dynamic">
                                    <div id="sertifikasi-item" class="form-group row align-items-center">
                                        <div class="col-sm-9 mb-3 mb-sm-0">
                                            <input id="sertifikasi-input" type="text" class="form-control form-control-user"
                                                placeholder="Masukkan sertifikasi">
                                        </div>
                                        <div class="col-sm-3">
                                            <button id="add" type="button" class="btn btn-outline-primary btn-user w-100">Tambah</button>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <button type="submit" class="btn btn-primary btn-user btn-block mb-2">
                                    Daftar
                                </button>
                            </form>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Sudah punya akun? Silahkan login</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src='{{asset("admin/vendor/jquery/jquery.min.js")}}'></script>
    <script src='{{asset("admin/js/registration.js")}}'></script>
    <script src='{{asset("admin/vendor/bootstrap/js/bootstrap.bundle.min.js")}}'></script>

    <!-- Core plugin JavaScript-->
    <script src='{{asset("admin/vendor/jquery-easing/jquery.easing.min.js")}}'></script>

    <!-- Custom scripts for all pages-->
    <script src='{{asset("admin/js/sb-admin-2.min.js")}}'></script>

</body>

</html>