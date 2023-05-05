<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
        try {
            $roles = Role::latest()->get();
            return view('backend.system-management.role-management.index', compact('roles'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function create(Request $request){
        try {
            return view('backend.system-management.role-management.create');
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:roles',
        ]);

        try {
            $role = Role::create(['name' => $request->name]);
            toastr()->success('Data has been saved successfully!');
            return redirect('/roles');
        }catch (Exception $e){
            toastr()->error('Something went wrong. Please try again. Thanks');
            return back();
        }
    }

    public function edit($id)
    {
        try {
            $role = Role::find($id);
            if ($role) {
                return view('backend.system-management.role-management.edit', compact('role'));
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
            $role = Role::findById($id);
            $role->name = $request->name;
            $role->save();
            toastr()->success('Data has been Updated successfully!');
            return redirect('/roles');
        }catch (Exception $e){
            toastr()->error('Something went wrong. Please try again. Thanks');
            return back();
        }
    }

    public function delete($id)
    {
        try {
            $role = Role::find($id);
            if ($role) {
                $role->delete();
                toastr()->success('Data Deleted Successfully.');
                return redirect('/roles');
            } else {
                toastr()->error('Something went wrong. Please try again. Thanks');
                return back();
            }
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

}
