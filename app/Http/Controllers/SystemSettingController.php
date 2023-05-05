<?php

namespace App\Http\Controllers;

use App\Models\SystemSetting;
use Exception;
use Illuminate\Http\Request;

class SystemSettingController extends Controller
{
    public function edit(){
        $system_setting = SystemSetting::first();
        return view('backend.system-management.settings.edit', compact('system_setting'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'email' => 'required',
            'phn_no' => 'required',
            'location' => 'required',
        ]);
        try {
            $system_setting = SystemSetting::first();
            if (empty($system_setting)){
                $system_setting = new SystemSetting();
            }
            $system_setting->title = $request->title;
            $system_setting->email = $request->email;
            $system_setting->phn_no = $request->phn_no;
            $system_setting->location = $request->location;

            if($request->file('site_logo')) {
                $this->validate($request,['site_logo'=>'mimes:jpeg,jpg,png']);
                $image = $request->file('site_logo');
                $imageName = time().rand().'.'.trim($image->getClientOriginalExtension());
                $destinationPath = 'frequently-changing/files/favicon/';
                if (isset($system_setting->site_logo)){
                    @unlink(public_path($system_setting->site_logo));
                }
                $image->move(public_path($destinationPath), $imageName);
                $system_setting->site_logo = $destinationPath.$imageName;
            }

            if($request->file('site_favicon')) {
                $this->validate($request,['site_favicon'=>'mimes:jpeg,jpg,png,ico']);
                $image = $request->file('site_favicon');
                $imageName = time().rand().'.'.trim($image->getClientOriginalExtension());
                $destinationPath = 'frequently-changing/files/favicon/';
                if (isset($system_setting->site_favicon)){
                    @unlink(public_path($system_setting->site_favicon));
                }
                $image->move(public_path($destinationPath), $imageName);
                $system_setting->site_favicon = $destinationPath.$imageName;
            }

            $system_setting->save();
            toastr()->success('Data has been Updated successfully!');
            return redirect('settings/system-setting');
        }catch (Exception $e){
            toastr()->error('Something went wrong. Please try again. Thanks');
            return back();
        }
    }

}
