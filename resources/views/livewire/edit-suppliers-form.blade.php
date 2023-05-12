<div>
    <div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Formulario de Proveedor</h3>
                <div class="card-tools">
                    <button wire:click="saveSupplier" class="btn btn-primary btn-sm">Guardar</button>
                </div>
            </div>
            <div class="card-body">
                <form >
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="razon-social">Razón Social</label>
                                <input type="text" wire:model="supplier.razon_social" class="form-control" id="razon-social">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nac_imp_id">Origen</label>
                                <select wire:model="supplier.nac_imp_id" class="form-control" id="nac_imp_id">
                                    <option value="">Seleccione un estado</option>
                                    <option value="1">NACIONAL</option>
                                    <option value="2">IMPORTADO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="rurbo">Rubro</label>
                                <input type="text" wire:model="supplier.rubro" class="form-control" id="rubro">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" wire:model="supplier.telefono" class="form-control" id="telefono">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" wire:model="supplier.direccion" class="form-control" id="direccion">
                    </div>
    
                    <div class="form-group">
                        <label for="condicion">Condición</label>
                        <input type="text" wire:model="supplier.condicion" class="form-control" id="condicion">
                    </div>
                    <div class="form-group">
                        <label for="observaciones">Observaciones</label>
                        <textarea wire:model="supplier.observaciones" class="form-control" id="observaciones"></textarea>
                    </div>
    
                </form>
            </div>
        </div>
    </div>
</div>
