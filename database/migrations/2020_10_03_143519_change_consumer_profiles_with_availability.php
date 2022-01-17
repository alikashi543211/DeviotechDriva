<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeConsumerProfilesWithAvailability extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consumer_profiles', function (Blueprint $table) {
            $table->enum('available_status', [
                'available',
                'away'
            ])->default('available');
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
