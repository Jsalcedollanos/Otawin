@extends('adminlte::page')

@section('Panel', 'BodyLife')

@section('content_header')
@livewireStyles
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/main.css" rel="stylesheet">
@stop

@section('content')
<livewire:cliente-table theme="bootstrap-4"/>

@stop

@livewireScripts

@section('css')

@stop

@section('js')

@stop