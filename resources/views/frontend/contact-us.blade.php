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
                    <div class="home_title" style="color: #06595E">Contact us</div>
                </div>
            </div>

            <div class="contact">
                <div class="contact_background" style="background-image:url(frequently-changing/frontend/images/contact.png)"></div>
                <div class="container">
                    <div class="row" style="flex-direction: row-reverse">
                        <div class="col-lg-5">
                            <div class="contact_image">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="contact_form_container">
                                <div class="contact_title">get in touch</div>
                                <form action="{{ url('/contact-us/store') }}" method="post" id="contact_form" class="contact_form">
                                    @csrf
                                    <input type="text" id="contact_form_name" class="contact_form_name input_field" name="name" placeholder="Name" required="required" data-error="Name is required.">
                                    <input type="email" id="contact_form_email" class="contact_form_email input_field" name="email" placeholder="E-mail" required="required" data-error="Email is required.">
                                    <input type="text" id="contact_form_subject" class="contact_form_subject input_field" name="subject" placeholder="Subject" required="required" data-error="Subject is required.">
                                    <textarea id="contact_form_message" class="text_field contact_form_message" name="message" rows="4" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
                                    <button type="submit" id="form_submit_button" class="form_submit_button button">send message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

