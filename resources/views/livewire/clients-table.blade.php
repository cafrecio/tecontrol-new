<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Clientes</h3>
            <div class="card-tools">
                <button wire:click="selectClient({{null}})" class="btn btn-success btn-sm">Nuevo</button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <input type="text" wire:model.defer="searchClient" class="form-control" placeholder="Buscar cliente">
            </div>

            <div class="form-group">
                <select wire:model="clientStatus" class="form-control">
                    <option value="">Seleccione un estado</option>
                    <option value="1">PENDIENTE</option>
                    <option value="2">CONFIRMADO</option>
                </select>
            </div>

            <div style="overflow-y: scroll; max-height:calc(100vh - 304px);">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Clientes</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                        <tr>
                            <td wire:click="selectClient({{ $client }})"
                                style="cursor: pointer; padding: 4px 4px 4px 10px;">
                                {{ $client->razon_social }}</td>
                            <td style="padding: 4px">
                                <button wire:click="delete({{ $client->id }})"
                                    onclick="return confirm('¿Está seguro de que desea eliminar este cliente?')"
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