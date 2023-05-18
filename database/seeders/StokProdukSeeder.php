<?php

namespace Database\Seeders;

use App\Models\StokProduk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        StokProduk::truncate();
        $model = new StokProduk();
        $model->produk_id = 1;
        $model->stok = 0;
        $model->save();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
