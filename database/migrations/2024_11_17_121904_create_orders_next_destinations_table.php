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
        Schema::create('orders_next_destinations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_order')->nullable(false);
            $table->unsignedBigInteger('id_destination_area')->nullable(false);
            $table->unsignedInteger('cost')->nullable();

            $table->foreign('id_order')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_destination_area')->references('id')->on('destination_areas')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_next_destinations');
    }
};
