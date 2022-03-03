<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use yajra\Datatables\Datatables;
class Pagos extends Model
{
    use HasFactory;
    protected $fillable = [
        'n_factura','ide','nombre','apellido','metodo_pago','tipo_pago','valor','fecha_inicio','fecha_fin','estado'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s' ,
        'updated_at' => 'datetime:Y-m-d H:i:s' ,
    ];
}
