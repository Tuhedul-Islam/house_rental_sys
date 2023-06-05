@extends('frontend.layout')
@section('navbar')
    @include('frontend.navbar')
@endsection
@section('footer')
    @include('frontend.footer')
@endsection
@section('content')
    <div class="contact" style="margin-top: 200px">
        <div class="contact_background" style="background-image:url(frequently-changing/frontend/images/contact.png)"></div>
        <div class="container">
            <div class="row" style="flex-direction: row-reverse">
                <div class="col-lg-5">
                    <div class="contact_image">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="contact_form_container">
                        <div class="contact_title">Client Login</div>
                        <form action="{{ url('user-login') }}" method="post" id="contact_form" class="contact_form">
                            @csrf
                            <input type="email" name="email" id="contact_form_subject" class="contact_form_subject input_field" placeholder="Email" required="required" data-error="Email is required.">
                            <input type="password" name="password" id="contact_form_subject" class="contact_form_subject input_field" placeholder="Password" required="required" data-error="Password is required.">
                            <button type="submit" id="form_submit_button" class="form_submit_button button">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

