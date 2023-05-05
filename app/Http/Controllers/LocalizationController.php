<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class LocalizationController extends Controller
{
    public function changeLanguage($lang){
        $user = User::find(Auth::user()->id);
        if ($lang){
            $user->language = $lang;
            $user->save();
        } else{
            $user->language = 'en';
            $user->save();
        }
        return redirect()->back();
    }

    public function languageSetting(){
        return view('backend.system-management.localization.index');
    }

    public function languageEdit($lang){
        $data['contents'] = [];
        $lang_files = ['en', 'bn'];
        if (in_array($lang, $lang_files)){
            //$file_data = include(resource_path("lang/$lang/index.php"));
            $file_data = resource_path()."/lang/$lang/index.php";
            $data['contents'] = File::getRequire($file_data);
            return view('backend.system-management.localization.edit-lang', compact('data', 'lang'));
        }else{
            return redirect('settings/language-setting');
        }
    }

    public function languageUpdate(Request $request, $lang){
        $languages = $request->except('_method', '_token');
        $file = resource_path()."/lang/$lang/index.php";
        $current = file_get_contents($file);
        //update the existing value
        $current = "<?php \n return [ \n";
        if (!empty($request->keywords) && isset($request->keywords)){
            foreach ($request->keywords as $i=>$key){
                $current .= '"' . $request->keywords[$i] . '"=>"' . $request->values[$i] . '",';
                $current .= "\n";
            }
        }
        $current .= '];';
        if (!empty($request->keywords) && isset($request->keywords)){
            file_put_contents($file, $current);
            toastr()->success('Data Updated Successfully');
        }else{
            toastr()->error('Data Can not be Updated Successfully');
        }

        return redirect()->back();
    }

}
