@extends('adminlte::page')

@section('title', 'Cotizaciones')

@section('content_header')
<h1>Cotizaciones</h1>
@stop

@section('content')
@livewire('admin.quotation.index')
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('admin.css') }}">
@stop

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    Livewire.on('deleteCot', cotizacion_id =>{
            Swal.fire({
                title: 'Está seguro que desea eliminar esta Cotizacion?',
                text: "No se puede revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Si. Eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteCotizacion', cotizacion_id);
                    Swal.fire(
                    'Eliminada!',
                    'La cotizacion ha sido eliminada.',
                    'success'
                    )
                }
            })  
        });
    
</script>
@endsection