<?php

namespace App\Http\Controllers;

use App\Models\AddNewHouse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $total_owner = AddNewHouse::whereNull('deleted_at')->count();
        $total_customer = AddNewHouse::whereNull('deleted_at')->count();
        $total_houses = AddNewHouse::whereNull('deleted_at')->count();
        //dd($total_houses);
        $data = [
            'total_owner' => $total_owner,
            'total_customer' => $total_customer,
            'total_houses' => $total_houses,
        ];
        return view('backend.dashboard', $data);
    }
}
