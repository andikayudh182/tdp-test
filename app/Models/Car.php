<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = 'car';

    protected $fillable = [
        'nomor_plat',
        'merek',
        'model',
        'tarif_harian',
        'status_sewa',
    ];


}
