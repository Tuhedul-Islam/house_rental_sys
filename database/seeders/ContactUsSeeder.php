<?php

namespace Database\Seeders;

use App\Models\ContactUs;
use App\Models\Slider;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('contact_us')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $faker = Faker::create();
        foreach(range(1,10) as $i) {
            ContactUs::updateOrInsert([
                'name' => $faker->name,
                'email' => $faker->email,
                'subject' => $faker->sentence(5),
                'message' => $faker->text,
                'seen_status' => 2,
                'created_by' => User::first()->id,
                'updated_by' => User::first()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
