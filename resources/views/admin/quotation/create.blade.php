@extends('adminlte::page')
@livewireScripts
@livewireStyles

@section('title', 'Cotizaciones')

@section('content_header')
<h1>Cotizaciones</h1>
@stop

@section('content')
@livewire('admin.quotation.create')
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('admin.css') }}">
@stop

@livewireScripts