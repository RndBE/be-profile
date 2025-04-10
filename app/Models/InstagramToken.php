<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InstagramToken extends Model
{
    use HasFactory;
    protected $table = 'instagram_token';

    protected $guarded = [];
}
