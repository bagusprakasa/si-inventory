<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBarangKeluar extends Model
{
    use HasFactory;
    
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'item_id');
    }
}
