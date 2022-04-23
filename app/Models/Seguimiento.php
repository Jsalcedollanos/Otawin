<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use yajra\Datatables\Datatables;
class Seguimiento extends Model
{
    use HasFactory;
    protected $fillable = [
        'n_factura','ide','nombre','apellido','dia','fecha_inicio','fecha_fin'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s' ,
        'updated_at' => 'datetime:Y-m-d H:i:s' ,
    ];
}
