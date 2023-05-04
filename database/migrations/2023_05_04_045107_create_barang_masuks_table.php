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
        Schema::create('barang_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('trx_no');
            $table->date('date_in');
            $table->longText('note')->nullable();
            $table->unsignedBigInteger('guidedriver_id');
            $table->double('total_qty', 14, 2);
            $table->double('grand_total', 14, 2);
            $table->timestamps();
            $table->foreign('guidedriver_id')->references('id')->on('guide_drivers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_masuks');
    }
};
