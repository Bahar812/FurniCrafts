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
        Schema::create('product', function (Blueprint $table) {
            $table->string('Nama_Product', 255);
            $table->decimal('Price', 10, 2);
            $table->uuid('ItemId')->primary();
            $table->string('Img_Detail_1', 255)->nullable();
            $table->string('Img_Detail_2', 255)->nullable();
            $table->string('Img_Detail_3', 255)->nullable();
            $table->text('Description');
            $table->integer('Stock');
            $table->bigInteger('CategoryID')->unsigned();
            $table->foreign('CategoryID')->references('id')->on('category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
