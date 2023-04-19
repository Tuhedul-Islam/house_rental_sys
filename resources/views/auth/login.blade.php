<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ url('frequently-changing/files/favicon/favicon.ico') }}">
    <title>{{ env('APP_NAME') }}</title>

    <!-- Google Font -->
    <!-- https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback -->
    <link rel="stylesheet" href="{{ asset('frequently-changing/common/css/google-fonts.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('frequently-changing/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('frequently-changing/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('frequently-changing/plugins/admin-lte/adminlte.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('frequently-changing/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frequently-changing/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

</head>
<body class="hold-transition login-page">
<div class="login-box mt-0">
    <div class="login-logo">
        <label href="#"><b>{{ strtoupper('House Rental System') }}</b></label>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label class="text-secondary">Email</label>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email" autocomplete="off" required autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <label class="text-secondary">Password</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <!--
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                </div>
                -->
                <div class="social-auth-links text-center mb-3">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
            </form>

            <!--
            <div>
                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
            </div>
            -->
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('frequently-changing/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('frequently-changing/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('frequently-changing/plugins/admin-lte/adminlte.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('frequently-changing/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(function () {
        //Initialize Select2 Elements
        //$('.select2').select2();

        //Initialize Select2 Elements
        // $('.select2bs4').select2({
        //     theme: 'bootstrap4'
        // });
    });
</script>
</body>
</html>
