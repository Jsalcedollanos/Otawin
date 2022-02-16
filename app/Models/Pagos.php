<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use yajra\Datatables\Datatables;
class Pagos extends Model
{
    use HasFactory;
    protected $fillable = [
        'n_factura','ide','nombre','apellido','metodo_pago','tipo_pago','valor','fecha_fin','estado'
    ];
}
