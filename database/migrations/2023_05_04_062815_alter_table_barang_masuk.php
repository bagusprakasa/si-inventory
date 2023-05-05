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
        Schema::table('barang_masuks', function (Blueprint $table) {
            $table->unsignedBigInteger('guidedriver_id')->nullable()->change();
            $table->unsignedBigInteger('vendor_id')->nullable()->after('guidedriver_id');
            $table->foreign('vendor_id')->references('id')->on('vendors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barang_masuks', function (Blueprint $table) {
            $table->dropForeign('barang_masuks_vendor_id_foreign');
            $table->dropColumn('vendor_id');
            $table->unsignedBigInteger('guidedriver_id')->change();
        });
    }
};
