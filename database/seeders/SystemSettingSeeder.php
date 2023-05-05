<?php

namespace Database\Seeders;

use App\Models\SystemSetting;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $faker = Faker::create();

        SystemSetting::updateOrInsert([
            'title' => 'Erp Engine',
            'email' => 'erp@gmail.com',
            'phn_no' => $faker->phoneNumber,
            'site_logo' => $faker->image,
            'site_favicon' => '',
            'location' => 'Uttara, Dhaka',
            'created_by' => User::first()->id,
            'updated_by' => User::first()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
