<?php

namespace Database\Seeders;

use App\Models\EmailSetting;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('email_settings')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $faker = Faker::create();

        EmailSetting::updateOrInsert([
            'mail_driver' => 'smtp',
            'mail_host' => 'mail.demo.com',
            'mail_port' => 465,
            'mail_encryption' => 'ssl',
            'mail_username' => 'sales@demo.com',
            'mail_password' => '%a@x;F908S+M',
            'mail_from' => 'info@simec.co',
            'mail_fromname' => 'Model Farma',
            'created_by' => User::first()->id,
            'updated_by' => User::first()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
