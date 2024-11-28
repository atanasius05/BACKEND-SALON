<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';

    protected $fillable = [
        'nama_pengguna',
        'email',
        'password',
        'foto_profil',
    ];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_pengguna');
    }

    public function riwayat()
    {
        return $this->hasOne(Riwayat::class, 'id_pengguna');
    }
}