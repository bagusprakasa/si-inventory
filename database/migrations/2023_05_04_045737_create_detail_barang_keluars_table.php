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
        Schema::create('detail_barang_keluars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_keluar_id');
            $table->unsignedBigInteger('produk_id');
            $table->double('qty', 14, 2);
            $table->double('subtotal', 14, 2);
            $table->timestamps();
            $table->foreign('produk_id')->references('id')->on('produks');
            $table->foreign('barang_keluar_id')->references('id')->on('barang_keluars');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_barang_keluars');
    }
};
