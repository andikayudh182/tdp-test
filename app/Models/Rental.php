<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $table = 'rental';

    protected $fillable = [
        'car_id',
        'user_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'tanggal_pengembalian',
        'total_pembaytaran',
    ];
}
