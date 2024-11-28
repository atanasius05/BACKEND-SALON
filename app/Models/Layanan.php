<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan';
    protected $primaryKey = 'id_layanan';

    protected $fillable = [
        'jenis_layanan',
        'harga',
        'deskripsi',
        'durasi',
    ];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_layanan');
    }
}