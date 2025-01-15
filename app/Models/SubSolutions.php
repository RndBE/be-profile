<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubSolutions extends Model
{
    use HasFactory;
    protected $table = 'sub_solution';

    protected $guarded = [];

    public function Solution()
    {
        return $this->belongsTo(Solutions::class, 'solution_id');
    }

    public function fiturSubSolutions()
    {
        return $this->hasMany(FiturSubSolutions::class, 'sub_solution_id');
    }

    public function gambar()
    {
        return $this->hasMany(GambarSubsolution::class, 'subsolution_id');
    }

}
