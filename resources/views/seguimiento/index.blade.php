@extends('adminlte::page')

@section('Panel', 'BodyLife')

@section('content_header')
@livewireStyles
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('content')
<livewire:pago-table/>

@stop

@livewireScripts

@section('css')

@stop

@section('js')
<script src="{{ mix('js/app.js') }}" defer></script>
@stop