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
        Schema::create('assets', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('name');
            $table->foreignId('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreignId('location_id');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreignId('condition_id');
            $table->foreign('condition_id')->references('id')->on('conditions')->onDelete('cascade');
            $table->text('notes');
            $table->foreignId('manufacture_id');
            $table->foreign('manufacture_id')->references('id')->on('manufacturers')->onDelete('cascade');
            $table->foreignId('model_id');
            $table->foreign('model_id')->references('id')->on('models')->onDelete('cascade');
            $table->string('serial');
            $table->date('date');
            $table->integer('warranty_months');
            $table->decimal('price', 10, 2);
            $table->foreignId('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
