<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'id_categoria',
        'descripcion',
        'precio',
        'cantidad',
        'estado'
    ];
}
