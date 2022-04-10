<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Cliente;

class ClienteTable extends DataTableComponent
{
    protected $model = Cliente::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        /* $this->setSearch('Laravel'); */
        $this->setQueryStringEnabled();
        $this->setEmptyMessage('Botilyn: Ups! No se encontraron resultados, porfavor revisa.');
        
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->collapseOnMobile()
                ->excludeFromColumnSelect()
                ->sortable(),                
            Column::make("Ide", "ide")
                ->sortable()
                ->searchable(),
            Column::make("Nombre", "nombre")
                ->sortable()
                ->searchable(),
            Column::make("Apellido", "apellido")
                ->sortable(),
            Column::make("Direccion", "direccion")
                ->sortable(),
            Column::make("Telefono", "telefono")
                ->sortable(),
            Column::make("Correo", "correo")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable()
                ->searchable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
    
}
