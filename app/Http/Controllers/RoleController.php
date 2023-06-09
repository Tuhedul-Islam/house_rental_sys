<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
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
            $permissions = Permission::all();
            return view('backend.system-management.role-management.create', compact('permissions'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:roles',
            'permission' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $role = Role::create(['name' => $request->name]);
            $role->givePermissionTo($request->permission);

            DB::commit();
            toastr()->success('Data has been saved successfully!');
            return redirect('/roles');
        }catch (Exception $e){
            DB::rollBack();
            toastr()->error('Something went wrong. Please try again. Thanks');
            return back();
        }
    }

    public function edit($id)
    {
        try {
            $permissions = Permission::all();
            $role = Role::find($id);
            if ($role) {
                return view('backend.system-management.role-management.edit', compact('role', 'permissions'));
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
            'permission' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $role = Role::findById($id);
            $role->name = $request->name;
            $role->save();
            $role->syncPermissions($request->permission);

            DB::commit();
            toastr()->success('Data has been Updated successfully!');
            return redirect('/roles');
        }catch (Exception $e){
            DB::rollBack();
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
