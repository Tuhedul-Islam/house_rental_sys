<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('user_type')->nullable()->comment('1=>Admin, 2=>House Owner, 3=>Customer');
            $table->string('user_name');
            $table->string('email')->unique();
            $table->string('phone_no')->unique();
            $table->string('profile_img');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('language');
            $table->tinyInteger('status')->default(1)->comment("1=>Active, 2=>Inactive");
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
