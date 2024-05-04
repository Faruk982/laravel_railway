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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->integer('price');
            $table->string('bogi');
            $table->string('seat');
            $table->string('nid');
            $table->string('train_name');
            $table->string('class');
            $table->string('departure_station');
            $table->string('arrival_station');
            $table->time('departure_time');
            $table->date('departure_date');
            $table->timestamp('booking_timestamp')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
