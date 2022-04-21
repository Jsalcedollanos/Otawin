<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    use HasFactory;
    protected $fillable = [
        'n_factura','ide','nombre','apellido','dia','estado','fecha_inicio','fecha_fin'
    ];
}
