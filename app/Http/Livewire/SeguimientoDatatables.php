<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Seguimiento;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\LabelColumn;
class SeguimientoDatatables extends LivewireDatatable
{
    public $model = Seguimiento::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')
            ->label('ID'),

            NumberColumn::name('n_factura')
                ->label('NºFactura'),

            NumberColumn::name('ide')
                ->label('Ide')
                ->sortBy('ide'),

            Column::name('nombre')
                ->label('Nombre')
                ->searchable(),
                
            
            Column::name('apellido')
                ->label('Apellido'),
                

            Column::name('dia')
                ->label('Dia')
                ->editable(),

            Column::name('fecha_inicio')
                ->label('Fecha Inicio'),
                

            Column::name('fecha_fin')
                ->label('Fecha Fin'),
                

            Column::name('estado')
                ->label('Estado'),


            Column::delete()
                ->label('Eliminar')
                ->alignCenter(),

            (new LabelColumn())
            ->label('Ver')
            ,
        ];
    }
}