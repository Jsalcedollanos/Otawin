<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use yajra\Datatables\Datatables;


class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'id','ide','nombre','apellido','direccion','telefono','correo','created_at'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s' ,
        'updated_at' => 'datetime:Y-m-d H:i:s' 
    ];
}



