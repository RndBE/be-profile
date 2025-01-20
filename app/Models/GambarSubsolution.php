<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GambarSubsolution extends Model
{
    use HasFactory;
    protected $table = 'gambar_subsolution';

    protected $guarded = [];

    public function subSolution()
    {
        return $this->belongsTo(SubSolutions::class);
    }
}
