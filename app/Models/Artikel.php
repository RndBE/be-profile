<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'detail_artikel';

    protected $guarded = [];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'sub_solution_id', 'id');
    }

    public function kategoriTopik()
    {
        return $this->belongsTo(KategoriTopik::class, 'kategori_topik_id');
    }

    public function gambar()
    {
        return $this->hasMany(GambarArtikel::class, 'artikel_id');
    }

}
