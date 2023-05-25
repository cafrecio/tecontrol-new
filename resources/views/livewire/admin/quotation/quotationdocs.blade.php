<div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>Nro</th>
                    <th>Fecha</th>
                    <th>Monto</th>
                    <th>Factura</th>
                    <th></th>
                </thead>
                @foreach ($quotationDocs as $doc)
                <tr>
                    <td>{{ $doc->nro }}</td>
                    <td>{{ date('d/m/Y', strtotime($doc->fecha)) }}</td>
                    <td>$ {{ number_format($doc->monto,2,",",".") }}</td>
                    <td><a href="{{ asset('storage/'.$doc->factura) }}" target="_blank">Abrir</a></td>
                    <td>
                        <button wire:click="deleteFact({{ $doc->id }})" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td>
                        <input type="text" wire:model.defer="nroNew" class="form-control" laceholder="Nro. Factura">
                        @error('nroNew')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </td>
                    <td>
                        <input type="date" wire:model.defer="fechaNew" class="form-control" placeholder="Fecha">
                        @error('fechaNew')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </td>
                    <td>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                            <input type="number" wire:model.defer="montoNew" class="form-control text-right">
                        </div>
                        @error('montoNew')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </td>
                    <td>
                        <input type="file" wire:model="facturaNew" class="form-control-file" style="font-size: 12px;">
                        @error('facturaNew')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </td>
                    <td>
                        <button wire:click="addFact()" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>
                        </button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>