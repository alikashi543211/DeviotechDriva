<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('enquiry_type_id');
            $table->string('ticket_id')->unique();
            $table->string('subject');
            $table->enum('priority', ['high', 'medium', 'low'])->default('medium');
            $table->text('description');
            $table->enum('status', ['open', 'closed'])->default('open');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('enquiry_type_id')->references('id')->on('enquiry_types')->onDelete('cascade');
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
        Schema::dropIfExists('tickets');
    }
}
