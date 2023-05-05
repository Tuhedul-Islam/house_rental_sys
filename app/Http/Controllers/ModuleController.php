<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Exception;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index(){
        try {
            $modules = Module::latest()->get();
            return view('backend.module-management.index', compact('modules'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function create(Request $request){
        try {
            return view('backend.module-management.create');
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:modules',
        ]);

        try {
            $module = Module::create(['name' => $request->name]);
            toastr()->success('Data has been saved successfully!');
            return redirect('/modules');
        }catch (Exception $e){
            toastr()->error('Something went wrong. Please try again. Thanks');
            return back();
        }
    }

    public function edit($id)
    {
        try {
            $module = Module::find($id);
            if ($module) {
                return view('backend.module-management.edit', compact('module'));
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
            'name' => 'required',
        ]);

        try {
            $module = Module::find($id);
            $module->name = $request->name;
            $module->save();
            toastr()->success('Data has been Updated successfully!');
            return redirect('/modules');
        }catch (Exception $e){
            toastr()->error('Something went wrong. Please try again. Thanks');
            return back();
        }
    }

    public function delete($id)
    {
        try {
            $module = Module::find($id);
            if ($module) {
                $module->delete();
                toastr()->success('Data Deleted Successfully.');
                return redirect('/modules');
            } else {
                toastr()->error('Something went wrong. Please try again. Thanks');
                return back();
            }
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }
}
