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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_client')->nullable(true);
            $table->unsignedBigInteger('id_employee')->nullable(true);
            $table->unsignedBigInteger('id_driver')->nullable(true);
            $table->unsignedBigInteger('id_vehicle')->nullable(true);
            $table->text('cargo_name')->nullable();
            $table->decimal('cargo_weight_kg', 9, 5)->nullable();
            $table->text('cargo_note')->nullable();
            $table->string('recipient_name')->nullable();
            $table->string('recipient_phone')->nullable();
            $table->string('recipient_address')->nullable();
            $table->unsignedBigInteger('id_destination_area')->nullable(true);
            $table->unsignedInteger('cost')->nullable();
            $table->dateTime('datetime_ordered');
            $table->dateTime('datetime_confirmed')->nullable();
            $table->dateTime('datetime_assigned')->nullable();
            $table->dateTime('datetime_closed')->nullable();

            $table->foreign('id_client')->references('id')->on('clients')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('id_employee')->references('id')->on('employees')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('id_driver')->references('id')->on('drivers')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('id_vehicle')->references('id')->on('vehicles')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('id_destination_area')->references('id')->on('destination_areas')->onUpdate('cascade')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
