<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTheBookingsTableWithNewFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
             $table->string("inspection_mileag");
             $table->string("inspection_quotation");
             $table->text("inspection_description");
             $table->string("inspection_file");
             $table->text("progress_description");
             $table->string("progress_file");
             $table->string("extension_date");
             $table->text("extension_description");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            //
        });
    }
}
