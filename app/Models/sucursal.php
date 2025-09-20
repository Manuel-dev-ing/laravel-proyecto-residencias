<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sucursal extends Model
{
    
    use HasFactory;

    protected $table = 'sucursales';

    protected $fillable = [
        'id',
        'name',
        'phone_number',
        'number',
        'street',
        'neighborhood',
        'city',
        'status'
    ];

}
