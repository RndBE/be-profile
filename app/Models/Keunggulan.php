<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keunggulan extends Model
{
    use HasFactory;
    protected $table = 'keunggulan';

    protected $guarded = [];

    public function dataProduk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

}
