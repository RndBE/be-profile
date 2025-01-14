<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriProjek extends Model
{
    use HasFactory;
    protected $table = 'kategori_projek';

    protected $guarded = [];

    public function projek()
    {
        return $this->hasMany(Projek::class, 'kategori_projek_id');
    }
}
