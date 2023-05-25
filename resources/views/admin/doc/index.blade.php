@extends('adminlte::page')

@section('title', 'Documentos')

@section('content_header')
<h1>&nbsp;Documentos</h1>
@stop

@section('content')
@livewire('admin.doc.index')
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('admin.css') }}">
@stop

@section('js')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@stop