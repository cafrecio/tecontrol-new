<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Clientes</h3>
            <div class="card-tools">
                <button wire:click="selectClient({{null}})" class="btn btn-success">Nuevo</button>
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
            <br>
            <div style="overflow-y: scroll; max-height: 700px;">
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
                                <td wire:click="selectClient({{ $client }})" style="cursor: pointer">
                                    {{ $client->razon_social }}</td>
                                <td>
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
</div>