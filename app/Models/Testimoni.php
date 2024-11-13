<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimoni extends Model
{
    use HasFactory;
    protected $table = 'testimoni';

    protected $guarded = [];

    public function projek()
    {
        return $this->belongsTo(Projek::class);
    }
}
