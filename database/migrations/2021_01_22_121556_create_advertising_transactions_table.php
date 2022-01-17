<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisingTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertising_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('garage_profile_id');
            $table->unsignedBigInteger('garage_advertising_id');
            $table->foreign('garage_profile_id')->references('id')->on('garage_profiles')->onDelete('cascade');
            $table->foreign('garage_advertising_id')->references('id')->on('garage_advertisings')->onDelete('cascade');
            $table->string('payment_id');
            $table->float('amount');
            $table->string('status');
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
        Schema::dropIfExists('advertising_transactions');
    }
}
