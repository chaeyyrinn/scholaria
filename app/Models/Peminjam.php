<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Buku;

class Peminjam extends Model
{
    protected $table = 'peminjams';
    protected $fillable = [
        'siswa_id',
        'buku_id',
        'jumlah',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'status_pengembalian'

    ];

  
public function siswa()
{
    return $this->belongsTo(User::class, 'siswa_id');
}

public function buku ()
{
    return $this->belongsTo(Buku::class, 'buku_id');
}

}