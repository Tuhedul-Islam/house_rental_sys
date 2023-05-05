<?php

namespace App\Http\Controllers;

use App\Models\EmailSetting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmailSettingController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function emailSetting(){
        $email_setting = EmailSetting::first();
        return view('backend.system-management.email-setting.edit', compact('email_setting'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function emailSettingStore(Request $request){
        try {
            $customMessages = [
                'mail_driver.required' => 'Mail Driver Field is required.',
            ];
            $validator = Validator::make($request->all(), [
                'mail_driver' => 'required',
                'mail_host' => 'required',
                'mail_port' => 'required',
                'mail_encryption' => 'required',
                'mail_username' => 'required',
                'mail_password' => 'required',
                'mail_from' => 'required',
                'mail_fromname' => 'required',
            ], $customMessages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            $email_setting = EmailSetting::first();
            $update = [
                'mail_driver' => $request->mail_driver,
                'mail_host' => $request->mail_host,
                'mail_port' => $request->mail_port,
                'mail_encryption' => $request->mail_encryption,
                'mail_username' => $request->mail_username,
                'mail_password' => $request->mail_password,
                'mail_from' => $request->mail_from,
                'mail_fromname' => $request->mail_fromname,
                'status' => 1
            ];
            $email_setting->update($update);
            toastr()->success('Data Updated Successfully.');
            return redirect('settings/email-setting');
        } catch (Exception $e) {
            toastr()->error('Something went wrong. Please try again. Thanks');
            return back();
        }
    }

}
