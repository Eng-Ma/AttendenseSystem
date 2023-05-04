<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('time_dates', function (Blueprint $table) {
            $table->id();
            $table->date('date')->default(Carbon::now()->toDateString()); // default value is current date
            $table->foreignId('time_id')->references('id')->on('times')->onDelete('CASCADE');
            $table->integer('is_holiday')->default(0); // 0 => not holiday, 1 => is holiday
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_dates');
    }
};
