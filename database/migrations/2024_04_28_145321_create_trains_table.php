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
        // COLUMNS:
        // company
        // departure_station
        // arrival_station
        // departure_time
        // arrival_time
        // train_code
        // number_of_carriages
        // on_time
        // cancelled

        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('company')->nullable();
            $table->string('departure_station');
            $table->string('arrival_station');
            $table->time('departure_time')->nullable();
            $table->time('arrival_time')->nullable();
            $table->string('train_code');
            $table->unsignedInteger('number_of_carriages')->nullable();
            $table->boolean('on_time')->nullable();
            $table->boolean('cancelled')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trains');
    }
};
