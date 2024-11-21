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
        Schema::create('outcomings', function (Blueprint $table) {
            $table->id();
            $table->integer('id_product')->nullable();
            $table->integer('creator_id')->nullable();
            $table->integer('updater_id')->nullable();
            $table->string('quantity')->nullable();
            $table->string('unit')->nullable();
            $table->string('kode')->nullable();
            $table->string('bagian')->nullable();
            $table->string('no_spk')->nullable();
            $table->datetime('purchase_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outcomings');
    }
};
