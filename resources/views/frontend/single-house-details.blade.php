@extends('frontend.layout')
@section('navbar')
    @include('frontend.navbar')
@endsection
@section('footer')
    @include('frontend.footer')
@endsection
@section('content')
    <div class="listing" style="margin-top: 20px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single_listing">
                        <div class="hotel_info">
                            <div class="hotel_title_container d-flex flex-lg-row flex-column">
                                <div class="hotel_title_content">
                                    <h1 class="hotel_title">Best View </h1>
                                    <div class="hotel_location">{{ $house->location??'' }}</div>
                                    <div class="rating_r rating_r_4 hotel_rating">
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                    </div>
                                </div>
                                <div class="hotel_title_button ml-lg-auto text-lg-right">
                                    <div class="button book_button trans_200">
                                        @if((auth()->user()->user_type==3) && ($house->booked_status==0))<a href="{{ url('booked-house/'.$house->id) }}">book</a>@endif
                                    </div>
                                </div>
                            </div>

                            <div class="hotel_image">
                                <img src="{{ asset($house->image) }}" alt="">
                                <div class="hotel_review_container d-flex flex-column align-items-center justify-content-center">
                                    <div class="hotel_review">
                                        <div class="hotel_review_content">
                                            <div class="hotel_review_title">very good</div>
                                            <div class="hotel_review_subtitle">100 reviews</div>
                                        </div>
                                        <div class="hotel_review_rating text-center">8.1</div>
                                    </div>
                                </div>
                            </div>

                            <div class="hotel_info_text">
                                <p>{{ $house->description }}</p>
                            </div>
                            <div class="hotel_location">
                                Price: {{ $house->price??'' }} <br>
                                House Type: {{ $house->house_type==1?'Small':($house->house_type==2?'Medium':'Large') }} <br>
                                No of Rooms: {{ $house->no_of_rooms??'' }} <br>
                                No of Belcony: {{ $house->no_of_belcony??'' }} <br>
                                Service Charge: {{ $house->service_charge??'' }} <br>
                                Gas Available: {{ $house->gas_available==1? 'Yes':'No' }} <br>
                                Current Bill: {{ $house->current_bill==1?'Included':'Not Included' }} <br>
                                Generator: {{ $house->generator==1?'Yes':'Not' }} <br>
                            </div>
                        </div>

                        <div class="rooms">
                            <div class="related_house">Related Houses</div>
                            @foreach($related_houses as $val)
                            <div class="room">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="room_image"><img src="{{ asset($val->image) }}" alt="Room"></div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="room_content">
                                            <div class="room_title">{{ ($val->house_type==1)? 'Small':($val->house_type==2)?'Medium':'Large' }}</div>
                                            <div class="room_price">{{ $val->price }}</div>
                                            <div class="room_text">{{ $val->location }}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 text-lg-right">
                                        <div class="room_button">
                                            <div class="button book_button trans_200"><a href="{{ url('single-house-details/'.$val->id) }}">Details</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        @if( ((isset( auth()->user()->user_type)) && (auth()->user()->user_type ==3)) || (auth()->user()->id != $house->created_by ))
                            <div class="row">
                                <div class="col-lg-12" style="margin-bottom: 10px">
                                    <div class="offers_grid">
                                        <form method="post" action="{{url('house-review/'.$house->id)}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">
                                                <input type="hidden" value="{{ $house->id }}" name="review_house_id">
                                                <div class="form-group col-md-6">
                                                    <label for="review">Review</label>
                                                    <textarea class="form-control" name="review" id="review" rows="6"></textarea>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-info">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="reviews">
                            @if(count($reviews) > 0)<div class="reviews_title">reviews</div>@endif
                            <div class="reviews_container">
                                @foreach($reviews as $review)
                                <div class="review">
                                    <div class="row">
                                        <div class="col-lg-1">
                                            <div class="review_image">
                                                <img src="{{ asset('frequently-changing/frontend/images/review_1.jpg') }}" alt="img">
                                            </div>
                                        </div>
                                        <div class="col-lg-11">
                                            <div class="review_content">
                                                <div class="review_title_container">
                                                    <div class="review_title">{{ $review->reviewBy->name?? '' }}</div>
                                                </div>
                                                <div class="review_text">
                                                    <p>{!! $review->review ??'' !!}</p>
                                                </div>
                                                <div class="review_date">{{ $review->created_at?? '' }}</div>
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
        </div>
    </div>
@endsection

