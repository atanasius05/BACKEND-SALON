<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';

    protected $fillable = [
        'id_layanan',
        'id_pengguna',
        'id_barber',
        'tanggal_pemesanan',
    ];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'id_layanan');
    }

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }

    public function barber()
    {
        return $this->belongsTo(Barber::class, 'id_barber');
    }

    public function review()
    {
        return $this->hasOne(Review::class, 'id_pemesanan');
    }
}