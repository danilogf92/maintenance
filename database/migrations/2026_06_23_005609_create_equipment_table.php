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
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();

            $table->string('serial_number');
            $table->date('purchase_date');
            $table->date('warranty_until')->nullable();
            $table->date('last_calibration')->nullable();
            $table->string('photo')->nullable();

            $table->foreignId('model_id')
                ->constrained('device_models')
                ->cascadeOnDelete();

            // $table->foreignId('customer_id')
            //     ->nullable()
            //     ->constrained()
            //     ->nullOnDelete();

            // $table->foreignId('manual_id')
            //     ->nullable()
            //     ->constrained()
            //     ->nullOnDelete();

            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('manual_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment');
    }
};
