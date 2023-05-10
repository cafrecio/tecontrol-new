<div>
    <form wire:submit.prevent="saveClient">
        <div class="form-group">
            <label for="razon-social">Razón Social</label>
            <input type="text" wire:model="client.razon_social" class="form-control" id="razon-social">
        </div>
        <div class="form-group">
            <label for="tipo-cliente">Tipo de Cliente</label>
            <select wire:model="client.tipo_cliente" class="form-control" id="tipo-cliente">
                <option value="">Seleccione un estado</option>
                <option value="PENDIENTE">PENDIENTE</option>
                <option value="CONFIRMADO">CONFIRMADO</option>
            </select>
        </div>
        <div class="form-group">
            <label for="cuit">CUIT</label>
            <input type="text" wire:model="client.cuit" class="form-control" id="cuit">
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" wire:model="client.direccion" class="form-control" id="direccion">
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" wire:model="client.telefono" class="form-control" id="telefono">
        </div>
        <div class="form-group">
            <label for="condicion">Condición</label>
            <input type="text" wire:model="client.condicion" class="form-control" id="condicion">
        </div>
        <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <textarea wire:model="client.observaciones" class="form-control" id="observaciones"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
