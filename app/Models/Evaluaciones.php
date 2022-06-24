<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluaciones extends Model
{
    use HasFactory;

    protected $fillable = [
      'evaluacion',
      'id_producto'
    ];
}
