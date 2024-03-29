@extends('frontend.layout')
@section('navbar')
    @include('frontend.navbar')
@endsection
@section('footer')
    @include('frontend.footer')
@endsection
@section('content')
    <div class="offers">
        <div class="container">
            <div class="row">
                <div class="search" style="margin-top: 10px; margin-left: 15px; margin-right: 15px;">
                    <div class="container fill_height">
                        <div class="row fill_height">
                            <div class="col fill_height">
                                <u><h3 class="text-center text-capitalize" style="color: white">Logged In User Info</h3></u>
                                <h3 class="text-center text-capitalize" style="color: white"> Name: {!! \Illuminate\Support\Facades\Auth::user()->name !!}</h3>
                                <h3 class="text-center" style="color: white"> Email: {!! \Illuminate\Support\Facades\Auth::user()->email !!}</h3>
                            </div>
                            <div class="col fill_height">
                                <u><h3 class="text-center text-capitalize" style="color: white">Total Houses</h3></u>
                                <h3 class="text-center" style="color: white; margin-top: 30px"><span class="bg-info p-2">Amount: {!! isset($houses)? count($houses):0 !!}</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="search" style="margin-top: 10px; margin-left: 15px; margin-right: 15px;">
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
                                            <div>Location</div>
                                            <input type="text" name="location" class="check_in search_input" placeholder="location" value="{{ request()->input('location') }}">
                                        </div>

                                        <!--
                                        <div class="search_item">
                                            <div>Gas Available</div>
                                            <select id="gas_available" name="gas_available" class="form-control">
                                                <option value="">Select</option>
                                                <option {{ (request()->input('gas_available') == 1)?'selected':'' }} value="1">Yes</option>
                                                <option {{ (request()->input('gas_available') == 2)?'selected':'' }} value="2">No</option>
                                            </select>
                                        </div>
                                        -->

                                        <button type="submit" class="button search_button">search</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12" style="margin-bottom: 10px">
                    <div class="offers_grid">
                        @foreach($houses as $house)
                            <div class="offers_item rating_4">
                                <div class="row">
                                    <div class="col-lg-4 col-1680-4">
                                        <div class="offers_image_container">
                                            <div class="offers_image_background" style="background-image:url({{ $house->image ??'' }})"></div>
                                            <div class="offer_name"><a href="{{ url('single-house-details/'.$house->id) }}">grand castle</a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="offers_content">
                                            <div class="offers_price">{{ $house->price??'' }}</div>
                                            <div class="rating_r rating_r_4 offers_rating" data-rating="4">
                                                <i></i>
                                                <i></i>
                                                <i></i>
                                                <i></i>
                                                <i></i>
                                            </div>
                                            <p class="offers_text">{{ $house->description??'' }}</p>
                                            <div class="btn btn-info"><a class="text-white" href="{{ url('single-house-details/'.$house->id) }}">Details</a></div>
                                            @if(auth()->user()->user_type==2)
                                                <div class="btn btn-danger" onclick="return confirm('Are you Sure?')"><a class="text-white" href="{{ url('delete-single-house/'.$house->id) }}">Delete</a></div>
                                            @endif
                                            <div class="offer_reviews d-none">
                                                <div class="offer_reviews_content">
                                                    <div class="offer_reviews_title">very good</div>
                                                    <div class="offer_reviews_subtitle">100 reviews</div>
                                                </div>
                                                <div class="offer_reviews_rating text-center">8.1</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

