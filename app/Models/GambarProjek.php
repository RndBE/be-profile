<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GambarProjek extends Model
{
    use HasFactory;
    protected $table = 'gambar_projek';

    protected $guarded = [];

    public function projek()
    {
        return $this->belongsTo(Projek::class);
    }
}
