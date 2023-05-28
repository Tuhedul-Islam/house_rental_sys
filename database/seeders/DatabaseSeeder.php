<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserTableSeeder::class,
            SystemSettingSeeder::class,
            ModuleSeeder::class,
            EmailSettingSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            SliderSeeder::class,
            AboutUsSeeder::class,
            ContactUsSeeder::class,
        ]);
    }
}
