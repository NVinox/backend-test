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
        Schema::create('devices', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('name');
            $table->integer('memory_volume', false, true);
            $table->integer('ram_volume', false, true);
            $table->integer('battery_volume', false, true);
            $table->integer('core_counts', false, true)->default(2);
            $table->float('core_frequency')->default(2.75);
            $table->integer('display_width', false, true);
            $table->integer('display_height', false, true);
            $table->boolean('nfc')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
