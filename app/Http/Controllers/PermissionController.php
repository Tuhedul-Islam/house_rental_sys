<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\ModuleToPermission;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        try {
            $permissions = Permission::latest()->get();
            return view('backend.system-management.permission-management.index', compact('permissions'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function create(Request $request){
        try {
            $modules = Module::latest()->get();
            return view('backend.system-management.permission-management.create', compact('modules'));
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:permissions',
            'module_id' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $permission = Permission::create(['name' => $request->name]);
            ModuleToPermission::create([
                'module_id' => $request->module_id,
                'permission_id' => $permission->id,
                'status' => 1,
            ]);

            DB::commit();
            toastr()->success('Data has been saved successfully!');
            return redirect('/permissions');
        }catch (Exception $e){
            DB::rollBack();
            toastr()->error('Something went wrong. Please try again. Thanks');
            return back();
        }
    }

    public function edit($id)
    {
        try {
            $modules = Module::latest()->get();
            $module_to_permission = ModuleToPermission::with('module', 'permission')->where('permission_id', $id)->first();
            $permission = Permission::find($id);
            if ($permission) {
                return view('backend.system-management.permission-management.edit', compact('modules', 'permission', 'module_to_permission'));
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
            'module_id' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $permission = Permission::findById($id);
            $permission->name = $request->name;
            if ($permission->save()){
                $module_to_permission = ModuleToPermission::with('module', 'permission')->where('permission_id', $id)->first();
                $module_to_permission->update([
                    'module_id' => $request->module_id,
                ]);
            }

            DB::commit();
            toastr()->success('Data has been saved successfully!');
            return redirect('/permissions');
        }catch (Exception $e){
            DB::rollBack();
            toastr()->error('Something went wrong. Please try again. Thanks');
            return back();
        }
    }

    public function delete($id)
    {
        try {
            $permission = Permission::find($id);
            if ($permission) {
                $permission->delete();
                toastr()->success('Data Deleted Successfully.');
                return redirect('/permissions');
            } else {
                toastr()->error('Something went wrong. Please try again. Thanks');
                return back();
            }
        } catch (RecordsNotFoundException $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

}
