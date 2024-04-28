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

        // travel_date
        // train_type
        // ticket_price
        // reduced_ticket_price
        // available_seats
        // additional_information

        Schema::table('trains', function (Blueprint $table) {
            $table->date('travel_date')->after('id');
            $table->string('train_type', 50)->after('travel_date')->nullable();
            $table->decimal('ticket_price')->after('cancelled')->nullable();
            $table->decimal('reduced_ticket_price')->after('ticket_price')->nullable();
            $table->unsignedInteger('available_seats')->after('reduced_ticket_price')->nullable();
            $table->text('additional_information')->after('available_seats')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trains', function (Blueprint $table) {
            $table->dropColumn(['travel_date', 'train_type', 'ticket_price', 'reduced_ticket_price', 'available_seats', 'additional_information']);
        });
    }
};
