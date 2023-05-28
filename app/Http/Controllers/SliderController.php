<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Exception;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    public function index(){
        try {
            $sliders = Slider::latest()->get();
            return view('backend.master-setup.slider.index', compact('sliders'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function create(Request $request){
        try {
            return view('backend.master-setup.slider.create');
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'text_content' => 'required',
            'slider_img' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $slider = new Slider();
            $slider->text_content = $request->text_content;
            if($request->file('slider_img')) {
                $this->validate($request,['slider_img'=>'mimes:jpeg,jpg,png']);
                $image = $request->file('slider_img');
                $imageName = time().rand().'.'.trim($image->getClientOriginalExtension());
                $destinationPath = 'frequently-changing/files/slider-img/';
                $image->move(public_path($destinationPath), $imageName);
                $slider->slider_img = $destinationPath.$imageName;
            }
            $slider->save();

            DB::commit();
            toastr()->success('Data has been saved successfully!');
            return redirect('/sliders');
        }catch (Exception $e){
            DB::rollBack();
            toastr()->error('Something went wrong. Please try again. Thanks');
            return back();
        }
    }

    public function edit($id)
    {
        try {
            $slider = Slider::find($id);
            if ($slider) {
                return view('backend.master-setup.slider.edit', compact('slider'));
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
            'text_content' => 'required',
            'slider_img' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $slider = Slider::find($id);
            $slider->text_content = $request->text_content;
            if($request->file('slider_img')) {
                $this->validate($request,['slider_img'=>'mimes:jpeg,jpg,png']);
                $image = $request->file('slider_img');
                $imageName = time().rand().'.'.trim($image->getClientOriginalExtension());
                $destinationPath = 'frequently-changing/files/slider-img/';
                if (isset($slider->slider_img)){
                    @unlink(public_path($slider->slider_img));
                }
                $image->move(public_path($destinationPath), $imageName);
                $slider->slider_img = $destinationPath.$imageName;
            }
            $slider->save();

            DB::commit();
            toastr()->success('Data has been saved successfully!');
            return redirect('/sliders');
        }catch (Exception $e){
            DB::rollBack();
            toastr()->error('Something went wrong. Please try again. Thanks');
            return back();
        }
    }

    public function status($id)
    {
        try {
            $slider = Slider::find($id);
            if ($slider) {
                if ($slider->status === 2) {
                    $status = 1;
                } else {
                    $status = 2;
                }
                $update_data = [
                    'status' => $status,
                ];
                Slider::where('id', $id)->update($update_data);

                toastr()->success('Status Updated Successfully.');
                return redirect('/sliders');
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
            $slider = Slider::find($id);
            if ($slider) {
                $slider->delete();
                toastr()->success('Data Deleted Successfully.');
                return redirect()->back();
            } else {
                toastr()->error('Something went wrong. Please try again. Thanks');
                return redirect()->back();
            }
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }
}
