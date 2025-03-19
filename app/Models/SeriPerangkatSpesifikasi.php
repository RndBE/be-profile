<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeriPerangkatSpesifikasi extends Model
{
    use HasFactory;
    protected $table = 'seri_perangkat_spesifikasi';

    protected $guarded = [];

    public function dataSpesifikasi()
    {
        return $this->belongsTo(Spesifikasi::class, 'spesifikasi_id');
    }

    public function dataSeriPerangkat()
    {
        return $this->belongsTo(SeriPerangkat::class, 'seri_perangkat_id');
    }

}
