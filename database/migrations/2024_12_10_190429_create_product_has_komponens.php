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
        Schema::create('product_has_komponens', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_product')->nullable();
            $table->bigInteger('id_komponen')->nullable();
            $table->integer('kuantitas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_has_komponens');
    }
};
