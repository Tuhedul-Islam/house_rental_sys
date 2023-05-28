<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\ModuleToPermission;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('permissions')->truncate();
        DB::table('module_to_permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $faker = Faker::create();

        $permissions = [
            //User Management
            //User
            ['name' => 'user-list','module' => 'user-management', 'sub_module' => 'user-list','guard_name' => 'web'],
            ['name' => 'user-create','module' => 'user-management', 'sub_module' => 'user-list','guard_name' => 'web'],
            ['name' => 'user-edit','module' => 'user-management', 'sub_module' => 'user-list','guard_name' => 'web'],
            ['name' => 'user-delete','module' => 'user-management', 'sub_module' => 'user-list','guard_name' => 'web'],
            //House Owner
            ['name' => 'house-owner-list','module' => 'user-management', 'sub_module' => 'house-owner-list','guard_name' => 'web'],
            //Customer
            ['name' => 'customer-list','module' => 'user-management', 'sub_module' => 'customer-list','guard_name' => 'web'],

            //Role Management
            //Module
            ['name' => 'module-list','module' => 'role-management', 'sub_module' => 'module-list','guard_name' => 'web'],
            ['name' => 'module-create','module' => 'role-management', 'sub_module' => 'module-list','guard_name' => 'web'],
            ['name' => 'module-edit','module' => 'role-management', 'sub_module' => 'module-list','guard_name' => 'web'],
            ['name' => 'module-delete','module' => 'role-management', 'sub_module' => 'module-list','guard_name' => 'web'],
            //Role
            ['name' => 'role-list','module' => 'role-management', 'sub_module' => 'role-list','guard_name' => 'web'],
            ['name' => 'role-create','module' => 'role-management', 'sub_module' => 'role-list','guard_name' => 'web'],
            ['name' => 'role-edit','module' => 'role-management', 'sub_module' => 'role-list','guard_name' => 'web'],
            ['name' => 'role-delete','module' => 'role-management', 'sub_module' => 'role-list','guard_name' => 'web'],
            //Permission
            ['name' => 'permission-list','module' => 'role-management', 'sub_module' => 'permission-list','guard_name' => 'web'],
            ['name' => 'permission-create','module' => 'role-management', 'sub_module' => 'permission-list','guard_name' => 'web'],
            ['name' => 'permission-edit','module' => 'role-management', 'sub_module' => 'permission-list','guard_name' => 'web'],
            ['name' => 'permission-delete','module' => 'role-management', 'sub_module' => 'permission-list','guard_name' => 'web'],

            //System Management
            //Module
            ['name' => 'system-setting','module' => 'system-management', 'sub_module' => 'system-setting','guard_name' => 'web'],
            ['name' => 'language-setting','module' => 'system-management', 'sub_module' => 'language-setting','guard_name' => 'web'],
            ['name' => 'email-setting','module' => 'system-management', 'sub_module' => 'email-setting','guard_name' => 'web'],
            ['name' => 'activity-log','module' => 'system-management', 'sub_module' => 'activity-log','guard_name' => 'web'],
        ];


        //All Permission
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        $adminRole = Role::updateOrCreate(['name' => 'Admin', 'guard_name' => 'web']);
        $adminRole->givePermissionTo(Permission::all());

        $user = User::take(1)->first();
        if($user)
        {
            $user->assignRole('Admin');
        }


//        foreach(range(1,5) as $i) {
//            $permission = Permission::create([
//                'name' => 'permission-'.$i,
//            ]);
//
//            ModuleToPermission::updateOrInsert([
//                'module_id' => !empty(Module::first()->id)? Module::first()->id:1,
//                'permission_id' => $permission->id,
//                'status' => 1,
//                'created_by' => User::first()->id,
//                'updated_by' => User::first()->id,
//                'created_at' => Carbon::now(),
//                'updated_at' => Carbon::now(),
//            ]);
//        }

    }
}
