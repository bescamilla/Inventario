<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        'sku',
        'nombre',
        'id_categoria',
        'descripcion',
        'precio',
        'cantidad',
        'estado',
        'eliminado'
    ];

    public function categoria(){
        return $this->hasOne(categorias::class, 'id', 'id_categoria');
    }

    public function evaluaciones(){
        return $this->hasMany(evaluaciones::class, 'id_producto', 'id');
    }

}
