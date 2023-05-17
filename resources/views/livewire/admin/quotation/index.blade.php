<div>
    <div class="card">
        <div class="card-body">
            <div class="row" style="align-items: center;">
                <div class="col col-md-2">
                    <!--client select-->
                    <div class="form-group">
                        <label for="cliente_id">Cliente</label>
                        <select wire:model="cliente_id" class="form-control">
                            <option value="">Todos</option>
                            @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->razon_social }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col col-md-2">
                    <!--state select-->
                    <div class="form-group">
                        <label for="estado_id">Estado</label>
                        <select wire:model="estado_id" class="form-control">
                            <option value="">Todos</option>
                            @foreach ($quotationStates as $quotationState)
                            <option value="{{ $quotationState->id }}">{{ $quotationState->state }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col col-md-2">
                    <!--priority select-->
                    <div class="form-group">
                        <label for="prioridad_id">Prioridad</label>
                        <select wire:model="prioridad_id" class="form-control">
                            <option value="">Todos</option>
                            @foreach ($quotationPriorities as $quotationPriority)
                            <option value="{{ $quotationPriority->id }}">{{ $quotationPriority->priority }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col col-md-1 text-center">
                    <!--checkbox finalizadas-->
                    <div class="form-group">
                        <label for="finalizadas">Finalizadas</label>
                        <input wire:model="finalizadas" type="checkbox" class="form-control">
                    </div>
                </div>
                <div class="col text-right">
                    <!--button create route creat-->
                    <a href="{{ route('admin.cotizaciones.create') }}" class="btn btn-success btn-sm">Nueva Cotización</a>
                </div>
            </div>


        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Fecha</th>
                        <th>Tiempo</th>
                        <th>Nro</th>
                        <th>Cliente</th>
                        <th>Monto</th>
                        <th>Estado</th>
                        <th>Prioridad</th>
                        <th style="width: 10px;">Acciones</th>
                    </tr>
                </thead>
                @foreach ($cotizaciones as $cotizacion)
                <tr>
                    <td>{{ $cotizacion->id }}</td>
                    <td>{{ date('d/m/Y', strtotime($cotizacion->fecha)) }}</td>
                    <td>{{ intval((time() - strtotime($cotizacion->fecha)) / 86400) }} días</td>
                    <td>{{ $cotizacion->nro }}</td>
                    <td style="width:30%">{{ isset($cotizacion->client)? $cotizacion->client->razon_social : '' }}</td>
                    <td class="text-right">$ {{ number_format($cotizacion->total(), 2, ",", ".") }}</td>
                    <td>{{ $cotizacion->quotationState->state }}</td>
                    <td>{{ $cotizacion->quotationPriority->priority }}</td>
                    <td style="white-space:nowrap">
                        <button wire:click="edit({{ $cotizacion->id }})" class="btn btn-sm btn-primary">Editar</button>
                        <button wire:click="destroy({{ $cotizacion->id }})"
                            class="btn btn-sm btn-danger">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </table>
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
