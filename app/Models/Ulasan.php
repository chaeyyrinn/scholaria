<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $table = 'ulasans';

    protected $fillable = [
        'buku_id',
        'ulasan',
        'rating'
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }

}
