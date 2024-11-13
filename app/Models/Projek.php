<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Projek extends Model
{
    use HasFactory;
    protected $table = 'projek';

    protected $guarded = [];

    public function klien()
    {
        return $this->belongsTo(Klien::class);
    }

    public function kategoriProjek()
    {
        return $this->belongsTo(KategoriProjek::class);
    }

    public function gambar()
    {
        return $this->hasMany(GambarProjek::class);
    }
}
