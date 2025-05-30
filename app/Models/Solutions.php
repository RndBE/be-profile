<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Solutions extends Model
{
    use HasFactory;
    protected $table = 'solution';

    protected $guarded = [];

    public function subSolutions()
    {
        return $this->hasMany(SubSolutions::class, 'solution_id');
    }


}
