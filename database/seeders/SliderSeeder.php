<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Slider;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('sliders')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $faker = Faker::create();
        foreach(range(1,3) as $i) {
            Slider::updateOrInsert([
                'slider_img' => "frequently-changing/files/slider-img/slider_$i.jpeg",
                'text_content' => 'Explore the Houses',
                'created_by' => User::first()->id,
                'updated_by' => User::first()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'status' => 1
            ]);
        }
    }
}
