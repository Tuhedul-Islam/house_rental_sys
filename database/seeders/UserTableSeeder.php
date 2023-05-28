<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $faker = Faker::create();

        $admin =  User::updateOrCreate(
            [
            'name' => $faker->name,
            'user_type' => 1,//Admin
            'user_name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone_no' => $faker->phoneNumber,
            'profile_img' => "frequently-changing/files/profile-img/profile-img.jpg",
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('12345678'),
            'language' => 'en',
            'status' => 1,
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ]
        );

       //$admin->assignRole('Admin');

        $howner =  User::updateOrCreate(
            [
                'name' => $faker->name,
                'user_type' => 2, //House Owner
                'user_name' => 'House owner',
                'email' => 'howner@gmail.com',
                'phone_no' => $faker->phoneNumber,
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('12345678'),
                'language' => 'en',
                'status' => 1,
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        $customer =  User::updateOrCreate(
            [
                'name' => $faker->name,
                'user_type' => 3, //Customer
                'user_name' => 'Customer',
                'email' => 'customer@gmail.com',
                'phone_no' => $faker->phoneNumber,
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('12345678'),
                'language' => 'en',
                'status' => 1,
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
