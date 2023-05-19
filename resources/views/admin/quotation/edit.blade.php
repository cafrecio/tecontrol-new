@extends('adminlte::page')

@section('title', 'Editar Cotización')

@section('content_header')
<h1>&nbsp;Editar Cotización</h1>
@endsection

@section('content')
@livewire('admin.quotation.edit', ['quotation' => $quotation])
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('admin.css') }}">
@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    Livewire.on('deleteDet', detalle_id =>{
            Swal.fire({
                title: 'Está seguro que desea eliminar este Producto?',
                text: "No se puede revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Si. Eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteDetalle', detalle_id);
                    Swal.fire(
                    'Eliminado!',
                    'El producto ha sido eliminado.',
                    'success'
                    )
                }
            })  
        });
    
        Livewire.on('guardado', () =>{
            Swal.fire(
                'Cambios Guardados!',
                'La cotización ha sido actualizada.',
                'success'
            )
        });
        
</script>
@endsection