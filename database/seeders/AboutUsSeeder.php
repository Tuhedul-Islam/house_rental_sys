<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use App\Models\Slider;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('about_us')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $faker = Faker::create();
        AboutUs::updateOrInsert([
            'about_img' => "frequently-changing/files/about-us-img/about-us.png",
            'title' => 'WE HAVE THE BEST HOUSES',
            'desc' => $faker->text,
            'created_by' => User::first()->id,
            'updated_by' => User::first()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'status' => 1
        ]);
    }
}
