@extends('frontend.layout')
@section('navbar')
    @include('frontend.navbar')
@endsection
@section('footer')
    @include('frontend.footer')
@endsection
@section('content')
    <div class="home">
        <div class="home_slider_container">
            <div class="owl-carousel owl-theme home_slider">
                @foreach($sliders as $slider)
                <div class="owl-item home_slider_item">
                    <div class="home_slider_background" style="background-image:url({{$slider->slider_img}})"></div>
                    <div class="home_slider_content text-center">
                        <div class="home_slider_content_inner" data-animation-in="flipInX" data-animation-out="animate-out fadeOut">
                            <h1>{{ $slider->text_content??'' }}</h1>
                            {{--<div class="button home_slider_button"><div class="button_bcg"></div><a href="#">explore now</a></div>--}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="home_slider_nav home_slider_prev">
                <svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
                    <defs>
                        <linearGradient id='home_grad_prev'>
                            <stop offset='0%' stop-color='#2E9FA5' />
                            <stop offset='100%' stop-color='#8d4fff' />
                        </linearGradient>
                    </defs>
                    <path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
					M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
					C22.545,2,26,5.541,26,9.909V23.091z" />
                    <polygon class="nav_arrow" fill="#F3F6F9" points="15.044,22.222 16.377,20.888 12.374,16.885 16.377,12.882 15.044,11.55 9.708,16.885 11.04,18.219
					11.042,18.219 " />
                </svg>
            </div>

            <div class="home_slider_nav home_slider_next">
                <svg version="1.1" id="Layer_3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
                    <defs>
                        <linearGradient id='home_grad_next'>
                            <stop offset='0%' stop-color='#2E9FA5' />
                            <stop offset='100%' stop-color='#8d4fff' />
                        </linearGradient>
                    </defs>
                    <path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
                    M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
                    C22.545,2,26,5.541,26,9.909V23.091z" />
                        <polygon class="nav_arrow" fill="#F3F6F9" points="13.044,11.551 11.71,12.885 15.714,16.888 11.71,20.891 13.044,22.224 18.379,16.888 17.048,15.554
                    17.046,15.554 " />
                </svg>
            </div>
        </div>
    </div>

    <!--
    <div class="search">
        <div class="container fill_height">
            <div class="row fill_height">
                <div class="col fill_height">
                    <div class="search_panel active">
                        <form action="{{ url('/user-dashboard') }}" method="get" id="search_form_1" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
                            <div class="search_item">
                                <div>House Type</div>
                                <select name="house_type" id="adults_1" class="dropdown_item_select search_input">
                                    <option value="">Select Type</option>
                                    <option {{ (request()->input('house_type') == 1)?'selected':'' }} value="1">Small</option>
                                    <option {{ (request()->input('house_type') == 2)?'selected':'' }} value="2">Medium</option>
                                    <option {{ (request()->input('house_type') == 3)?'selected':'' }} value="3">Large</option>
                                </select>
                            </div>
                            <div class="search_item">
                                <div>Room Select</div>
                                <select name="no_of_rooms" id="adults_1" class="dropdown_item_select search_input">
                                    <option value="">Select</option>
                                    <option {{ (request()->input('no_of_rooms') == 1)?'selected':'' }} value="1">01</option>
                                    <option {{ (request()->input('no_of_rooms') == 2)?'selected':'' }} value="2">02</option>
                                    <option {{ (request()->input('no_of_rooms') == 3)?'selected':'' }} value="3">03</option>
                                    <option {{ (request()->input('no_of_rooms') == 4)?'selected':'' }} value="4">04</option>
                                    <option {{ (request()->input('no_of_rooms') == 5)?'selected':'' }} value="5">05</option>
                                    <option {{ (request()->input('no_of_rooms') == 6)?'selected':'' }} value="6">06</option>
                                </select>
                            </div>
                            <div class="search_item">
                                <div>Price</div>
                                <input type="text" name="price" class="check_in search_input" placeholder="Price" value="{{ request()->input('price') }}">
                            </div>
                            <div class="search_item">
                                <div>Belcony</div>
                                <select name="no_of_belcony" id="adults_1" class="dropdown_item_select search_input">
                                    <option value="">Select</option>
                                    <option {{ (request()->input('no_of_belcony') == 1)?'selected':'' }} value="1">01</option>
                                    <option {{ (request()->input('no_of_belcony') == 2)?'selected':'' }} value="2">02</option>
                                    <option {{ (request()->input('no_of_belcony') == 3)?'selected':'' }} value="3">03</option>
                                    <option {{ (request()->input('no_of_belcony') == 4)?'selected':'' }} value="4">04</option>
                                </select>
                            </div>

                            <div class="search_item">
                                <div>Gas Available</div>
                                <select id="gas_available" name="gas_available" class="form-control">
                                    <option value="">Select</option>
                                    <option {{ (request()->input('gas_available') == 1)?'selected':'' }} value="1">Yes</option>
                                    <option {{ (request()->input('gas_available') == 2)?'selected':'' }} value="2">No</option>
                                </select>
                            </div>

                            <button type="submit" class="button search_button">search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->

    <div class="intro">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="intro_title text-center">We have the best Houses</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="intro_text text-center">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu convallis tortor. Suspendisse potenti. In faucibus massa arcu, vitae cursus mi hendrerit nec. </p>
                    </div>
                </div>
            </div>
            <div class="row intro_items">
                @foreach($top_review_houses as $top_h)
                <div class="col-lg-4 intro_col">
                    <div class="intro_item">
                        <div class="intro_item_overlay"></div>

                        <div class="intro_item_background" style="background-image:url({{ $top_h->reviewedHouse->image }})"></div>
                        <div class="intro_item_content d-flex flex-column align-items-center justify-content-center">
                            <div class="intro_date">{{ $top_h->reviewedHouse->created_at ??'' }}</div>
                            <div class="button intro_button"><div class="button_bcg"></div><a href="{{ url('single-house-details/'.$top_h->reviewedHouse->id) }}">see more</a></div>
                            <div class="intro_center text-center">
                                {{--<h1>Mauritius</h1>--}}
                                <div class="intro_price">{{ $top_h->reviewedHouse->price ??'' }}</div>
                                <div class="rating rating_4">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="cta">
        <div class="cta_background" style="background-image:url(frequently-changing/frontend/images/cta.jpg)"></div>
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="cta_slider_container">
                        <div class="owl-carousel owl-theme cta_slider">

                            <div class="owl-item cta_item text-center">
                                <div class="cta_title">maldives deluxe package</div>
                                <div class="rating_r rating_r_4">
                                    <i></i>
                                    <i></i>
                                    <i></i>
                                    <i></i>
                                    <i></i>
                                </div>
                                <p class="cta_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu convallis tortor. Suspendisse potenti. In faucibus massa arcu, vitae cursus mi hendrerit nec. Proin bibendum, augue faucibus tincidunt ultrices, tortor augue gravida lectus, et efficitur enim justo vel ligula.</p>
                                <div class="button cta_button"><div class="button_bcg"></div><a href="#">book now</a></div>
                            </div>

                            <div class="owl-item cta_item text-center">
                                <div class="cta_title">maldives deluxe package</div>
                                <div class="rating_r rating_r_4">
                                    <i></i>
                                    <i></i>
                                    <i></i>
                                    <i></i>
                                    <i></i>
                                </div>
                                <p class="cta_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu convallis tortor. Suspendisse potenti. In faucibus massa arcu, vitae cursus mi hendrerit nec. Proin bibendum, augue faucibus tincidunt ultrices, tortor augue gravida lectus, et efficitur enim justo vel ligula.</p>
                                <div class="button cta_button"><div class="button_bcg"></div><a href="#">book now</a></div>
                            </div>

                            <div class="owl-item cta_item text-center">
                                <div class="cta_title">maldives deluxe package</div>
                                <div class="rating_r rating_r_4">
                                    <i></i>
                                    <i></i>
                                    <i></i>
                                    <i></i>
                                    <i></i>
                                </div>
                                <p class="cta_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu convallis tortor. Suspendisse potenti. In faucibus massa arcu, vitae cursus mi hendrerit nec. Proin bibendum, augue faucibus tincidunt ultrices, tortor augue gravida lectus, et efficitur enim justo vel ligula.</p>
                                <div class="button cta_button"><div class="button_bcg"></div><a href="#">book now</a></div>
                            </div>
                        </div>

                        <div class="cta_slider_nav cta_slider_prev">
                            <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
                                <path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
								M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
								C22.545,2,26,5.541,26,9.909V23.091z" />
                                <polygon class="nav_arrow" fill="#F3F6F9" points="15.044,22.222 16.377,20.888 12.374,16.885 16.377,12.882 15.044,11.55 9.708,16.885 11.04,18.219
								11.042,18.219 " />
                            </svg>
                        </div>

                        <div class="cta_slider_nav cta_slider_next">
                            <svg version="1.1" id="Layer_5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
                                <path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
							M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
							C22.545,2,26,5.541,26,9.909V23.091z" />
                                <polygon class="nav_arrow" fill="#F3F6F9" points="13.044,11.551 11.71,12.885 15.714,16.888 11.71,20.891 13.044,22.224 18.379,16.888 17.048,15.554
							17.046,15.554 " />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="offers">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2 class="section_title">the best offers with rooms</h2>
                </div>
            </div>
            <div class="row offers_items">
                @for($i=1; $i<5; $i++)
                <div class="col-lg-6 offers_col">
                    <div class="offers_item">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="offers_image_container">
                                    <div class="offers_image_background" style="background-image:url(frequently-changing/frontend/images/offer_<?php echo $i;?>.jpg)"></div>
                                    <div class="offer_name"><a href="#">grand castle</a></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="offers_content">
                                    <div class="offers_price">$70<span>per night</span></div>
                                    <div class="rating_r rating_r_4 offers_rating">
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                    </div>
                                    <p class="offers_text">Suspendisse potenti. In faucibus massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu convallis tortor.</p>
                                    <div class="offers_icons">
                                        <ul class="offers_icons_list">
                                            <li class="offers_icons_item"><img src="{{ asset('frequently-changing/frontend/images/post.png') }}" alt=""></li>
                                            <li class="offers_icons_item"><img src="{{ asset('frequently-changing/frontend/images/compass.png') }}" alt=""></li>
                                            <li class="offers_icons_item"><img src="{{ asset('frequently-changing/frontend/images/bicycle.png') }}" alt=""></li>
                                            <li class="offers_icons_item"><img src="{{ asset('frequently-changing/frontend/images/sailboat.png') }}" alt=""></li>
                                        </ul>
                                    </div>
                                    <div class="offers_link"><a href="#">read more</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>

    <div class="testimonials">
        <div class="test_border"></div>
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2 class="section_title">what our clients say about us</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <div class="test_slider_container">
                        <div class="owl-carousel owl-theme test_slider">
                            @for($i=1; $i<9; $i++)
                            <div class="owl-item">
                                <div class="test_item">
                                    <div class="test_image"><img src="{{ asset("frequently-changing/frontend/images/offer_$i.jpg") }}" alt="https://unsplash.com/@anniegray"></div>
                                    <div class="test_content_container">
                                        <div class="test_content">
                                            <div class="test_item_info">
                                                <div class="test_name">carla smith</div>
                                                <div class="test_date">May 24, 2017</div>
                                            </div>
                                            <div class="test_quote_title">" Best holliday ever "</div>
                                            <p class="test_quote_text">Nullam eu convallis tortor. Suspendisse potenti. In faucibus massa arcu, vitae cursus mi hendrerit nec.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>

                        <div class="test_slider_nav test_slider_prev">
                            <svg version="1.1" id="Layer_6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">

                                <path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
								M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
								C22.545,2,26,5.541,26,9.909V23.091z" />
                                <polygon class="nav_arrow" fill="#F3F6F9" points="15.044,22.222 16.377,20.888 12.374,16.885 16.377,12.882 15.044,11.55 9.708,16.885 11.04,18.219
								11.042,18.219 " />
</svg>
                        </div>

                        <div class="test_slider_nav test_slider_next">
                            <svg version="1.1" id="Layer_7" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">

                                <path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
							M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
							C22.545,2,26,5.541,26,9.909V23.091z" />
                                <polygon class="nav_arrow" fill="#F3F6F9" points="13.044,11.551 11.71,12.885 15.714,16.888 11.71,20.891 13.044,22.224 18.379,16.888 17.048,15.554
							17.046,15.554 " />
</svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="trending">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2 class="section_title">trending now</h2>
                </div>
            </div>
            <div class="row trending_container">
                @for($i=1; $i<9; $i++)
                <div class="col-lg-3 col-sm-6">
                    <div class="trending_item clearfix">
                        <div class="trending_image"><img src="{{ asset("frequently-changing/frontend/images/trend_$i.png") }}" alt="https://unsplash.com/@fransaraco"></div>
                        <div class="trending_content">
                            <div class="trending_title"><a href="#">grand hotel</a></div>
                            <div class="trending_price">From $182</div>
                            <div class="trending_location">madrid, spain</div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
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
                        <form action="#" id="contact_form" class="contact_form">
                            <input type="text" id="contact_form_name" class="contact_form_name input_field" placeholder="Name" required="required" data-error="Name is required.">
                            <input type="text" id="contact_form_email" class="contact_form_email input_field" placeholder="E-mail" required="required" data-error="Email is required.">
                            <input type="text" id="contact_form_subject" class="contact_form_subject input_field" placeholder="Subject" required="required" data-error="Subject is required.">
                            <textarea id="contact_form_message" class="text_field contact_form_message" name="message" rows="4" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
                            <button type="submit" id="form_submit_button" class="form_submit_button button">send message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

