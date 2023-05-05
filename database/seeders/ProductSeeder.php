<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Produk::truncate();
        $product = new Produk();
        $product->satuan_id = 1;
        $product->kategori_id = 1;
        $product->name = 'Crystalin 600ml';
        $product->save();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
