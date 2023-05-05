<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('modules')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $faker = Faker::create();
        foreach(range(1,10) as $i) {
            Module::updateOrInsert([
                'name' => 'Module '.$faker->name,
                'uuid' => Str::uuid()->toString(),
                'created_by' => User::first()->id,
                'updated_by' => User::first()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'status' => 1
            ]);
        }
    }
}
