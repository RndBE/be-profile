<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeriPerangkat extends Model
{
    use HasFactory;
    protected $table = 'seri_perangkat';

    protected $guarded = [];

    public function dataProduk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

}
