<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\AddNewHouse;
use App\Models\HouseBookedHistory;
use App\Models\HouseReview;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function index(){
        $sliders = Slider::where('status', 1)->get();
        $top_review_houses = HouseReview::with('reviewedHouse')->select('house_id')->groupBy('house_id')->limit(3)->get();
        $last_ten_reviews = HouseReview::with('reviewedHouse', 'reviewBy')->orderBy('id', 'DESC')->limit(10)->get();
        $best_offer_rooms = AddNewHouse::where('no_of_rooms', '>=', '3')->orderBy('id', 'DESC')->orderBy('price', 'ASC')->limit(6)->get();
        $trending_houses = HouseBookedHistory::with('bookedHouseDetails')->select('house_id')->groupBy('house_id')->limit(8)->get();

        $data = [
            'last_ten_reviews' => $last_ten_reviews,
            'best_offer_rooms' => $best_offer_rooms,
            'trending_houses' => $trending_houses,
        ];

        return view('frontend.home', $data, compact('sliders', 'top_review_houses'));
    }

    public function login(){
        return view('frontend.login');
    }

    public function register(){
        return view('frontend.register');
    }

    public function allHouses(Request $request){
        $house_type = $request->input('house_type');
        $no_of_rooms = $request->input('no_of_rooms');
        $price = $request->input('price');
        $no_of_belcony = $request->input('no_of_belcony');
        $gas_available = $request->input('gas_available');

        $houses = AddNewHouse::where('booked_status', 0);
        if ($house_type){
            $houses->where('house_type', $house_type);
        }
        if ($no_of_rooms){
            $houses->where('no_of_rooms', $no_of_rooms);
        }
        if ($price){
            $houses->where('price', $price);
        }
        if ($no_of_belcony){
            $houses->where('no_of_belcony', $no_of_belcony);
        }
        if ($gas_available){
            $houses->where('gas_available', $gas_available);
        }

        $houses = $houses->get();
        return view('frontend.all-houses', compact('houses'));
    }

    public function singleHouseDetails($id){
        $house = AddNewHouse::find($id);
        $related_houses = AddNewHouse::where('house_type', $house->house_type)->orderBY('id', 'DESC')->get();
        $reviews = HouseReview::with('reviewBy', 'reviewedHouse')->where('house_id', $id)
            ->limit(10)->orderBy('id', 'DESC')->get();

        return view('frontend.single-house-details', compact('house', 'related_houses', 'reviews'));
    }

    public function aboutUs(){
        $about_us = AboutUs::first();
        return view('frontend.about-us', compact('about_us'));
    }

    public function contactUs(){
        return view('frontend.contact-us');
    }

    public function userLogout(){
        Session::flush();
        Auth::logout();
        return redirect('user-login');
    }
}
