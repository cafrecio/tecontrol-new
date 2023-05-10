<div>
    <div class="form-group">
        <input type="text" wire:model.debounce.300ms="searchClient" class="form-control" placeholder="Buscar cliente">
    </div>
   
    <div class="form-group">
        <select wire:model="clientStatus" class="form-control">
            <option value="">Seleccione un estado</option>
            <option value="PENDIENTE">PENDIENTE</option>
            <option value="CONFIRMADO">CONFIRMADO</option>
        </select>
    </div>
    <br>
    <div style="overflow-y: scroll; max-height: 700px;">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Clientes</th>
                </tr>
            </thead>
        <tbody>
            @foreach($clients as $client)
                <tr wire:click="selectClient({{$client}})" style="cursor: pointer">
                    <td>{{$client->razon_social}}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>