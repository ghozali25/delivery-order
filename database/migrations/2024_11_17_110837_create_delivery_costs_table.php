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
        Schema::create('delivery_costs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_destination_area')->nullable(false);
            $table->unsignedBigInteger('id_vehicle_type')->nullable(false);
            $table->unsignedInteger('cost_first');
            $table->unsignedInteger('cost_second');

            $table->foreign('id_destination_area')->references('id')->on('destination_areas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_vehicle_type')->references('id')->on('vehicle_types')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_costs');
    }
};
