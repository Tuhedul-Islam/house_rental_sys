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
                        <div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="contact_title">Register</div>
                        <form action="{{ url('user-register') }}" method="post" id="contact_form" class="contact_form">
                            @csrf
                            <input type="text" id="contact_form_name" name="name" class="contact_form_name input_field" autocomplete="off" placeholder="Name" required="required" data-error="Name is required.">
                            <input type="text" id="contact_form_email" name="email" class="contact_form_email input_field" autocomplete="off" placeholder="E-mail" required="required" data-error="Email is required.">
                            <input type="text" id="contact_form_name" name="phone_no" class="contact_form_name input_field" autocomplete="off" placeholder="Phone No" required="required" data-error="Phone No is required.">
                            <input type="password" id="contact_form_name" name="password" class="contact_form_email input_field" autocomplete="off" placeholder="Password" required="required" data-error="Password is required.">
                            <input type="password" id="contact_form_name" name="confirm_password" class="contact_form_email input_field" autocomplete="off" placeholder="Confirm Password" required="required" data-error="Confirm Password is required.">
                            <div class="search_item" style="margin-top: 15px">
                                <select name="user_type" id="children_1" class="dropdown_item_select search_input" required>
                                    <option>Select Type</option>
                                    <option value="2">House Owner</option>
                                    <option value="3">Customer</option>
                                </select>
                            </div>

                            <button type="submit" id="form_submit_button" style="margin-top: 20px" class="form_submit_button button">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

