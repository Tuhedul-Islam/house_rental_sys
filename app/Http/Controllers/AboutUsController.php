<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Exception;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{
    public function index(){
        try {
            $about_us = AboutUs::first();
            return view('backend.master-setup.about-us.index', compact('about_us'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $about_us = AboutUs::find($id);
            if ($about_us) {
                return view('backend.master-setup.about-us.edit', compact('about_us'));
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
        $data = $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'about_img' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $about_us = AboutUs::find($id);
            $about_us->title = $request->title;
            $about_us->desc = $request->desc;
            if($request->file('about_img')) {
                $this->validate($request,['about_img'=>'mimes:jpeg,jpg,png']);
                $image = $request->file('about_img');
                $imageName = time().rand().'.'.trim($image->getClientOriginalExtension());
                $destinationPath = 'frequently-changing/files/about-us-img/';
                if (isset($about_us->about_img)){
                    @unlink(public_path($about_us->about_img));
                }
                $image->move(public_path($destinationPath), $imageName);
                $about_us->about_img = $destinationPath.$imageName;
            }
            $about_us->save();

            DB::commit();
            toastr()->success('Data has been saved successfully!');
            return redirect('/about-us');
        }catch (Exception $e){
            DB::rollBack();
            toastr()->error('Something went wrong. Please try again. Thanks');
            return back();
        }
    }
}
