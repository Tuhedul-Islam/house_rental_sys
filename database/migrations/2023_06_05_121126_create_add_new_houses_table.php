<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddNewHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_new_houses', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('house_type')->nullable();
            $table->string('location')->nullable();
            $table->decimal('price', 8,2)->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('no_of_rooms')->nullable();
            $table->tinyInteger('no_of_belcony')->nullable();
            $table->decimal('service_charge', 8,2)->nullable();
            $table->tinyInteger('gas_available')->nullable();
            $table->tinyInteger('current_bill')->nullable();
            $table->tinyInteger('generator')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('booked_status')->default(0)->comment("1=>booked, 0=>not booked");
            $table->smallInteger('booked_by')->nullable();
            $table->smallInteger('created_by')->nullable();
            $table->smallInteger('updated_by')->nullable();
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
        Schema::dropIfExists('add_new_houses');
    }
}
