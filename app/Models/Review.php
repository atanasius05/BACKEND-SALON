<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'review';
    protected $primaryKey = 'id_review';

    protected $fillable = [
        'id_barber',  // add id_barber to fillable attributes
        'rating',
        'komentar',
        'tanggal_review',
    ];

    public function barber()
    {
        return $this->belongsTo(Barber::class, 'id_barber');  // Assuming 'Barber' is the name of the model
    }
}
