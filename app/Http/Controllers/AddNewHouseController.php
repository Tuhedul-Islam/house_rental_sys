<?php

namespace App\Http\Controllers;

use App\Models\AddNewHouse;
use Exception;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddNewHouseController extends Controller
{
    public function userDashboard(Request $request){
        $house_type = $request->input('house_type');
        $no_of_rooms = $request->input('no_of_rooms');
        $price = $request->input('price');
        $no_of_belcony = $request->input('no_of_belcony');
        $gas_available = $request->input('gas_available');

        $houses = AddNewHouse::where('created_by', Auth::user()->id);
        if ($house_type){
            $houses->where('house_type', $house_type);
        }
        if ($no_of_rooms){
            $houses->where('no_of_rooms', $no_of_rooms);
        }
        if ($price){
            $houses->where('price', $price);
        }
        if ($no_of_belcony){
            $houses->where('no_of_belcony', $no_of_belcony);
        }
        if ($gas_available){
            $houses->where('gas_available', $gas_available);
        }
        $houses = $houses->get();

        return view('frontend.user-dashboard', compact('houses'));
    }

    public function create(){
        return view('frontend.add-new-house');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'house_type' => 'required',
            'location' => 'required',
            'price' => 'required',
            'image' => 'required',
            'no_of_rooms' => 'required',
            'no_of_belcony' => 'required',
            'service_charge' => 'required',
            'gas_available' => 'required',
            'current_bill' => 'required',
            'generator' => 'required',
            'description' => 'required',
        ]);

        DB::beginTransaction();

        $addHouse = new AddNewHouse();
        $addHouse->house_type = $request->house_type;
        $addHouse->location = $request->location;
        $addHouse->price = $request->price;
        $addHouse->no_of_rooms = $request->no_of_rooms;
        $addHouse->no_of_belcony = $request->no_of_belcony;
        $addHouse->service_charge = $request->service_charge;
        $addHouse->gas_available = $request->gas_available;
        $addHouse->current_bill = $request->current_bill;
        $addHouse->generator = $request->generator;
        $addHouse->description = $request->description;

        if($request->file('image')) {
            $this->validate($request,['image'=>'mimes:jpeg,jpg,png']);
            $image = $request->file('image');
            $imageName = time().rand().'.'.trim($image->getClientOriginalExtension());
            $destinationPath = 'frequently-changing/files/house-img/';
            $image->move(public_path($destinationPath), $imageName);
            $addHouse->image = $destinationPath.$imageName;
        }
        $addHouse->save();
        dd('dasd');

        try {

            $addHouse->save();

            DB::commit();
            toastr()->success('Data has been saved successfully!');
            return redirect('/user-dashboard');
        }catch (Exception $e){
            DB::rollBack();
            toastr()->error('Something went wrong. Please try again. Thanks');
            return back();
        }
    }

    public function delete($id)
    {
        try {
            $house = AddNewHouse::find($id);
            if ($house) {
                @unlink($house->image);
                $house->delete();
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
