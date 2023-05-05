<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }

    public function changePassword(){
        return view('auth.change-password');
    }

    public function updatePassword(Request $request){
        try {
            $customMessages = [
                'old_password.required' => 'Old Password Field is required.',
                'password.required' => 'Password Field is required.',
                'confirm_password.required' => 'New Password Field is required.',
            ];
            $validator = Validator::make($request->all(), [
                'old_password' => 'required',
                'password' => 'required',
                'confirm_password' => 'required',
            ], $customMessages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }

            $hashedPassword = Hash::make($request->password);
            if ($request->password==$request->confirm_password){
                if (Hash::check($request->old_password, Auth::user()->password)) {
                    Auth::user()->update(['password'=>$hashedPassword]);
                    toastr()->success('Password Updated Successfully');
                    return back();
                }else{
                    toastr()->error('Old Password not matched');
                    return back();
                }
            }else{
                toastr()->error('New Password and Confirm Password not matched');
                return back();
            }
        }catch (Exception $e) {
            toastr()->error('Something went wrong. Please try again. Thanks');
            return back();
        }
    }

}
