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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->datetime('start')->nullable();
            $table->datetime('end')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('artist_id')->nullable();
            $table->integer('service_id')->nullable();
            $table->string('description')->nullable();
            $table->integer('on_odeme')->nullable();
            $table->integer('toplam_odeme')->nullable();
            $table->string('dovme_modeli')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
