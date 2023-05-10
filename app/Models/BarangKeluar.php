<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    /**
     * Get the guide_driver that owns the BarangMasuk
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guide_driver()
    {
        return $this->belongsTo(GuideDriver::class, 'guidedriver_id');
    }
}
