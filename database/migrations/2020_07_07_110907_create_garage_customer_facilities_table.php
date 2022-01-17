<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGarageCustomerFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garage_customer_facilities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('garage_profile_id');
            $table->foreign('garage_profile_id')->references('id')->on('garage_profiles')->onDelete('cascade');
            $table->bigInteger('customer_facility_id');
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
        Schema::dropIfExists('garage_customer_facilities');
    }
}
