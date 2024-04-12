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
        Schema::create('satis', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id')->nullable();
            $table->string('toplam_satis_tutari')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('order_date')->nullable();
            $table->string('order_month')->nullable();
            $table->string('order_year')->nullable();
            $table->enum('payment_type', ['nakit', 'kredi kartı', 'havale'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('satis');
    }
};
