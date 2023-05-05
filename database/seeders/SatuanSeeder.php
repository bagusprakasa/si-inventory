<?php

namespace Database\Seeders;

use App\Models\Satuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Satuan::truncate();
        $satuan = new Satuan();
        $satuan->name = 'Dus';
        $satuan->save();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
