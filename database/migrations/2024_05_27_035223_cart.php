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
        Schema::create('cart', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->date('tanggal');
            $table->time('waktu');
            $table->decimal('total', 10, 2);
            $table->uuid('userId');
            $table->timestamps();

            // Adding foreign key constraint
            $table->foreign('userId')->references('uuid')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
