<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
Schema::create('messages', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('user_id'); // sender (user)
    $table->unsignedBigInteger('staff_id')->nullable(); // receiver (staff)
    $table->text('message');
    $table->text('reply')->nullable();
    $table->boolean('is_read')->default(false); // for staff
    $table->timestamps();

    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
});

