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
    Schema::create('staff_assignments', function (Blueprint $table) {
        $table->id();
        $table->foreignId('staff_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
        $table->text('items');
        $table->decimal('budget', 10, 2);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_assignments');
    }
};
