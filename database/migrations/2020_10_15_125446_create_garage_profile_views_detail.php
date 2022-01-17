<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGarageProfileViewsDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garage_profile_views', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('garage_profile_id');
            $table->foreign('garage_profile_id')->references('id')->on('garage_profiles')->onDelete('cascade');
            $table->integer("no_of_views");
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
        Schema::dropIfExists('garage_profile_views');
    }
}
