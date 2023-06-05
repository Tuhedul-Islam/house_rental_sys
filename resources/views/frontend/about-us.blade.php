@extends('frontend.layout')
@section('navbar')
    @include('frontend.navbar')
@endsection
@section('footer')
    @include('frontend.footer')
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="about-home">
                <div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('frequently-changing/frontend/images/about_background.jpg') }}"></div>
                <div class="home_content">
                    <div class="home_title" style="color: #06595E">about us</div>
                </div>
            </div>

            <div class="intro">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="intro_image"><img src="{{ asset('frequently-changing/frontend/images/intro.png') }}" alt=""></div>
                        </div>
                        <div class="col-lg-5">
                            <div class="intro_content">
                                <div class="intro_title">we have the best tours</div>
                                <p class="intro_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis vulputate eros, iaculis consequat nisl. Nunc et suscipit urna. Integer elementum orci eu vehicula pretium. Donec bibendum tristique condimentum. Aenean in lacus ligula. Phasellus euismod gravida eros. Aenean nec ipsum aliquet, pharetra magna id, interdum sapien. Etiam id lorem eu nisl pellentesque semper. Nullam tincidunt metus placerat, suscipit leo ut, tempus nulla. Fusce at eleifend tellus. Ut eleifend dui nunc, non fermentum quam placerat non. Etiam venenatis nibh augue, sed eleifend justo tristique eu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

