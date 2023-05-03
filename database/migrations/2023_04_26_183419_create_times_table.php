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
        Schema::create('times', function (Blueprint $table) {
            $table->id();
            $table->integer('day'); // it could be created as a date or string column 
            //but to make it easier I casted it to integer with Saturday value is 0.
            $table->time('start_time');
            $table->float('duration')->default(60); // duration of time interval in minutes, default is 1 hour = 60 minutes
            $table->foreignId('section_id')->references('id')->on('sections')->onDelete('CASCADE');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('times');
    }
};
