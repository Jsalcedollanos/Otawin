@extends('adminlte::page')

@section('Seguimiento', 'BodyLife')

@section('content_header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css" integrity="sha512-l7qZAq1JcXdHei6h2z8h8sMe3NbMrmowhOl+QkP3UhifPpCW2MC4M0i26Y8wYpbz1xD9t61MLT9L1N773dzlOA==" crossorigin="anonymous" />


@livewireStyles
@stop

@section('content')
        <livewire:seguimiento-datatables
            searchable="nombre, ide, fecha_inicio"
            exportable
         />

@livewireScripts
@stop

@section('css')

@stop

@section('js')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@stop



