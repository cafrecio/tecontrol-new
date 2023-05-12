@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            @livewire('clients-table')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Formulario de Cliente</h3>
                </div>
                <div class="card-body">
                    @livewire('edit-clients-form')
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Datos de contacto</h3>
                </div>
                <div class="card-body">
                    @livewire('clients-contacts-table')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admin.css') }}">
@endsection
