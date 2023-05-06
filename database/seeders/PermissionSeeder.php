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
        foreach(range(1,5) as $i) {
            $permission = Permission::create([
                'name' => 'permission-'.$i,
            ]);

            ModuleToPermission::updateOrInsert([
                'module_id' => !empty(Module::first()->id)? Module::first()->id:1,
                'permission_id' => $permission->id,
                'status' => 1,
                'created_by' => User::first()->id,
                'updated_by' => User::first()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
