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
        Schema::create('reservate', function (Blueprint $table) {
            $table->Increments('reservate_id');
            $table->string('reservate_name');
            $table->string('reservate_address');
            $table->string('reservate_phone');
            $table->string('reservate_email');
            $table->string('reservate_method');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservate');
    }
};
