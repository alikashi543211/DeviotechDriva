<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavedGaragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saved_garages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consumer_profile_id');
            $table->unsignedBigInteger('garage_profile_id');
            $table->foreign('consumer_profile_id')->references('id')->on('consumer_profiles')->onDelete('cascade');
            $table->foreign('garage_profile_id')->references('id')->on('consumer_profiles')->onDelete('cascade');
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
        Schema::dropIfExists('saved_garages');
    }
}
