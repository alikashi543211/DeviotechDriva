<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeGarageProfilesTableAddVatNumberColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('garage_profiles', function (Blueprint $table) {
            $table->string("vat_no")->after("registration_number")->nullable();
            $table->dropColumn('vat_registration');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('garage_profiles', function (Blueprint $table) {
            //
        });
    }
}
