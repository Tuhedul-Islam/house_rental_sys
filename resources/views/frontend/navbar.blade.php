<header class="header">
    <div class="top_bar">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-row">
                    <div class="phone">+45 123 8523 98745</div>
                    <div class="social">
                        <ul class="social_list">
                            <li class="social_list_item"><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            <li class="social_list_item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li class="social_list_item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li class="social_list_item"><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                            <li class="social_list_item"><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                            <li class="social_list_item"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <div class="user_box ml-auto">
                        @if( (isset(auth()->user()->user_type)) && ((auth()->user()->user_type ==2) || (auth()->user()->user_type ==3)))
                            <div class="user_box_login user_box_link"><a href="{{ url('user-dashboard') }}">{!! \Illuminate\Support\Facades\Auth::user()->name !!}</a></div>
                            <div class="user_box_login user_box_link"><a href="{{ url('user-dashboard') }}">{!! 'Dashboard' !!}</a></div>
                            <div class="user_box_login user_box_link"><a href="{{ url('add-new-house') }}">{!! 'Add New House' !!}</a></div>
                            <div class="user_box_register user_box_link"><a href="{{ url('user-logout') }}">{!! 'Logout' !!}</a></div>
                        @else
                            <div class="user_box_login user_box_link"><a href="{{ url('user-login') }}">Login</a></div>
                            <div class="user_box_register user_box_link"><a href="{{ url('user-register') }}">Register</a></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="main_nav">
        <div class="container">
            <div class="row">
                <div class="col main_nav_col d-flex flex-row align-items-center justify-content-start">
                    <div class="logo_container">
                        <div class="logo"><a href="#"><img height="50" src="{{ asset('frequently-changing/frontend/images/logo.png') }}" alt="">Home Rent</a></div>
                    </div>
                    <div class="main_nav_container ml-auto">
                        <ul class="main_nav_list">
                            <li class="main_nav_item"><a href="{{ url('/') }}">home</a></li>
                            <li class="main_nav_item"><a href="{{ url('about') }}">about us</a></li>
                            <li class="main_nav_item"><a href="{{ url('all-houses') }}">All Houses</a></li>
                            <li class="main_nav_item"><a href="{{ url('contact') }}">Contact</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </nav>
</header>
<div class="menu trans_500">
    <div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
        <div class="menu_close_container"><div class="menu_close"></div></div>
        <div class="logo menu_logo"><a href="#"><img height="50" src="{{ asset('frequently-changing/frontend/images/logo.png') }}" alt=""></a></div>
        <ul>
            <li class="menu_item"><a href="{{ url('/') }}">home</a></li>
            <li class="menu_item"><a href="{{ url('about') }}">about us</a></li>
            <li class="menu_item"><a href="{{ url('all-houses') }}">All Houses</a></li>
            <li class="menu_item"><a href="{{ url('contact') }}">Contact</a></li>
        </ul>
    </div>
</div>
