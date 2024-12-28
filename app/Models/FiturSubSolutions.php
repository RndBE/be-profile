<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FiturSubSolutions extends Model
{
    use HasFactory;
    protected $table = 'fitur_sub_solution';

    protected $guarded = [];

    public function subSolution()
    {
        return $this->belongsTo(SubSolutions::class);
    }

}
