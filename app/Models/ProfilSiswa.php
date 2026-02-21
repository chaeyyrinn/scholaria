<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilSiswa extends Model
{
    protected $table = 'profil';

    protected $fillable = [
        'user_id',
        'alamat',
        'nomor_telepon',
        'jenis_kelamin',
        'foto_profil',
    ];
}
