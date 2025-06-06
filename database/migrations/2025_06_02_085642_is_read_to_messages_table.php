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
        schema::table('messages',function(Blueprint $table){
            $table->boolean('is_read')->dafault(false);
        });
    }
    public function down()
    {
        schema::table('messages',function(Blueprint $table){
            $table->dropColumn('is_read');
        });
    }
};

