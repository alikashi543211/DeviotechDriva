<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumerVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumer_vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consumer_profile_id');
            $table->foreign('consumer_profile_id')->references('id')->on('consumer_profiles')->onDelete('cascade');
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('engine_size')->nullable();
            $table->string('body_type')->nullable();
            $table->string('image_url')->nullable();
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
        Schema::dropIfExists('consumer_vehicles');
    }
}
