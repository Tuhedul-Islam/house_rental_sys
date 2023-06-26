<?php

namespace App\Http\Controllers;

use App\Models\AddNewHouse;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function index(){
        $sliders = Slider::where('status', 1)->get();
        return view('frontend.home', compact('sliders'));
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
        return view('frontend.single-house-details', compact('house'));
    }

    public function aboutUs(){
        return view('frontend.about-us');
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
