<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeriPerangkat extends Model
{
    use HasFactory;
    protected $table = 'seri_perangkat';

    protected $guarded = [];

    public function spesifikasi()
    {
        return $this->hasMany(SeriPerangkatSpesifikasi::class, 'seri_perangkat_id')
                    ->with('dataSpesifikasi.dataKategoriSpesifikasi');
    }

}
