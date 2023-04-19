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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('satuan_id');
            $table->unsignedBigInteger('kategori_id');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('satuan_id')->references('id')->on('satuans');
            $table->foreign('kategori_id')->references('id')->on('kategori_produks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
