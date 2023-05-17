@extends('adminlte::page')
@livewireScripts
@livewireStyles

@section('title', 'Editar Cotización')

@section('content_header')
<h1>Editar Cotización</h1>
@stop

@section('content')
@livewire('admin.quotation.edit', ['quotation' => $quotation])
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('admin.css') }}">
@stop

@livewireScripts