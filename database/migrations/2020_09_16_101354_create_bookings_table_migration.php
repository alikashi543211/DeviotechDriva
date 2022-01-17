<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTableMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consumer_vehicle_id');
            $table->unsignedBigInteger('consumer_profile_id');
            $table->unsignedBigInteger('garage_profile_id');
            $table->foreign('consumer_vehicle_id')->references('id')->on('consumer_vehicles')->onDelete('cascade');
             $table->foreign('consumer_profile_id')->references('id')->on('consumer_profiles')->onDelete('cascade');
            $table->foreign('garage_profile_id')->references('id')->on('garage_profiles')->onDelete('cascade');
            $table->text("description");
            $table->text("status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
