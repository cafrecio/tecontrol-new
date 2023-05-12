<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Proveedores</h3>
            <div class="card-tools">
                <button wire:click="selectSupplier({{null}})" class="btn btn-success btn-sm">Nuevo</button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <input type="text" wire:model.defer="searchSupplier" class="form-control" placeholder="Buscar proveedor">
            </div>

            <div style="overflow-y: scroll; max-height:calc(100vh - 250px);">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Proveedores</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $supplier)
                        <tr>
                            <td wire:click="selectSupplier({{ $supplier }})"
                                style="cursor: pointer; padding: 4px 4px 4px 10px;">
                                {{ $supplier->razon_social }}</td>
                            <td style="padding: 4px">
                                <button wire:click="delete({{ $supplier->id }})"
                                    onclick="return confirm('¿Está seguro de que desea eliminar este proveedor?')"
                                    class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div wire:loading>
        <div class="modload">
            <div class="spinload">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
        </div>
    </div>
</div>