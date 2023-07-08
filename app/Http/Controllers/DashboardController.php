<?php

namespace App\Http\Controllers;

use App\Models\AddNewHouse;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $total_houses = AddNewHouse::whereNull('deleted_at')->count();
        $total_owner = User::whereNull('deleted_at')->where('user_type',2)->count();
        $total_customer = User::whereNull('deleted_at')->where('user_type',3)->count();
        $total_booked_house = AddNewHouse::whereNull('deleted_at')->where('booked_status',1)->count();
        //dd($total_houses);
        $data = [
            'total_owner' => $total_owner,
            'total_customer' => $total_customer,
            'total_houses' => $total_houses,
            'total_booked_house' => $total_booked_house,
        ];
        return view('backend.dashboard', $data);
    }
}
