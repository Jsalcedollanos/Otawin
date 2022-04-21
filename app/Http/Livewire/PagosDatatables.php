<?php

namespace App\Http\Livewire;

use App\Models\Pagos;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Livewire\Component;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\LabelColumn;
class PagosDatatables extends LivewireDatatable
{
    public $model = Pagos::class;

    public function columns()
    {
        return [

            (new LabelColumn())
                ->content('Seguimiento'),

            NumberColumn::delete('id')
                ->label('ID'),

            NumberColumn::name('n_factura')
                ->label('NºFactura'),

            NumberColumn::name('ide')
                ->label('Ide')
                ->sortBy('ide'),
   
            Column::name('nombre')
                ->label('Nombre')
                ->editable(),
            
            Column::name('apellido')
                ->label('Apellido')
                ->editable(),

            Column::name('metodo_pago')
                ->label('Metodo Pago')
                ->editable(),

            Column::name('Tipo_pago')
                ->label('Tipo Pago')
                ->editable(),

            NumberColumn::name('valor')
                ->label('Valor')
                ->editable(),
   
            DateColumn::name('fecha_inicio')
                ->label('Fecha Ini'),

            DateColumn::name('fecha_fin')
                ->label('Fecha Fin'),
            
            
        ];
    }
}