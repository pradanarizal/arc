<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CDA - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('templates/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('templates/css/sb-admin-2.min.css') }}" rel="stylesheet">
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
</head>

<body background="{{ asset('templates/img/bg-login.webp') }}"
    style="background-repeat: no-repeat;background-size: cover;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-12">
                                <div class="p-5">
                                    <div class="text-center mb-4">
                                        <img src="{{ asset('templates/img/logo.webp') }}" width="150px">
                                    </div>
                                    <form action="{{ route('postlogin') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" value="{{ old('email') }}"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Masukkan Email">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" value="{{ old('password') }}"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Masukkan Password">
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <span class="refreshcaptcha">{!! captcha_img() !!}</span>
                                            <a href="javascript:void(0)" class="btn btn-success"
                                                onclick="refreshCaptcha()">refresh</a>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" id="captcha"
                                                class="form-control @error('captcha') is-invalid @enderror"
                                                placeholder="Masukan captcha" name="captcha" data-validation="required">
                                            @error('captcha')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-danger btn-user btn-block">Login</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('templates/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('templates/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('templates/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('templates/js/sb-admin-2.min.js') }}"></script>

    <script>
        function refreshCaptcha() {
            $.ajax({
                url: "/refreshCapcha",
                type: 'get',
                dataType: 'html',
                success: function(json) {
                    $('.refreshcaptcha').html(json);
                },
                error: function(data) {
                    alert('Try Again.');
                }
            });
        }
    </script>
    @include('sweetalert::alert')

</body>

</html>
