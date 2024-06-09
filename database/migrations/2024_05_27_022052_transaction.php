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
        Schema::create('transaction', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('statusPembayaran');
            $table->decimal('total', 10, 2);
            $table->string('tipePembayaran');
            $table->uuid('shippingId');
            $table->timestamps();

            // Adding foreign key constraint
            $table->foreign('shippingId')->references('uuid')->on('shipping')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
