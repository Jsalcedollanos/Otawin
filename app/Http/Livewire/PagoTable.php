<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Pagos;

class PagoTable extends DataTableComponent
{
    protected $model = Pagos::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("N factura", "n_factura")
                ->sortable(),
            Column::make("Ide", "ide")
                ->searchable()
                ->sortable(),
            Column::make("Nombre", "nombre")
                ->searchable()
                ->sortable(),
            Column::make("Apellido", "apellido")
                ->sortable(),
            Column::make("Metodo pago", "metodo_pago")
                ->sortable(),
            Column::make("Tipo pago", "tipo_pago")
                ->sortable(),
            Column::make("Valor", "valor")
                ->sortable(),
            Column::make("Fecha inicio", "fecha_inicio")
                ->searchable()
                ->sortable(),
            Column::make("Fecha fin", "fecha_fin")
                
                ->sortable(),
            Column::make("Estado", "estado")
                ->sortable(),
            /* Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(), */
        ];
    }
}
