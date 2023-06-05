<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientRegisterController extends Controller
{
    public function userRegister(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'user_type' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $create_user = new User();
            $create_user->name = $request->name;
            $create_user->user_type = ($request->user_type==2)? $request->user_type:(($request->user_type==3)? $request->user_type:3);
            $create_user->user_name = '';
            $create_user->email = $request->email;
            $create_user->phone_no  = $request->phone_no ;
            $create_user->password = bcrypt($request->password);
            $create_user->language = 'en';
            $create_user->status = 1;
            $create_user->save();

            DB::commit();
            toastr()->success('Account Created successfully!');
            return redirect('/user-login');
        }catch (Exception $e){
            DB::rollBack();
            toastr()->error('Something went wrong. Please try again. Thanks');
            return back();
        }
    }

    public function userLogin(Request $request){
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user_info = User::where('email', $request->email)->first();
        if ($user_info && ($user_info->user_type==2 || $user_info->user_type==3)){
            if (Auth::attempt($data)){
                return redirect('/user-dashboard');
            } else{
                toastr()->error('Something went wrong. Please try again. Thanks');
                return back();
            }
        }
        else{
            toastr()->error('Something went wrong. Please try again. Thanks');
            return back();
        }

    }


}
