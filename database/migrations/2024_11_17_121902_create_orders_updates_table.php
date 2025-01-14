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
        Schema::create('orders_updates', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_order')->nullable(false);
            $table->dateTime('datetime_updated');
            $table->text('note');
            $table->unsignedInteger('cost')->nullable();

            $table->foreign('id_order')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_updates');
    }
};
