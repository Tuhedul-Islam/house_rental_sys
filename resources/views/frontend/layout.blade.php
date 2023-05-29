<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Rent</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Home Rent">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('frequently-changing/frontend/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('frequently-changing/frontend/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frequently-changing/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frequently-changing/frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frequently-changing/frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frequently-changing/frontend/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frequently-changing/frontend/styles/responsive.css') }}">
    @stack('css')
</head>
<body>
    <div class="super_container">
        @yield('navbar')
        @yield('content')
        @yield('footer')
    </div>
    <script src="{{ asset('frequently-changing/frontend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('frequently-changing/frontend/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('frequently-changing/frontend/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frequently-changing/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset('frequently-changing/frontend/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('frequently-changing/frontend/js/custom.js') }}"></script>
    @stack('js')
</body>
</html>
