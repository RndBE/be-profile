<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriSpesifikasi extends Model
{
    use HasFactory;
    protected $table = 'kategori_spesifikasi';

    protected $guarded = [];

    public function spesifikasi()
    {
        return $this->hasMany(Spesifikasi::class, 'kategori_id');
    }

}
