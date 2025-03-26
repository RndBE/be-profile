<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GambarArtikel extends Model
{
    use HasFactory;
    protected $table = 'gambar_artikel';

    protected $guarded = [];

    public function artikels()
    {
        return $this->belongsTo(Artikel::class);
    }
}
