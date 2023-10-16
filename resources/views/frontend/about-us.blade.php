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
                            <div class="intro_image"><img src="{{ asset($about_us->about_img??'') }}" alt="About"></div>
                        </div>
                        <div class="col-lg-5">
                            <div class="intro_content">
                                <div class="intro_title">{{ ($about_us->title??'') }}</div>
                                <p class="intro_text">{{ ($about_us->desc??'') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

