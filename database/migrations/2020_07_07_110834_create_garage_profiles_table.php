<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGarageProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garage_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->string('name');
            $table->string('user_contact')->comment = "Owner contact number";
            $table->string('contact_1')->nullable()->comment = "Garage contact number";
            $table->string('contact_2')->nullable()->comment = "Garage optional contact number";
            $table->string('website')->nullable();
            $table->string('registration_number')->nullable();
            $table->text('description')->nullable();
            $table->boolean('vat_registration')->default(0);
            $table->string('logo')->nullable();
            $table->string('verification_code')->nullable();
            $table->enum('status', [
                'pending',
                'approved',
                'in_revision',
                'suspended'
            ])->default('pending');
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
        Schema::dropIfExists('garage_profiles');
    }
}
