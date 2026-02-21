<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use App\Models\Ulasan;
use app\Models\Koleksi;

class Buku extends Model
{
    protected $table = 'buku';

    protected $fillable = [
        'judul',
        'penulis',
        'tahun_terbit',
        'isbn',
        'cover',
        'stok',
        'sinopsis',
        'penerbit',
        'kategori_id',
        'status'
    ];

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function ulasan() {
        return $this->hasMany(Ulasan::class, 'buku_id');
    }

    public function koleksi() {
        return $this->hasMany(Koleksi::class);
    }

}
