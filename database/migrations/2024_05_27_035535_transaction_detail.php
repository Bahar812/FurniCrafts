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
        Schema::create('detail_transaction', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->uuid('productId');
            $table->uuid('transaksiId');
            $table->integer('qty');
            $table->decimal('subTotal', 10, 2);
            $table->timestamps();

            // Adding foreign key constraints
            $table->foreign('productId')->references('ItemId')->on('product')->onDelete('cascade');
            $table->foreign('transaksiId')->references('uuid')->on('transaction')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaction');
    }
};
