<?php

namespace Database\Seeders;

use App\Models\KategoriProduk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        KategoriProduk::truncate();
        $category = new KategoriProduk();
        $category->name = 'Air Mineral';
        $category->save();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
