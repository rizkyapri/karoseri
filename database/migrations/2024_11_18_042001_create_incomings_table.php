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
        Schema::create('incomings', function (Blueprint $table) {
            $table->id();
            $table->integer('id_product')->nullable();
            $table->integer('id_supplier')->nullable();
            $table->integer('creator_id')->nullable();
            $table->integer('updater_id')->nullable();
            $table->string('kode_penerimaan')->unique()->nullable();
            $table->integer('kuantitas')->nullable();
            $table->string('unit')->nullable();
            $table->string('keterangan')->nullable();
            $table->datetime('start_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomings');
    }
};
