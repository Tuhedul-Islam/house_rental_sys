<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AddNewHouse;
use App\Models\Branch;
use App\Models\Concern;
use App\Models\CounterDesk;
use App\Models\ItemCategory;
use App\Models\User;
use Exception;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserAuthController extends Controller
{
    public function index(){
        try {
            $user_type = '';
            if (\request()->is('users')){
                $user_type = 1;
                $users = User::latest()->where('user_type', 1)->get();
            }elseif (\request()->is('house-owners')){
                $user_type = 2;
                $users = User::latest()->where('user_type', 2)->get();
            }elseif (\request()->is('customers')){
                $user_type = 3;
                $users = User::latest()->where('user_type', 3)->get();
            }else{
                return redirect()->back();
            }
            return view('backend.system-management.user-management.index', compact('users', 'user_type'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function create(Request $request){
        try {
            $roles = Role::all();
            return view('backend.system-management.user-management.create', compact('roles'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }

    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'roles' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $create_user = new User();
            $create_user->name = $request->name;
            $create_user->user_type = 1;
            $create_user->user_name = '';
            $create_user->email = $request->email;
            $create_user->phone_no  = $request->phone_no ;
            $create_user->password = bcrypt($request->password);
            $create_user->language = 'en';
            $create_user->status = 1;
            $create_user->save();
            $create_user->assignRole($request->input('roles'));

            DB::commit();
            toastr()->success('Data has been saved successfully!');
            return redirect('/users');
        }catch (Exception $e){
            DB::rollBack();
            toastr()->error('Something went wrong. Please try again. Thanks');
            return back();
        }
    }

    public function edit($id)
    {
        try {
            $roles = Role::all();
            $user = User::with('roles')->find($id); //A use with all roles
            if ($user) {
                return view('backend.system-management.user-management.edit', compact('user', 'roles'));
            } else {
                toastr()->error('Something went wrong. Please try again. Thanks');
                return back();
            }
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        DB::beginTransaction();
        try {
            $create_user = User::find($id);
            $create_user->name = $request->name;
            $create_user->user_type = 1;
            $create_user->user_name = '';
            $create_user->email = $request->email;
            $create_user->phone_no  = $request->phone_no ;
            if (!empty($request->password) && (strcmp($request->password, $request->confirm_password) == 0)){
                $create_user->password = bcrypt($request->password);
            }
            $create_user->language = 'en';
            $create_user->status = 1;
            $create_user->save();

            DB::table('model_has_roles')->where('model_id',$create_user->id)->delete();
            $create_user->assignRole($request->input('roles'));

            DB::commit();
            toastr()->success('Data has been Updated successfully!');
            return redirect('/users');
        }catch (Exception $e){
            DB::rollBack();
            toastr()->error('Something went wrong. Please try again. Thanks');
            return back();
        }
    }

    public function status($id)
    {
        try {
            $user = user::find($id);
            if ($user) {
                if ($user->status === 0) {
                    $status = 1;
                } else {
                    $status = 0;
                }
                $update_data = [
                    'status' => $status,
                ];
                user::where('id', $id)->update($update_data);

                toastr()->success('Status Updated Successfully.');
                return redirect('/users');
            } else {
                toastr()->error('Something went wrong. Please try again. Thanks');
                return back();
            }
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $user = user::find($id);
            if ($user) {
                $user->status = 0;
                $user->save();
                $user->delete();
                toastr()->success('Data Deleted Successfully.');
                return redirect('/users');
            } else {
                toastr()->error('Something went wrong. Please try again. Thanks');
                return back();
            }
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function login(Request $request)
    {
        $user = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($user)) {
            return response(['error_message' => 'Incorrect Details.
            Please try again']);
        }
        $token = auth()->user()->createToken('API Token')->accessToken;
        return response(['user' => auth()->user(), 'token' => $token]);

    }


    //Ajax
    public function getRelatedBranches(Request $request){
        $concern_id = $request->concern_id;
        $branches = Branch::where('concern_id', $concern_id)->get();
        $result = '';
        $result = '<option value="">Select Counter</option>';
        if ($branches){
            foreach ($branches as $branch){
                $result.= '<option value="'.$branch->id.'">'.$branch->name.'</option>';
            }
        }
        return $result;
    }

    public function getRelatedCounters(Request $request){
        $concern_id = $request->concern_id;
        $branch_id = $request->branch_id;
        $counters = CounterDesk::where('concern_id', $concern_id)->where('branch_id', $branch_id)->get();
        $result = '';
        $result = '<option value="">Select Counter</option>';
        if ($counters){
            foreach ($counters as $counter){
                $result.= '<option value="'.$counter->id.'">'.$counter->counter_name.'</option>';
            }
        }
        return $result;
    }

    public function userProfile(Request $request){
        try {
            $user = User::find(Auth::id());
            return view('backend.system-management.user-management.profile-update', compact('user'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }

    }

    public function userProfileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        try {
            $update_profile = User::find(Auth::user()->id);
            $update_profile->name = $request->name;
            $update_profile->user_name = '';
            $update_profile->email = $request->email;
            $update_profile->phone_no  = $request->phone_no ;
            if (!empty($request->password) && (strcmp($request->password, $request->confirm_password) == 0)){
                $update_profile->password = bcrypt($request->password);
            }
            $update_profile->language = empty($update_profile->language)?'en':$update_profile->language;
            $update_profile->status = 1;
            $update_profile->save();
            toastr()->success('Data has been Updated successfully!');
            return redirect()->back();
        }catch (Exception $e){
            toastr()->error('Something went wrong. Please try again. Thanks');
            return back();
        }
    }


    public function houseList($id){
        $houses = AddNewHouse::where('created_by', $id)->get();
        $house_owner = User::find($id);
        return view('backend.system-management.user-management.house-list', compact('houses', 'house_owner'));
    }

}
