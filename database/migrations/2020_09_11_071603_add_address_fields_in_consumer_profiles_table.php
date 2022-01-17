<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressFieldsInConsumerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consumer_profiles', function (Blueprint $table) {
          $table->string("address")->after("display_name")->nullable();
          $table->string("address_lat")->after("address")->nullable();
          $table->string("address_long")->after("address_lat")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consumer_profiles', function (Blueprint $table) {
            //
        });
    }
}
