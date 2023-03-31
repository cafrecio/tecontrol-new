@extends('adminlte::page')
@livewireScripts
@livewireStyles

@section('title', 'Categorías')

@section('content')
    <div class="container">
        <h1>Categorías</h1>
        @livewire('categories-table')
    </div>
@endsection