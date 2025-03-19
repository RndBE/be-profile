<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spesifikasi extends Model
{
    use HasFactory;
    protected $table = 'spesifikasi';

    protected $guarded = [];

    public function dataKategoriSpesifikasi()
    {
        return $this->belongsTo(KategoriSpesifikasi::class, 'kategori_id');
    }

}
