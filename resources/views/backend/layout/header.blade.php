<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="app-url__" app_url__="{!! url('/') !!}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ env('APP_NAME') }}</title>
    <link rel="shortcut icon" href="{{ url('frequently-changing/files/favicon/favicon.ico') }}">

    <!-- Google Font -->
    <link rel="stylesheet" href="{{ asset('frequently-changing/common/css/google-fonts.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('frequently-changing/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('frequently-changing/plugins/ionicons/css/ionicons.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('frequently-changing/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('frequently-changing/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('frequently-changing/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('frequently-changing/plugins/admin-lte/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('frequently-changing/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('frequently-changing/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('frequently-changing/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frequently-changing/backend/css/style.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('frequently-changing/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frequently-changing/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('frequently-changing/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frequently-changing/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frequently-changing/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('frequently-changing/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('frequently-changing/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{asset('frequently-changing/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('frequently-changing/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('frequently-changing/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('frequently-changing/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{asset('frequently-changing/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{asset('frequently-changing/plugins/bs-stepper/css/bs-stepper.min.css')}}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{asset('frequently-changing/plugins/dropzone/min/dropzone.min.css')}}">

    <!-- Custom-css -->
    <link rel="stylesheet" href="{{ asset('frequently-changing/backend/css/style.css') }}">
    @stack('css')
</head>
<body class="layout-fixed control-sidebar-slide-open sidebar-mini layout-navbar-fixed layout-footer-fixed text-sm">
<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('frequently-changing/files/favicon/favicon.ico') }}" alt="AdminLTELogo" height="60" width="60">
    </div>
    @include('backend.layout.navbar')
    @include('backend.layout.menubar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
{{--        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">@yield('page_title')</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>--}}
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
