<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::create('donations', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email');
        $table->string('national_id');
        $table->string('nationality');
        $table->unsignedBigInteger('event_id'); // Link to event
        $table->decimal('amount', 10, 2);
        $table->timestamps();

        $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
